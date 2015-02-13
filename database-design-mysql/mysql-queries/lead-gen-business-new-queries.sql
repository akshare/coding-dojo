-- Question 1
SELECT SUM(billing.amount) AS march_totals
FROM billing
WHERE YEAR(charged_datetime) = 2012
AND MONTH(charged_datetime) = 3;

-- Question 2
SELECT SUM(billing.amount) AS client_totals
FROM billing
WHERE billing.client_id = 2;

-- Question 3
SELECT sites.site_id, sites.domain_name
FROM sites
WHERE sites.client_id = 10;

-- Question 4
SELECT COUNT(sites.site_id), MONTH(sites.created_datetime) AS month, YEAR(sites.created_datetime) AS year
FROM sites
WHERE 
sites.client_id = 1
GROUP BY month, year
ORDER BY year;

SELECT COUNT(sites.site_id), MONTH(sites.created_datetime) AS month, YEAR(sites.created_datetime) AS year
FROM sites
WHERE 
sites.client_id = 20
GROUP BY month, year
ORDER BY year;

-- Question 5
SELECT sites.domain_name, COUNT(leads.leads_id) as total_leads, MONTH(leads.registered_datetime) AS month, YEAR(leads.registered_datetime) AS year
FROM leads
JOIN sites on sites.site_id = leads.site_id
WHERE leads.registered_datetime BETWEEN "2011-01-01 0:0:0" AND "2011-02-16 0:0:0"
GROUP BY sites.site_id
ORDER BY month;

-- Question 6
SELECT CONCAT(clients.first_name, ' ', clients.last_name) as client_name, COUNT(leads.leads_id) as total_leads
FROM leads 
RIGHT JOIN sites on sites.site_id = leads.site_id
LEFT JOIN clients on clients.client_id = sites.client_id
WHERE leads.registered_datetime BETWEEN "2011-01-01 0:0:0" AND "2011-12-31 23:59:59"
GROUP BY clients.client_id
ORDER BY clients.client_id;

-- Question 7
SELECT CONCAT(clients.first_name, ' ', clients.last_name) as client_name, COUNT(leads.leads_id) as total_leads, MONTHNAME(leads.registered_datetime) AS month, YEAR(leads.registered_datetime) AS year
FROM leads 
RIGHT JOIN sites on sites.site_id = leads.site_id
LEFT JOIN clients on clients.client_id = sites.client_id
WHERE leads.registered_datetime BETWEEN "2011-01-01 0:0:0" AND "2011-06-30 23:59:59"
GROUP BY clients.client_id, month
ORDER BY leads.site_id, month;

-- Question 8
SELECT CONCAT(clients.first_name, ' ', clients.last_name) as client_name, sites.domain_name, COUNT(leads.leads_id) as total_leads
FROM leads 
RIGHT JOIN sites on sites.site_id = leads.site_id
LEFT JOIN clients on clients.client_id = sites.client_id
WHERE leads.registered_datetime BETWEEN "2011-01-01 0:0:0" AND "2011-12-31 23:59:59"
GROUP BY sites.domain_name
ORDER BY clients.client_id;

SELECT CONCAT(clients.first_name, ' ', clients.last_name) as client_name, sites.domain_name, COUNT(leads.leads_id) as total_leads
FROM leads 
RIGHT JOIN sites on sites.site_id = leads.site_id
LEFT JOIN clients on clients.client_id = sites.client_id
GROUP BY sites.domain_name
ORDER BY clients.client_id, total_leads DESC;

-- Question 9
SELECT CONCAT(clients.first_name, ' ', clients.last_name) as client_name, billing.amount, MONTHNAME(billing.charged_datetime) as month, YEAR(billing.charged_datetime) as year
FROM clients
LEFT JOIN billing on billing.client_id = clients.client_id;

-- Question 10
SELECT CONCAT(clients.first_name, ' ', clients.last_name) as client_name, GROUP_CONCAT( DISTINCT sites.domain_name ORDER BY sites.domain_name SEPARATOR ' / ')
FROM clients
LEFT JOIN sites on sites.client_id = clients.client_id
GROUP BY clients.client_id;