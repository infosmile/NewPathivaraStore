<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these database connection details with your actual database credentials
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

    // Retrieve user credentials from the form
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Query to check if the username and password match the database
    $sql = "SELECT * FROM infosmilenewpathivaraadmin WHERE username = '$inputUsername' AND password = '$inputPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Match found, set cookies and redirect to index.php
        setcookie("pathivarausername", $inputUsername, time() + 3600, "/");
        setcookie("pathivarapassword", $inputPassword, time() + 3600, "/");
        header("Location: index.php");
    } else {
        // Invalid login, redirect back to login.html
        header("Location: /InfoSmile/NewPathivara/Admin/login.html");
    }

    $conn->close();
}
?>
