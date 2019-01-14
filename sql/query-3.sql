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
) recentRenewals ON recentRenewals.contact_id = c.id

INNER JOIN membership_renewals mr ON mr.contact_id = c.id AND recentRenewals.MaximumDate = mr.end_date
