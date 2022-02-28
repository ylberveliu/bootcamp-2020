x = True
y = False

print(x and y)  # false
print(x or y)   # true
print(not y)    # true


'''
    x  y  (x and y)                   
    0  0   0 
    0  1   0
    1  0   0
    1  1   1

    x  y  (x or y)                   x True (1)    !x  False (0)
    0  0  0 
    0  1  1  
    1  0  1 
    1  1  1 
'''
