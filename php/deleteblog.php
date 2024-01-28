<?php

include 'sql.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if item ID is set and not empty
if (isset($_GET['item_id']) && !empty($_GET['item_id'])) {
    // Sanitize input to prevent SQL injection
    $item_id = mysqli_real_escape_string($conn, $_GET['item_id']);

    // SQL to delete item from the table
    $sql = "DELETE FROM blogs  WHERE id = $item_id";

    if ($conn->query($sql) === TRUE) {
         header("Location: ../Ad/BlogManagement.php");
    } else {
        echo "Error deleting item: " . $conn->error;
    }
} else {
    echo "Item ID not provided or invalid.";
}

// Close the connection
$conn->close();
?>
