SELECT * FROM table T1
WHERE (SELECT COUNT(*)
       FROM tablename T2
       WHERE T1.pagetitle = T2.pagetitle) > 2;