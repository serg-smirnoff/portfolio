SELECT * FROM `table` WHERE `text` LIKE '%href="https://search.hotellook.com/%'
UPDATE `table` SET `content` = REPLACE(`content`,'new_pattern','old_pattern') WHERE ID > 1;