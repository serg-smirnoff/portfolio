// filtering list without remove elements

ret = [ticket for ticket in visible_tickets if ticket.from_date == ticket.to_date or ticket.to_date == None]