import functools

products = [
    {"name": "A", "qty": 0, "price": 17.6, "sale": 0},
    {"name": "B", "qty": 2, "price": 6.9, "sale": 0},
    {"name": "C", "qty": 3, "price": 29.5, "sale": 0},
    {"name": "G", "qty": 2, "price": 6.19, "sale": 0},
    {"name": "F", "qty": 2, "price": 19.29, "sale": 0},
]

sale = 15
products_in_stock = filter(lambda p: p['qty'] > 0, products)

# products_with_5_perc_sale = map(lambda p: p['sale'] + sale, products_in_stock)

# products_with_5_perc_sale = [p['sale'] += sale for p in products]

products_with_5_perc_sale = []
for p in products:
    p['sale'] += sale
    products_with_5_perc_sale.append(p)

total = functools.reduce(
    lambda s, p: s + ((p['qty'] * p['price']) -
                      (p['price'] * (p['sale']/100))),
    products_with_5_perc_sale,
    0)

print(total)


# students = [
#     {"name": "A", "surname": "X", "age": 20, "avg_grade": 7.6},
#     {"name": "B", "surname": "Y", "age": 22, "avg_grade": 6.9},
#     {"name": "C", "surname": "Z", "age": 23, "avg_grade": 9.5},
#     {"name": "G", "surname": "O", "age": 22, "avg_grade": 6.9},
#     {"name": "F", "surname": "H", "age": 22, "avg_grade": 9.9},
# ]

# sum_of_avg_grades = ft.reduce(lambda x, y: x + y['avg_grade'], students, 0)

# print(sum_of_avg_grades / len(students))

# numbers = [n for n in range(1, 11)]  # list(1...10) -> 1+2+3+4+5+...+10

# x = ft.reduce(lambda s, n: s * n, numbers, 1)

# print(x)

# x = map(lambda student: student['age'] + 1, students)

# # print(list(x))

# for s in x:
#     print(s)

# x = map(lambda x: x + 3, numbers)

# print(list(x))

# c = 9  # 9 >

# sag9 = filter(lambda student: student['avg_grade'] >= 9, students)

# print(list(sag9))


# numbers = [n for n in range(1, 101)]  # list(1...100)
# # [1,2,3,4,5,6,....,98,99,100] -> lambda x: x % 12 == 0    l.apped(x)

# x = filter(lambda x: x % 12 == 0, numbers)

# # print(type(x))
# print(list(x))

# filter(f, i)
# map(f, i)
# ft.reduce(f, i(s))
