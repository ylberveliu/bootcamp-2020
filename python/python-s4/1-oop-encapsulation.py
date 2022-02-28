class Calc:
    a = 10          # public        - everywhere
    _b = 20         # protected     - class, child-classes (class)
    __c = 30        # private       - class

    def set__c(self, c):
        self.__c = c

    def get__c(self):
        return self.__c

    # private
    def __print_props(self):
        print(str(self.a) + " " + str(self._b) + " " + str(self.__c))

    # private
    def __return_props(self):
        return str(self.a) + " " + str(self._b) + " " + str(self.__c)

cal = Calc()

# print(cal.__c)
# cal.__c = 20
# print(cal.__ret_props())

print("cal._Calc__print_props()")
cal._Calc__print_props()  # mekanizem per qasje ne metoda private       10 20 30
print("print(cal._Cal__return_props())")
print(cal._Calc__return_props())  # 10 20 30

# print(cal.a)
# print(cal._b)

# cal.__c = 50    # nderrimin e vleres ???
# # cal.set__c(50)

# print(cal.__c)  # 50
# print(cal.get__c())  # 30
