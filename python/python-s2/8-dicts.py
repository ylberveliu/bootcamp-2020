def get_ages():
    return 30


student = {
    "name": "Ergys",    # name: Ergys  key-value pair
    "surname": "Llojaj",
    "age": get_ages(),
    "index": 4324324
}

ind = student.popitem()

print(ind)
print(type(ind))

for i in ind:
    print(type(i))

# print(student)

# print(id(student))

# student_copy = student.copy()
# student_copy.update({"name": "Arta"})


# print(id(student_copy))

# print(student_copy)


# student.pop('age')

# print(student.get("age"))


# student.clear()

# student.update({"av_grade": 8.5})

# print(student.values())
# print(student.keys())

# for key in student:
#     print(key + " : " + str(student[key]))

# for key, value in student.items():
#     print(key + " : " + str(value))


# print(student['name'] + " " + student['surname'] + " " + str(student['age']))

# student['age'] = 25

# print(student)
