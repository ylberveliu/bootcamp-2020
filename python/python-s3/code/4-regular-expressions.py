import re  # as r

dmr = '''Dennis MacAlistair Ritchie(September 9, 1941 – c. October 12, 2011) was an American
computer scientist. My credit card number is 5356 5345 5352 5342 He created the C programming language and , with long-time colleague
Ken Thompson, the Unix operating system and B programming language.'''

# print(re.findall('[a-zA-Z]+\s{1}[0-9]{1,2}\,\s{1}[0-9]{4}', dmr))

# r = re.search('[a-zA-Z]+\s{1}[0-9]{1,2}\,\s{1}[0-9]{4}', dmr)
# print(r.span())
# print(r.string)
# print(r.group())


# print(len(dmr.split("1941")))

# r = re.split('[a-zA-Z]+\s{1}[0-9]{1,2}\,\s{1}[0-9]{4}', dmr)
# print(len(r))
# print(type(r))
# for i in r:
#     print(i)


r = re.sub('([0-9]{4}\s{1}){3}[0-9]{4}', '__HIDDEN__', dmr, 1)

print(r)
