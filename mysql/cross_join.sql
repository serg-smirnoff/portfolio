/* Полное объединение, которое объединяет все задействованные таблицы для создания произведения "включить все"
 */

SELECT countryName, stateName FROM country, state;
SELECT countryName, stateName FROM country CROSS JOIN state;