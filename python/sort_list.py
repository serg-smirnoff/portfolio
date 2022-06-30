# How to sort a list of objects based on an attribute of the objects?

# To sort the list in place
ut.sort(key=lambda x: x.count, reverse=True)

# To return a new list, use the sorted() built-in function
newlist = sorted(ut, key=lambda x: x.count, reverse=True)

# If you really need to do it in one pass without copying the list

i=0
while i < len(somelist):
    element = somelist[i] 
    do_action(element)
    if check(element):
        del somelist[i]
    else:
        i+=1
