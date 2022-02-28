from abc import ABC, abstractmethod


class Animal(ABC):
    @abstractmethod
    def speak(self):
        pass


class Cat(Animal):
    def speak(self):
        return "Mjauuu"


class Dog(Animal):
    def speak(self):
        return "Hauuu"


def activate_speak(animal):
    print(animal.speak())


c = Cat()
d = Dog()

activate_speak(c)   # Mjauuu
activate_speak(d)  # Hauuu


# class A(ABC):
#     def print_name(self, name):
#         print("My name is " + name)

#     @abstractmethod
#     def important_meth(self):
#         pass

#     @abstractmethod
#     def important_ceth(self):
#         pass


# class B(A):
#     def important_meth(self):
#         print("I am important_meth")

#     def important_ceth(self):
#         print("I am important_ceth")


# b = B()


# B (A)  -> duhet patjeter te implementoje ndonje funk. te A
