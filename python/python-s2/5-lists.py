s_t = ("Ergys", "Teuta", "Merxhan", "Isuf", "Ergys", "Artan", "Ergys")
#              0        1         2        3
#              0                          n-1

students = list(s_t)

print(type(students))

students[2] = "Merxhani"

print(students)

# students.reverse()
# print(students)


# students.sort()
# print(students)

# students.remove("Merxhan")
# print(students)


# students.pop(3)
# print(students)

# students.insert(3, "XYZ")
# print(students)

# print(students.index("Artan"))


# counter = 0
# for s in students:
#     if s == "Ergys":
#         counter += 1

# print(counter)


# total_ergys = students.count("Ergys")
# print(total_ergys)


# students.append("Egzon")
# print(students)


# ss = ""
# for s in students:
#     if s == "Isuf":
#         ss += s
#     else:
#         ss += s + ", "

# print("Une jam gjeneruar me for: " + ss)

# sss = ", ".join(students)
# print("Une jam gjeneruar me join(): " + sss)

# print(len(students))

# if "Ergys" not in students:
#     print("Ergys is not in the list")
# else:
#     print("Hi Ergys")

# len(list) -> numri i elementeve te listes

# for student in students:
#     print("I am " + student)

# i = 0
# while(i < len(students)):
#     print("I am " + students[i])
#     i += 1
