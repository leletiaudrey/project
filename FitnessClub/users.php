<?php

// Connect to the gym database
$conn = mysqli_connect('localhost', 'admin', ',mypassword', 'fitnessdb');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a users table
$sql = "CREATE TABLE users (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        NAME VARCHAR(30) NOT NULL,
        AGE INT(3) NOT NULL,
        GENDER ENUM('M', 'F', 'O') NOT NULL,
        EMAIL VARCHAR(50),
        PHONE VARCHAR(20),
        JOIN_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        ACTIVE TINYINT(1) NOT NULL DEFAULT 1
    )";

if (mysqli_query($conn, $sql)) {
    echo "Users table created successfully";
} else {
    echo "Error creating users table: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>
