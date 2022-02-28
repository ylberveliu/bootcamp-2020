sentence = "However, to it is okay to use it to save typing in interactive to sessions"

# print(sentence.count('to'))
counter = 0


for w in sentence.split(" "):
    if w == 'to':
        counter += 1

print(counter)

# counter = 0
# vowles = {
#     'a': 0,
#     'e': 0,
#     'i': 0,
#     'o': 0,
#     'u': 0
# }

# for letter in sentence:
#     if letter in ['a', 'e', 'i', 'o', 'u']:
#         #vowles[letter] += 1
#         counter += 1

# # print(vowles)
# print(counter)

# {
#     'a' : 5,
#     'e' : 3,
#     'i' : 2,
#     'o' : 0,
#     'u' : 3
# }
