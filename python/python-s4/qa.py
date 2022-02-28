def first_n_numbers(n):
    r = []
    for i in range(0, n):
        r.append(i)
    return r


print(first_n_numbers(21))  # [0,1,2,...,20]

print(min(first_n_numbers(21)))
print(max(first_n_numbers(21)))

# def dec_func(func):
#     def idec_func():
#         print("Hi")
#         func()
#     idec_func()


# def print_name():
#     print("Egzon")

# d = dec_func(print_name)

# '''
#     Hi
#     Egzon
# '''
