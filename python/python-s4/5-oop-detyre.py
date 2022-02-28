import math


class Circle:
    def __init__(self, r):
        self.r = r

    def perimeter(self):
        return 2*self.r*math.pi

    def area(self):
        return math.pow(self.r, 2)*math.pi


c1 = Circle(5)
print("Perimetri: " + str(c1.perimeter()))
print("Syprina: " + str(c1.area()))


#  Circle
#  r
#  methods: perimeter, area
# P=2rP    S=r^2P
