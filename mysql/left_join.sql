/* Выбрать все строки с левой стороны объединения (таблица users) и для каждой выбранной строки отобразить 
   соответствущее ей значение из правой части (таблица users_groups), если оно существует (значение, удовлетворяющее 
   ограничениям предложения ON или USING), или отобразить строку со значениями NULL, если соответственно нет
 */

SELECT * FROM users LEFT JOIN users_groups ON users.uid = users_groups.uid;
SELECT * FROM users LEFT JOIN users_groups USING(uid);

SELECT name FROM users LEFT JOIN users_groups ON users.uid = users_groups.uid WHERE users_groups.gid IS NULL;