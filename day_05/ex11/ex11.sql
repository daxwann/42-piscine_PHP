SELECT UPPER(u.last_name) AS `NAME`, u.first_name, s.price 
FROM member m
INNER JOIN subscription s ON m.id_sub = s.id_sub
INNER JOIN user_card u ON m.id_member = u.id_user
WHERE s.price > 42 ORDER BY u.last_name, u.first_name;
