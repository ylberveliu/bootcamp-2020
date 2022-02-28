'''
    lambda args: expression

    args = infinit
'''


def hof(x, f):
    return x + f(x)


print(hof(5, lambda x: x * 10))


# def adder(x):
#     return lambda y: x + y


# add10 = adder(10)

# #     add10(110) + 10 -> 120
# print(add10(add10(100)))


#add = lambda x: x+ 5
# def add(x): return x + 5
# print(add(10))  # 15

# lambda x: x + 5

# def add(x):
#     return x + 5
