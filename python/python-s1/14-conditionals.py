db_username = "ylber.veliu"
db_password = "12345"

username = input("Jepe emrin e shfrytezuesit: ")
password = input("Jepe fjalekalimin: ")

if username == db_username:
    if password == db_password:
        print("Home page")
    else:
        print("Incorrect password!")
else:
    print("Incorrect username!")

# x = 167354

# if x >= 1 and x <= 9:
#     print("Njeshifrore")
# elif x >= 10 and x <= 99:
#     print("Dyshifrore")
# elif x >= 100 and x <= 999:
#     print("Treshifrore")
# else:
#     print("Me e madhe se 3shifrore")


# if x > 20:  # True
#     y = 20
#     print(y)
#     print(str(x) + " eshte me e madhe se 20")
#     print("--------------------------------")
# else:  # False
#     print(str(x) + " eshte me e vogel se 20")

'''
    if (expr1 or|and expr2 ... exprN):
        ...
        ...
        ...
    else:
        ...
        ...
        ...
    
'''


'''
Note: Ne Python nuk kemi swtich
'''
