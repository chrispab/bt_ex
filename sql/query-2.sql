# Put the query for query number 2 below

SELECT 
    *,
    IF(mr.club_id IS NULL, 'No', 'Yes') AS HasMembershipRenewal
FROM
    contacts AS c
        INNER JOIN
    membership_renewals AS mr ON mr.contact_id = c.id
GROUP BY c.id
ORDER BY c.first_name DESC;


#2. all fields of all contacts and an additional column saying whether they have ever had a membership_renewals 
#record with a numeric "club_id" value (ie "have they ever been a member of a club?"), sorted by first name, going in reverse alphabetical order



#use group concat or max or min to get actual val =- not a null - 
SELECT 
    *,
    IF(mr.club_id IS NULL, 'No', 'Yes') AS HasMembershipRenewal
FROM
    contacts AS c
        INNER JOIN
    membership_renewals AS mr ON mr.contact_id = c.id
GROUP BY c.id
ORDER BY c.first_name DESC;
