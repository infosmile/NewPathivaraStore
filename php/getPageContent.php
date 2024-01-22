<?php

$servername = "localhost";
$username = "u521780023_eliza";
$password = "azam1azam";
$dbname = "u521780023_eliza";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT * FROM  infosmilenewpathivarapagecontent";
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
