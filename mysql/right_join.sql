/* Выбрать все строки с правой стороны объединения (таблица groups) и для каждой выбранной строки отобразить 
   соответствущее ей значение из левой части (таблица users_groups), если оно существует (значение, удовлетворяющее 
   ограничениям предложения ON или USING), или отобразить строку со значениями NULL, если соответственно нет
 */

SELECT * FROM users_groups RIGHT JOIN groups USING(gid);
SELECT * FROM users_groups RIGHT JOIN groups USING(gid) WHERE uid IS NULL;

/*
  groups
  1
  2
  3
  4

  users_groups
  3
  4
  5
  6

  right_join
  3
  4
  5
  6
*/