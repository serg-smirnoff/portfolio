lambda x: x + 1  # Анонимная функция

### функии в функции
lst = [1, 6, 3, 7, 5, 18, 5, 0, 5, 9]

### list
new_lst = list(map(str, lst)) # ['1', '6', '3', '7', '5', '18', '5', '0', '5', '9']

### filter
fil = filter(lambda x: x <= 5, lst)

print(set(fil)) # {0, 1, 3, 5}

### reduce
lst = [1, 2, 3, 4, 5]
res = reduce(lambda a, b: a**2 + b ** 2, lst) # 1373609 # (a*a + b*b) + (b*b + c*c) + ... + (n*n + (n+1) * (n+1))

### zip
a = [1, 2, 3]
b = 'xyz'
c = (None, True, False)

z = list(zip(a, b, c)) # [(1, 'x', None), (2, 'y', True), (3, 'z', False)]

##########
deg add(x):
  return lambda y: x + y
  
a = add(10)

a(2) # 12


########## КЭШИРОВАНИЕ
import functools

@functools.lru_cache()
def square(n)
  print('here')
  return n ** 2
  
print (square(4))
print (square(4))
print (square(4))
print (square(4))
print (square(4))

#here
#16
#16
#16
#16
#16

### ###