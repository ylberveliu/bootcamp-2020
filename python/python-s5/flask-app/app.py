from flask import Flask, render_template, request, session, make_response, redirect, url_for, flash
import logging
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

# DB configs
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///todos.db'
db = SQLAlchemy(app)


logging.basicConfig(filename='erros.log', level=logging.DEBUG)

# Session configs
app.secret_key = "12345abcd"


# Entitetet (Tabelat)
class Todo(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(200), nullable=False)
    status = db.Column(db.Integer, default=0)

    def __init__(self, title, status=0):
        self.title = title
        self.status = status

    def __repr__(self):
        return "<Todo %s" % self.title


# CRUD - R + I
@app.route("/", methods=["GET", "POST"])
def index():
    todos = Todo.query.all()
    if request.method == "POST":
        # insert
        title = request.form['todo']
        todo = Todo(title)
        db.session.add(todo)
        db.session.commit()
        return redirect(url_for('index'))

    return render_template("todos.html", todos=todos)


# CRUD - Update
@app.route("/edit/<int:id>", methods=["GET", "POST"])
def edit(id):
    todo = Todo.query.get_or_404(id)
    if request.method == "POST":
        todo.title = request.form['todo']
        db.session.commit()
        return redirect(url_for('index'))

    return render_template("edit.html", todo=todo)


# CRUD - Delete
@app.route("/delete/<int:id>")
def delete(id):
    todo = Todo.query.get_or_404(id)
    db.session.delete(todo)
    db.session.commit()
    return redirect(url_for('index'))


@app.route('/task/<int:id>/done')
def done(id):
    todo = Todo.query.get_or_404(id)
    todo.status = 1
    db.session.commit()
    return redirect(url_for('index'))


@app.route('/search', methods=["POST"])
def search():
    if request.method == "POST":
        title = request.form['search']
        search = "%{}%".format(title)
        todos = Todo.query.filter(Todo.title.like(search)).all()
        return render_template("todos.html", todos=todos)


@app.route("/set-cookie")
def setCookie():
    flash("Cookie with key 'email' was set successfully.")
    expire = 60*60*24*20
    resp = make_response(render_template("cookies.html"))
    resp.set_cookie("email", "ylber.veliu@yahoo.com", 5)
    return resp


@app.route("/get-cookie")
def getCookie():
    if request.cookies.get("email") == None:
        flash("Cookie with key email doesn't exist!")
        # return redirect(url_for('index'))
        # return render_template("session.html")
        app.logger.error("Cookie with key email doesn't exist!")
        # debug()
        # warning()
        return "Error was logged successfully"
    return request.cookies.get("email")


# @app.route('/set-session')
# def setSession():
#     session['username'] = "ylber.veliu"
#     return "Session was set successfully"


# @app.route('/get-session')
# def getSession():
#     # return session.get("username")
#     return render_template("session.html")


# @app.route("/", methods=["GET", "POST"])
# def home():
#     if request.method == "POST":
#         username = request.form['username']
#         password = request.form['password']
#         if validate_username(username):
#             if validate_username(password):
#                 return "Your username is: " + username + " and password: " + password
#             else:
#                 return "Password is incorrect!"
#         else:
#             return "Username is incorrect!"
#         # if validate_username(username) and validate_password(password):
#         #     return "Your username is: " + username + " and password: " + password
#         # else:
#         #     return "Password or/and username is incorrect!"
#     elif request.method == "GET":
#         return render_template("form.html")


# def validate_username(username):
#     return username[0].isupper() and username.startswith(('A', 'B', 'C'))


# def validate_password(password):
#     return (len(password) > 6) and (type(password) is str)


# @app.route("/", methods=["GET"])
# def index():
#     return render_template("form.html")


# @app.route("/form/action", methods=["POST"])
# def form_action():
#     # username = request.args.get("username")
#     # password = request.args.get("password")
#     # return "Your username is: " + username + " and password: " + password
#     username = request.form['username']
#     password = request.form['password']
#     return "Your username is: " + username + " and password: " + password


# posts = {'1': {'title': "Kosova dhe Serbia me marrëveshje për pezullimin e vizitave", 'image': "https://telegrafi.com/wp-content/uploads/2019/07/Flamuri-i-Kosoves-te-rrethi-Prishtine-foto-Ridvan-Slivova-7-780x439.jpg", 'content': "Kosova dhe Serbia javën e kaluar kanë arritur një “marrëveshje mirëkuptimi” për të pezulluar vizitat e ndërsjella, për aq kohë sa do të zgjasin gërmimet në varrezat e dyshuara masive, ku dyshohet se janë varrosur civilët shqiptarë, të vrarë gjatë luftës së fundit në Kosovë."}, '2': {'title': "Dhjetë këshilla për vozitje më të sigurt në mjegull",
#                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    'image': "https://telegrafi.com/wp-content/uploads/2020/11/fog-road-highway-tar-central-reservation-landscape-traffic-bavaria-autumn-780x439.jpg", 'content': "Pra për të pasur një vozitje më të lehtë dhe më të sigurt këtu ju i keni disa këshillë kur jeni duke vozitur në një rrugë me mjegull. Kosova dhe Serbia javën e kaluar kanë arritur një “marrëveshje mirëkuptimi” për të pezulluar vizitat e ndërsjella, për aq kohë sa do të zgjasin gërmimet në varrezat e dyshuara masive, ku dyshohet se janë varrosur civilët shqiptarë, të vrarë gjatë luftës së fundit në Kosovë."}}

# @app.route("/")
# def index():
#     return render_template("home.html", articles=posts)
# @app.route("/article/<string:article_id>")
# def read_article(article_id):
#     article = None
#     if article_id in posts.keys():
#         article = posts[article_id]
#     return render_template("article.html", article=article)
if __name__ == '__main__':
    app.run(debug=True)
