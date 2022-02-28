from flask import Flask, render_template, url_for, request, flash, session, redirect
from flask_sqlalchemy import SQLAlchemy
from flask_bcrypt import Bcrypt
from os.path import join, dirname, realpath
from werkzeug.utils import secure_filename
import os
from validators import *

app = Flask(__name__)

# sessions
app.secret_key = "21flask_42343_sqlalchemy423"

# database
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///albums.db'
db = SQLAlchemy(app)

# bcrypt
bcrypt = Bcrypt(app)

# upload
UPLOAD_FOLDER = join(dirname(realpath(__file__)), 'static/photos/')
ALLOWED_EXTENSIONS = ['png', 'jpg', 'jpeg', 'gif']
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER


# MODELS

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(50), unique=True, nullable=False)
    email = db.Column(db.String(50), unique=True, nullable=False)
    password = db.Column(db.String(100), unique=True, nullable=False)

    def __init__(self, username, email, password):
        self.username = username
        self.email = email
        self.password = password

    def __repr__(self):
        return "<User %s>" % self.email


class Album(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(50), unique=True, nullable=False)
    user_id = db.Column(db.Integer, nullable=False)

    def __init__(self, title, user_id):
        self.title = title
        self.user_id = user_id

    def __repr__(self):
        return "<Album %s>" % self.title


class Photo(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(50), nullable=False)
    photo = db.Column(db.String(120), nullable=False)
    album_id = db.Column(db.Integer, nullable=False)

    def __init__(self, title, photo, album_id):
        self.title = title
        self.photo = photo
        self.album_id = album_id

    def __repr__(self):
        return "<Photo %s>" % self.title


@app.route("/")
def homepage():
    albums = Album.query.all()
    return render_template('homepage.html', albums=albums)


@app.route("/login", methods=["GET", "POST"])
def login():
    if request.method == "POST":
        email = request.form['email']
        password = request.form['password']
        if not_empty([email, password]):
            if is_email(email):
                user = User.query.filter_by(email=email).first()
                if user:
                    if bcrypt.check_password_hash(user.password, password):
                        # create 3 session items (we will need these in dashboard/albums/photos)
                        session['is_logged_in'] = True
                        session['username'] = user.username
                        session['user_id'] = user.id
                        session['email'] = email
                        return redirect(url_for('dashboard'))
                    else:
                        flash("Password is incorrect!")
                else:
                    flash("User doesn't exist!")
            else:
                flash("Email is not valid!")
        else:
            flash("All fields are required!")
        return redirect(url_for("login"))
    else:
        if session['is_logged_in'] == True:
            return redirect(url_for('dashboard'))
        return render_template("auth/login.html")


@app.route("/register", methods=["GET", "POST"])
def register():
    if request.method == "POST":
        username = request.form['username']
        email = request.form['email']
        password = request.form['password']
        confirm_password = request.form['confirm_password']
        if not_empty([username, email, password, confirm_password]):
            if is_email(email):
                if password_match(password, confirm_password):
                    password_hash = bcrypt.generate_password_hash(password)
                    user = User(username, email, password_hash)
                    db.session.add(user)
                    db.session.commit()
                    # create 3 session items (we will need these in dashboard/albums/photos)
                    session['is_logged_in'] = True
                    session['username'] = username
                    session['email'] = email
                    return redirect(url_for("dashboard"))
                else:
                    flash("Passwords doesn't match!")
            else:
                flash("Email is not valid!")
        else:
            flash("All fields are required!")
        return redirect(url_for("register"))
    else:
        if session['is_logged_in'] == True:
            return redirect(url_for('dashboard'))
        return render_template("auth/register.html")


@app.route("/dashboard")
def dashboard():
    if session['is_logged_in'] == False:
        return '''
            <p>You are not allowed to view this page without authorization!</p>
            <a href="/login">Login</a>
        '''
    return render_template("admin/dashboard.html")


@app.route("/albums", methods=["GET", "POST"])
def albums():
    if session['is_logged_in'] == True:
        albums = Album.query.all()
        if request.method == "POST":
            title = request.form['title']
            if not_empty([title]):
                album = Album(title, session.get('user_id'))
                db.session.add(album)
                db.session.commit()
                flash("Album created successfully")
            else:
                flash("Album title cannot be empty!")
            return redirect(url_for('albums'))
        return render_template("admin/albums.html", albums=albums)
    else:
        return redirect(url_for("homepage"))


@app.route("/album/<int:album_id>/delete")
def delete_album(album_id):
    album = Album.query.get_or_404(album_id)
    db.session.delete(album)
    db.session.commit()
    flash("Album was deleted successfully")
    return redirect(url_for('albums'))


@app.route("/album/<int:album_id>/photos")
def view_album_photos(album_id):
    photos = Photo.query.filter_by(album_id=album_id).all()
    if len(photos) > 0:
        return render_template("view-album-photos.html", photos=photos)
    else:
        flash("Album is empty!")
        return redirect(url_for("homepage"))


@app.route("/photos/<int:album_id>", methods=["GET", "POST"])
def photos(album_id):
    if session['is_logged_in'] == True:
        album = Album.query.get_or_404(album_id)
        photos = Photo.query.filter_by(album_id=album.id).all()
        if request.method == "POST":
            title = request.form['title']
            file = request.files['photo']

            if file and allowed_file(file.filename):
                # upload
                filename = secure_filename(file.filename)
                file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))

                # save
                photo = Photo(title, file.filename, album_id)
                db.session.add(photo)
                db.session.commit()
                return redirect(url_for('photos', album_id=album_id))
        return render_template("admin/photos.html", photos=photos, album=album)
    else:
        return redirect(url_for("homepage"))


@app.route('/album/<int:album_id>/photo/<int:photo_id>/delete')
def delete_photo(album_id, photo_id):
    photo = Photo.query.get_or_404(photo_id)
    db.session.delete(photo)
    db.session.commit()
    flash("Photo was deleted successfully")
    return redirect(url_for('photos', album_id=album_id))


@app.route("/logout")
def logout():
    session['username'] = ""
    session['email'] = ""
    session['is_logged_in'] = False
    return redirect(url_for('homepage'))


if __name__ == '__main__':
    app.run(debug=True)
