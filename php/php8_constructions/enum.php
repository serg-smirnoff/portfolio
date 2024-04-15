<?php
enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

function do_stuff(Suit $s)
{
    var_dump($s);
}

do_stuff(Suit::Spades);
?>