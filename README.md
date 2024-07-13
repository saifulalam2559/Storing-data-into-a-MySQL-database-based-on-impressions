Storing Impression Data into MySQL Database Using PHP
This repository demonstrates how to store impression data into a MySQL database using PHP. The impression data includes the timestamp of the visit, the visitor's IP address, and the page URL.

Database Setup
First, set up a MySQL database with a table to store the impression data. Use the following SQL script to create the table:

CREATE TABLE `impressions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `ip_address` VARCHAR(50) NOT NULL,
    `page_url` VARCHAR(255) NOT NULL
);

