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

## PHP Script to Capture Impressions

1. **Connect to MySQL Database**

Use PHP's MySQLi or PDO extension to connect to your MySQL database. Replace 'hostname', 'username', 'password', and 'database' with your actual database credentials.

```
<?php
$hostname = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

2.  **Capture Impression Data**

   In the webpage or script where you want to track impressions, insert PHP code to capture relevant data and store it in the database.

   ```
<?php
// Function to get visitor's IP address
function getIpAddress() {
    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Get visitor's IP address
$ipAddress = getIpAddress();

// Get current page URL
$pageUrl = $_SERVER['REQUEST_URI'];

// SQL query to insert impression data into the database
$sql = "INSERT INTO impressions (ip_address, page_url) VALUES ('$ipAddress', '$pageUrl')";

if ($conn->query($sql) === TRUE) {
    echo "Impression recorded successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
```
