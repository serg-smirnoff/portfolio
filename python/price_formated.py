def price_formated(p):
    p = '{0:,}'.format(int(p)).replace(',', ' ')
        return p
    mod = round((p % 100),1)
    if mod != 0.0:
        p = '{0:.1f}'.format(p).replace('.', ',')
        return p
    else:
        p = '{0:,}'.format(int(p)).replace(',', ' ')
        return p
