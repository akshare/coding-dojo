
/*
1. What query would you run to get all the countries that speak Slovene. Your query should return the name of the country, language and language percentage. You query should arrange the result by language percentage in descending order. 
*/​
​
SELECT countries.name, languages.language, languages.percentage
FROM languages
LEFT JOIN countries ON languages.country_code = countries.code
WHERE language="slovene"​
ORDER BY languages.percentage DESC
​
​/*
2. What query would you run to display the total number of cities for each country. Your query should return the name of the country and the total number of cities. You query should arrange the result by number of cities in descending order.
*/​
​
SELECT countries.name, count(*) as cities
FROM cities
LEFT JOIN countries on cities.country_code = countries.code
GROUP BY countries.name
ORDER BY cities DESC
​
​/*
3. What query would you run to get all the cities in Mexico with a population of greater than 500,000. Your query should arrange the result by population in descending order.
*/​
​
SELECT cities.name, cities.population 
FROM cities
LEFT JOIN countries on cities.country_code = countries.code
WHERE countries.name="mexico" AND cities.population > 500000​
ORDER BY cities.population desc
​
​/*
4. What query would you run to get all language in each country with a percentage greater than 89%. Your query should arrange the result by percentage in descending order.
*/​
​
SELECT countries.name, languages.language, languages.percentage
FROM languages
LEFT JOIN countries on languages.country_code = countries.code
WHERE languages.percentage > 89​
ORDER BY languages.percentage DESC
​
​/*
5. What query would you run to get all the countries with Surface Area below 501 and Population greater than 100,000. 
*/​
​
SELECT name, surface_area, population
FROM countries
WHERE surface_area < 501 AND population > 100000​
​
​/*
6. What query would you run to get all Constitutional Monarchy Countries with a capital greater than 200 and a life expectancy greater than 75 years.
*/​
​
SELECT name, government_form, capital, life_expectancy
FROM countries
WHERE government_form = "constitutional monarchy" 
​AND capital > 200 
​AND life_expectancy > 75 
​
​/*
7. What query would you run to get all the cities of Argentina inside the Buenos Aires district and have population greater than 500, 000. The query should return the Country Name, City Name, District and Population.
*/​
​
SELECT countries.name, cities.name, cities.district, cities.population
FROM cities
LEFT JOIN countries ON cities.country_code = countries.code
WHERE countries.name = 'Argentina' AND cities.district = "Buenos Aires" AND cities.population > 500000​
​
​/*
8. What query would you run to summarize the number of countries in each region. The query should display the name of the region and the number of countries. Also, the query should arrange the result by number of countries in descending order.
*/​
​
SELECT region, count(*) AS countries
FROM countries
GROUP BY region
ORDER BY countries desc
​
