# Put the query for query number 1 below
SELECT 
    `first_name`, `last_name`, `active`
FROM
    `contacts`
WHERE
    (`active` = 1)
        AND (last_name LIKE '%a%'
        OR last_name LIKE '%e%'
        OR last_name LIKE '%i%');
        