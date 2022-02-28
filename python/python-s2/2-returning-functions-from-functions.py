def parent(num):
    def ch1():
        return "I am child 1"

    def ch2():
        return "I am child 2"

    if num == 1:
        return ch1
    elif num == 2:
        return ch2


c1 = parent(1)
c2 = parent(2)

print(c1)
print(c2)


# def calculator(a, b, operation):
#     def add(x, y):
#         return x + y

#     def substract(x, y):
#         return x - y

#     if operation == "add":
#         return add(a, b)
#     elif operation == "substract":
#         return substract(a, b)


# plus = calculator(10, 20, "add")
# minus = calculator(100, 50, "substract")


# print(type(plus))
