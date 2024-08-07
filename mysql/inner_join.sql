/* Внутреннее объединение. Является симметричным, т.к. несоответствующие строки удаляются из результирующего набора
*/

SELECT countryName, stateName FROM country, sate WHERE state.cid = country.cid;
SELECT countryName, stateName FROM country INNER JOIN sate WHERE state.cid = country.cid;

/* Внутреннее соединение, использующее один из эквивалентных запросов, дает пересечение двух таблиц, то есть две строки, общие для каждой из них.
*/

/*
A    B
-    -
1    3
2    4
3    5
4    6
*/

select * from a INNER JOIN b on a.a = b.b;
select a.*, b.*  from a, b where a.a = b.b;

/*
a | b
--+--
3 | 3
4 | 4
*/