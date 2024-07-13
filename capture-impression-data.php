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
