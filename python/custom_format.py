def custom_format(p):
    if type(p) is str:
        return p
    if round(float(p) % 1,2) > 0:
        return p
    else:
        return round(p,0)