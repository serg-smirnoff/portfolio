def city_pretext(city):

    first_letter = city_name[0]
    second_letter = city_name[1]

    consonants = ["б","в","г","д","ж","з","й","к","л","м","н","п","р","с","т","ф","х","ц","ч","ш","щ"]
    pretext = 'в'

    for consonant_letter in consonants:
        if consonant_letter == second_letter:
            pretext = 'во'
