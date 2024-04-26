/* Формирование последовательности запросов в один результирующий набор
 */

SELECT symbol, price FROM tableA
UNION
SELECT symbol, price FROM tableB;