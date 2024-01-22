<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT * FROM  infosmilenewpathivaraproducts Where ProductTag = 'Featured' AND ProductCategory != 'InternalContent'";
$result = $conn->query($sql);

// Store data in an array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Return data as JSON
echo json_encode($data);
?>