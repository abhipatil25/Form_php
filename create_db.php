<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abhi_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// Create database

// $sql = "create table users (firstname varchar(15) not null,
// 							lastname varchar(15) not null,
// 							e_mail varchar(50) not null,
// 							password varchar(12) not null)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>