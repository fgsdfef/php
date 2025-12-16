SELECT u.name
FROM users u
JOIN orders o ON u.id = o.user_id
GROUP BY u.name
HAVING SUM(o.total) > 1000;

SELECT u.name, o.total
FROM orders o
JOIN users u ON u.id = o.user_id
WHERE o.total = (SELECT MAX(total) FROM orders);

SELECT u.name
FROM users u
JOIN orders o ON u.id = o.user_id
GROUP BY u.name
HAVING COUNT(o.id) >
    (SELECT AVG(order_count)
     FROM (SELECT COUNT(id) AS order_count FROM orders GROUP BY user_id) t);