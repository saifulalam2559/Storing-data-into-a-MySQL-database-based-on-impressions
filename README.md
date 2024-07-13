# Storing Impression Data into MySQL Database Using PHP

This repository demonstrates how to store impression data into a MySQL database using PHP. The impression data includes the timestamp of the visit, the visitor's IP address, and the page URL.


1. **Clone the repository:**
    ```bash
    git clone https://github.com/saifulalam2559/Storing-data-into-a-MySQL-database-based-on-impressions.git
    ```


## Database Setup

First, set up a MySQL database with a table to store the impression data.

```
CREATE TABLE `impressions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `ip_address` VARCHAR(50) NOT NULL,
    `page_url` VARCHAR(255) NOT NULL
);

```
