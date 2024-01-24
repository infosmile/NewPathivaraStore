<?php
// Database connection parameters
// include '../php/sql.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$jsonData = "";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data
    $sql = "SELECT * FROM infosmilenewpathivarapagecontent";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result === false) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Fetch data and store in an array
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        
        // Output the JSON data with proper encoding
        echo $jsonData;

    } else {
        die("No data found in the table.");
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
} finally {
    // Close the database connection
    if (isset($conn)) {
        $conn->close();
    }
}
?>
