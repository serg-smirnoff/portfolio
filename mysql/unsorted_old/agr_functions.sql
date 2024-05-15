SELECT
    distinct it.price as price, it.catalog_id, it.name as item_name, ct.name as catalog_name, ct.id, count(it.id), sum(it.price) as sum_price
FROM
    catalog ct, items it
WHERE
    it.catalog_id=ct.id and it.price > 1000
GROUP BY
    it.catalog_id
