SELECT users.first_name, users.last_name, friendships.users_id, friendships.friend_id, users2.first_name AS friend_first_name, users2.last_name AS friend_last_name
FROM users
LEFT JOIN friendships ON friendships.users_id = users.id
LEFT JOIN users as users2 on users2.id = friendships.friend_id
ORDER BY users.first_name ASC;