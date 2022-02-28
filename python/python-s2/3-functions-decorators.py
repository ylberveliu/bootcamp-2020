def devider(function):
    def inner(a, b):
        print("Une do te bej llogaritjen e a/b")
        if b == 0:
            print("Nuk mundet me pjestu me 0")
            return

        return function(a, b)
    return inner


@devider
def devide(x, y):
    print(x / y)


a = float(input("a: "))
b = float(input("b: "))

devide(a, b)

# def decorate(f):
#     def dec():
#         print("Une e dekorova funksionin qe eshte dhene si parameter")
#         f()
#     return dec

# @decorate
# def say_hi():
#     print("Une jam funksioni qe eshte bere pass si parameter")

# say_hi()

# # d = decorate(say_hi)

# # d()
