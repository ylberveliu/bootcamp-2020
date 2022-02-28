def parent(name):
    print("I am parent code! " + name)

    def say_hi(name, surname):
        print("Hello " + name + " " + surname)

    say_hi("Ylber", "Veliu")

# say_hi("A", "B")


def parent2():
    print("I am function: child2 code!")


parent("Ergys")
parent2()

# def say_hi(name, surname):
#     print("Hello " + name + " " + surname)


# say_hi("Ylber", "Veliu")
