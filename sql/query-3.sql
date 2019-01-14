# Put the query for query number 3 below

#3. id, first_name, last_name, club_id and end_date of all contacts, 
#with their most recent membership renewal end_date and their most recent club_id





SELECT *
FROM contacts c

INNER JOIN (
	SELECT 
		id, MAX(end_date) AS MaximumDate, contact_id
	FROM
		membership_renewals
	GROUP BY contact_id
) t2 ON t2.contact_id = c.id

INNER JOIN membership_renewals mr ON mr.contact_id = c.id AND t2.MaximumDate = mr.end_date





-- init---
-- # Put the query for query number 3 below

-- SELECT  c.*, p.*
-- FROM    contacts c INNER JOIN
--         (
--             SELECT  id,
--                     MAX(end_date) MaxDate
--             FROM    membership_renewals
--             GROUP BY contact_id
--         ) MaxDates ON c.id = MaxDates.contact_id

--  INNER JOIN
--         membership_renewals p ON   MaxDates.contact_id = p.contact_id
--                     AND MaxDates.MaxDate = p.date