import re


def not_empty(form_fields):
    for field in form_fields:
        if len(field) == 0:
            return False
    return True


def is_email(email):
    return re.search("[\w\.\_\-]+\@[\w\-]+\.[a-z]{2,5}", email) != None


def password_match(password, confirm_password):
    return password == confirm_password


def allowed_file(filename):
    ext = filename.split(".")[-1]
    return ext in ALLOWED_EXTENSIONS
