SELECT u.name, o.total
FROM users u
JOIN orders o ON u.id = o.user_id;

SELECT DISTINCT u.name
FROM users u
JOIN orders o ON u.id = o.user_id;

SELECT u.name, o.total, o.created_at
FROM users u
JOIN orders o ON u.id = o.user_id;