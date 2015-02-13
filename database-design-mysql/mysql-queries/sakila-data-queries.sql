-- Question 1
SELECT customer.first_name, customer.last_name, customer.email, address.address
FROM address
JOIN customer on address.address_id = customer.address_id
WHERE address.city_id = 312

-- Question 2
SELECT film.title, film.description, film.release_year, film.rating, category.name AS genre
FROM film
JOIN film_category ON film.film_id = film_category.film_id
JOIN category ON category.category_id = film_category.category_id
AND category.name = "Comedy"

-- Question 3
SELECT actor.actor_id, actor.first_name, film.title, film.description, film.release_year, film.rating, film.special_features, category.name AS genre
FROM film
JOIN film_actor ON film.film_id = film_actor.film_id 
JOIN actor ON actor.actor_id = film_actor.actor_id
JOIN film_category ON film.film_id = film_category.film_id
JOIN category ON category.category_id = film_category.category_id
AND actor.actor_id = 5;

-- Question 4
SELECT address.city_id, customer.store_id, customer.first_name, customer.last_name, customer.email, address.address
FROM customer
LEFT JOIN address on address.address_id = customer.address_id
WHERE customer.store_id = 1
AND address.city_id IN (1,42,312,459);

-- Question 5
SELECT film.title, film.description, film.release_year, film.rating, film.special_features
FROM film
JOIN film_actor ON film.film_id = film_actor.film_id 
WHERE film.rating = "G"
AND film.special_features LIKE "%behind the scenes%"
AND film_actor.actor_id = 15;

-- Question 6
SELECT film.film_id, film.title, actor.actor_id, CONCAT_WS(actor.first_name, actor.last_name) AS name
FROM film
JOIN film_actor ON film.film_id = film_actor.film_id 
JOIN actor ON actor.actor_id = film_actor.actor_id
WHERE 
film.film_id = 369;

-- Question 7
SELECT film.title, film.description, film.release_year, film.rating, film.special_features, category.name AS genre
FROM film
JOIN film_category ON film.film_id = film_category.film_id
JOIN category ON category.category_id = film_category.category_id
AND category.name = "Drama"
AND film.rental_rate = 2.99;

-- Question 8
SELECT film.title, film.description, film.release_year, film.rating, film.special_features, category.name AS genre,
actor.first_name, actor.last_name
FROM film
JOIN film_actor ON film.film_id = film_actor.film_id 
JOIN actor ON actor.actor_id = film_actor.actor_id
JOIN film_category ON film.film_id = film_category.film_id
JOIN category ON category.category_id = film_category.category_id
AND actor.first_name = "SANDRA"
AND actor.last_name = "KILMER"
AND category.name = "Action";