'''
    try         code
    except      handle error 
    finally     always
'''

# x = 10


def get_ages(ages):
    if ages > 100:
        raise Exception("Sa i vjeteeeer!")
    print("Une jam " + str(ages) + " vjec")


try:
    # get_ages(101)
    ages = 1001
    if ages > 100:
        raise Exception("Sa i vjeteeeer!")
    print("Une jam " + str(ages) + " vjec")
except Exception as e:
    print(e)
# finally:
#     print("Finally")
