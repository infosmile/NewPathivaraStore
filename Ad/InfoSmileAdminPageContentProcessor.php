<?php
ini_set('log_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "u521780023_eliza";
$password = "azam1azam";
$dbname = "u521780023_eliza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to update content in the database
function updateContent($name, $content, $conn) {
    $name = $conn->real_escape_string($name);
    $content = $conn->real_escape_string($content);

    $sql = "UPDATE infosmilenewpathivarapagecontent SET content = '$content' WHERE name = '$name'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through all form fields and update the content
    foreach ($_POST as $name => $value) {
        // Skip the submit button
        if ($name != "Submit") {
            updateContent($name, $value, $conn);
        }
    }

    // Redirect back to the form after updating
    header("Location: ./");
    exit();
}

// Close the database connection
$conn->close();
?>
