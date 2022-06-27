def price_formated(p):
    if len(str(int(p))) >= 3:
        return int(p)
    mod = ((p % 1),1)
    if mod != 0.0:
        p = '{0:.2f}'.format(p).rstrip('0').replace('.', ',')
        return p