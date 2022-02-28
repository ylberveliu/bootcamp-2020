r = 10  # variabel globale


def area():
    return int(2 * r * 3.14)


def fullname(name, surname):
    mn = input("What's you middle name: ")  # variable lokale
    return name + " " + mn + " " + surname


# print(mn)

print(fullname("Ylber", "Veliu"))
# print(area())


# def say_hello(username):
#     #print("Hello, " + username)
#     return "Hello, " + username


# username = input("What's your name: ")

# n = say_hello(username)
# print(n)

# db_username = "ylber.veliu"
# db_password = "12345"


# def login():
#     username = input("Jepe emrin e shfrytezuesit: ")
#     password = input("Jepe fjalekalimin: ")

#     if username == db_username:
#         if password == db_password:
#             return True
#         else:
#             return False
#     else:
#         return False


# if login():
#     print("Home page")
# else:
#     print("Incorrect username and/or password!")


# def say_hello():
#     print("Hello, world!")


# # (aktivizim) thirrje te funksionit
# say_hello()

'''
def emri_i_funksionit(arg1, arg2, ..., argN):
    trupi i funksionit
    return vlera
'''
