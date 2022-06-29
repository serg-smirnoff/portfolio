Стандарты: PEP8
================================================
Типы данных:
Многострочная строка:
m_str = 
'''
***
 ***
  ***
'''
Кортеж(tuple) - ("UserName", "UserSurName")
Список(list) - [2, 4, 5, "str", man()]
Словарь(dict) - {"x": 6, "y": 7}
Множество(set) - set()
------------
ЛИСТ:
l = ("lala", 23, "s")

l.append("one")
l.append(2) #Добавить в конец
print (l) ## ("lala", 23, "s", "one", 2)

len() #Узнать длину списка
len() ## 5

l.reverse() #Реверс листа
------------
Кортеж:
tuple = [2, 4, 5, "str", man()]

list(tuple) #Привели к списку
------------
Словарь
point = {"x": 6, "y": 7}

print(point['x'],point['y'])
------------
Множество
s = set([2,4,1])
================================================
Циклы
range(n,m) - создает последовательность с числами от n, до m
for i in range(0,5):
    print(i)
    ## 0,1,2,3,4,5
    
s = "Hello"

for i in range(0,len(s)):
    print(s[i], end=" ") #end - разделение конца символов(по умолчанию - перенос на след строку)
    ## H e l l o
    
for ch in s:
    print(s[i], end=" ")
    ## H e l l o
    
if 2 in s:
    print(True)
    ## True
    
================================================
Срез:
s = "Hello Python"

print(s[0:5:2]) #Выводит с 0 го символа до 5-го. Обрезает каждый второй символ
## Hlo
print(s[::2]) ## HloPto

a=12
b=23
num = a if a <=b else b ## num = a = 12
print(a if (a==1) else "N")
echo ($a==1) ? "Y" : "N"
================================================

подключение библиотек

file 1 : name = lib.py
    def my_sum(a,b):
	return a+b
file 2 : name = test.py
    import lib
    print(lib.my_sum(1,3)) ## 4
    
================================================
Регулярки

RegEx.findall('<\w+ \w+', xml)	
result = RegEx.findall('<\w+ \w+ .*>', xml)
for s in result:
    xml = xml.replace(s,s.replace(" ",""))

================================================
Операторы

pass - пустышка
if a == 1
    pass
###
d = {'a': 1, 'b': 2}
for k, v in d.items():
    print(k, v)
    
l = [i**2 for i in [2, 3, 4] # [4, 9, 16]

Аналог Switch case:

hello = {
    'ru': 'Добрый день',
    'en': 'Good day',
    'de': 'Guten tag',
    'default': 'Unknown language'
}
s = input('Введите код языка: ')
greet = hello.get(s, hello['default'])
print(greet)