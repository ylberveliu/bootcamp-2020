from flask import Flask, render_template

app = Flask(__name__)


@app.route("/")
def home():
    # return "Hello, world!"
    return render_template("home.html")


@app.route("/about")
def about_us():
    return render_template("about.html")


@app.route("/users/<int:id>")
def get_user_data_by_id(id):
    if id >= 1 and id <= 5:
        return render_template("greet-user.html", message="Welcome admin", id=id)
    else:
        return render_template("greet-user.html", message="Welcome guest", id=id)


if __name__ == "__main__":
    app.run(debug=True)
