def sumoffirstnnum(n):
    num, nums = 0, []
    while num <= n:
        nums.append(num)
        num += 1
    return nums


# def sum_of_list_elements(lst):
#     sum = 0
#     for i in lst:
#         sum += i
#     return sum

# sum() -> sum of list elements
print(sum(sumoffirstnnum(4200)))

# sumoffirstnnum(20) # 1+2+3+4+....+20
