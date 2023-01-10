# -*- coding: utf-8 -*-

# None (неопределенное значение переменной)
# Логические переменные (Boolean Type)
# Числа (Numeric Type)
#     int - целое число
#     float - число с плавающей точкой
#     complex - комплексное число
# Списки (Sequence Type)
#     list - список
#     tuple - кортеж
#     range - диапазон
# Строки (Text Sequence Type )
#     str
# Бинарные списки (Binary Sequence Types)
#     bytes - байты
#     bytearray - массивы байт
#     memoryview - специальные объекты для доступа к внутренним данным объекта через protocol buffer
# Множества (Set Types)
#     set - множество
#     frozenset - неизменяемое множество
# Словари (Mapping Types)
#     dict - словарь


# None type

data_type = None

print(type(data_type))

if data_type is None:
    print('data_type is None')
else:
    print('data_type is not None')

# int type

x = 7
y = 5

print(id(x))
print(id(y))

print(type(x))
print(type(y))

print(x+y)
print(x-y)
print(x*y)
print(x/y)
print(x//y)
print(x%y)
print(-x)
print(abs(x))
print(divmod(x, y))
print((x//y,x%y))
print(x**y)
# print(pow(x,y[,z]))

# float type

x = 0.7
y = 0.5

print(type(x))
print(type(y))

print(round(x))
print(round(y))