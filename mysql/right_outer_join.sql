/* Результат правого внешнего соединения – все строки таблицы В плюс все строки таблицы А, имеющие совпадение со строками таблицы В.
*/

/*
A    B
-    -
1    3
2    4
3    5
4    6
*/

select * from a RIGHT OUTER JOIN b on a.a = b.b;
select a.*,b.*  from a,b where a.a(+) = b.b;

/*
a    |  b
-----+----
3    |  3
4    |  4
null |  5
null |  6
*/