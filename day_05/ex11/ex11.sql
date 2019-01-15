SELECT UPPER(u.last_name) AS `NAME`, u.first_name, s.price 
FROM user_card u
INNER JOIN member m ON m.id_member = u.id_user
INNER JOIN subscription s ON m.id_sub = s.id_sub
WHERE s.price > 42 ORDER BY u.last_name, u.first_name;
