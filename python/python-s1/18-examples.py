# pow(x, y)
# x^y

# power(10, 3) => 10 x 10 x 10

age = input("Enter your age: ")  # input() funksioni cdohere kthen string "34"
type_of_input = type(age)
print(type_of_input)  # < class 'str' >
print(int(age))
print(type(int(age)))

# while True:
#     xx = int(input("X: "))
#     yy = int(input("Y: "))

#     def power(x, y):
#         r = 1
#         for i in range(y):
#             r *= x
#         return r

#     # print(power(5, 2))  # 5 x 5 x 5

#     p = power(xx, yy)
#     print(p)

#     q = input("A deshiron me llogarit serish? (y/n) : ")

#     if q == 'n':
#         break
#     else:
#         if q == 'y':
#             continue
#         else:
#             print("Shtypet button te gabuar")
#             break
