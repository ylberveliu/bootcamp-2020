class Student:
    '''
        Kjo eshte klasa ku definohet student-i
    '''

    def __init__(self, name, age):
        self.__private_name = name
        self.__private_age = age

    def sayHello(self):
        print("Hello " + self.name)

    # def set_age(self, age):
    #     self.age = age

    # def get_age(self):
    #     return self.age


# s1 eshte objekt i klases Student
s1 = Student("Artan", 30)
# s2 = Student("Ergys", 21)
print(type(s1))
print(type(s1._age))

# print(s1._name)


# # is      operatore per kontrollimin e identitetit

# # print(type(s1))


# # class Dog:
# #     pass


# # d = Dog()

# # print(isinstance(d, Dog))  # True

# # if type(s1) is Student:
# #     print("Yes")
# # else:
# #     print("No")


# # s1.age = 50

# # print(s1.age)

# # s1.set_age(21)
# # print(s1.get_age())

# # print(s1.age)

# # print(s1.name)

# # s1.age = 40

# # print(s1.age)

# # qasja ne atributet e objektit

# # s1.set_name("Agron")

# # print(s1.name)

# # s1.sayHello()

# # print(s1.name + " " + s2.name)


# # for s in [s1, s2]:
# #     print(s.name)
