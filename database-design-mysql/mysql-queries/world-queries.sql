-- Question 1
SELECT countries.name, languages.language, languages.percentage 
FROM countries
JOIN languages on countries.id = languages.country_id
AND languages.language = "Slovene"
ORDER BY languages.percentage DESC;

-- Question 2
SELECT countries.name, COUNT(cities.ID) AS total_cities
FROM countries
JOIN cities on countries.id = cities.country_id
GROUP BY countries.id
ORDER BY total_cities DESC;

-- Question 3
SELECT cities.name, cities.population
FROM countries
JOIN cities on countries.id = cities.country_id
WHERE countries.name = "Mexico"
AND cities.population > 500000
ORDER BY cities.population DESC;

-- Question 4
SELECT countries.name, languages.language, languages.percentage
FROM countries
JOIN languages on countries.id = languages.country_id
WHERE languages.percentage > 85
ORDER BY languages.percentage DESC;

-- Question 5
SELECT countries.name, countries.surface_area, countries.population
FROM countries
WHERE countries.surface_area < 501
AND countries.population > 100000
ORDER BY countries.name ASC;

-- Question 6
SELECT countries.name, countries.government_form, countries.capital, countries.life_expectancy
FROM countries
WHERE countries.government_form = "Constitutional Monarchy"
AND countries.capital > 200
AND countries.life_expectancy > 75;
ORDER BY countries.name ASC;

-- Question 7
SELECT countries.name, cities.name, cities.district, cities.population
FROM countries
JOIN cities ON countries.id = cities.country_id
WHERE cities.district = "Buenos Aires"
AND cities.population > 500000
ORDER BY cities.name ASC;

-- Question 8
SELECT countries.region, COUNT(countries.ID) AS count_countries
FROM countries
GROUP BY countries.region
ORDER BY count_countries DESC;