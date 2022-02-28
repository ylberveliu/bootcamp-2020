'''
                Student
BScStudent    MScStudent    PhdStudent
'''


class Student:
    def __init__(self, name, surname, pid, index, subjects):
        self.name = name
        self.surname = surname
        self.pid = pid
        self.index = index
        self.__subjects = subjects

    def get_name(self):
        return self.name

    def set_subjects(self, subjects):
        self.__subjects = subjects

    def get_subjects(self):
        return self.__subjects

    def get_surname(self):
        return self.surname

    # ... Te gjitha properties dhe methods qe i ndajne klasat qe trashegojne klasen ne fjale


class Human:
    def hi(self):
        print("Hi there!")


class BScStudent(Student):
    pass


class MScStudent(Human, Student):
    def __init__(self, name, surname, pid, index, subjects, avg_grade):
        super().__init__(name, surname, pid, index, subjects)
        self.avg_grade = avg_grade

    # override
    def get_name(self):
        print("Une jam " + self.name + " " + self.surname)

    def set_avg_grade(self, a_grade):
        self.avg_grade = a_grade

    def get_avg_grade(self):
        return self.avg_grade

    def __str__(self):
        # + " " + self.surname + " " + self.pid + " " + self.index + " " + ", ".join(self.get_subjects()) + " " + self.avg_grade
        return self.name + " " + self.avg_grade


class PhdStudent(Student):
    def __init__(self, name, surname, pid, index, subjects, mentor):
        super().__init__(name, surname, pid, index, subjects)
        self.mentor = mentor


s1 = MScStudent("Egzon", "Sulejmani", "340980",
                "132021", ["Alg", "DP", "OOAD"], "7.8")

s1.get_name()


# s1 = MScStudent("Egzon", "Sulejmani", "340980", "132021",
#                 ["Alg", "DP", "OOAD"], "7.8")
# s2 = MScStudent("Ergys", "Llojaj", "340980", "132021",
#                 ["Alg", "DP", "OOAD"], "6.8")
# s3 = MScStudent("Ylber", "Veliu", "340980", "132021",
#                 ["Alg", "DP", "OOAD"], "9.8")
# m_19_20 = [s1, s2, s3]

# for s in m_19_20:
#     avarage_grade = input("Avrage grade for " + s.get_name() + " : ")
#     # print(type(s))
#     # s.avg_grade = avarage_grade
#     s.set_avg_grade(avarage_grade)

# for s in m_19_20:
#     print(s)

# print("-> " + str(egzon.avg_grade))
# print(egzon.get_avg_grade())

# # print(egzon.subjects)
# egzon.set_subjects(["C++", "DB"])
# print(egzon.get_subjects())  # ["Alg", "DP", "OOAD"]] -> ["C++", "DB"]
# # print(egzon.surname)
# print(egzon.get_surname())
