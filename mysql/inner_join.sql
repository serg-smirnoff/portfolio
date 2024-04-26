/* Внутреннее объединение. Является симметричным, т.к. несоответствующие строки удаляются из результирующего набора
 */

SELECT countryName, stateName FROM country, sate WHERE state.cid = country.cid;
SELECT countryName, stateName FROM country INNER JOIN sate WHERE state.cid = country.cid;