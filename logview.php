<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .product-card {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
include 'php/sql.php';
// Replace with your database connection details
$host = $servername;
$username = $username;
$password = $password;
$database = $dbname;


if($_GET["q"] == "1")
{

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM customerorder WHERE Tag ='customerorder'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h1>Orders</h1>";
    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
       echo '<div class="product-card">';
        echo '<p><strong>ProductId:</strong> ' . $row["productId"] . '</p>';
        echo '<br>';
        echo '<p><strong>Full Name:</strong> ' . $row["fullname"] . '</p>';
        echo '<br>';
        echo '<p><strong>Phone:</strong> ' . $row["phone"] . '</p>';
        echo '<br>';
        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
        echo '<br>';
        echo '<p><strong>Address:</strong> ' . $row["fulladdress"] . '</p>';
        echo '<br>';
        echo '<p><strong>Message:</strong> ' . $row["fullmessage"] . '</p>';
        echo '<br>';
        echo '<br>';
         echo '</div>';
      
    }
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();  
}



if($_GET["q"] == "2")
{

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM customerorder WHERE Tag ='contact'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h1>Contact us</h1>";
    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
       echo '<div class="product-card">';
        echo '<p><strong>Full Name:</strong> ' . $row["fullname"] . '</p>';
        echo '<br>';
        echo '<p><strong>Phone:</strong> ' . $row["phone"] . '</p>';
        echo '<br>';
        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
        echo '<br>';
        echo '<p><strong>Message:</strong> ' . $row["fullmessage"] . '</p>';
        echo '<br>';
        echo '<br>';
         echo '</div>';
      
    }
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();  
}


if($_GET["q"] == "3")
{

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM customerorder WHERE Tag ='subscribe'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h1>Email Subscriber</h1>";
    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
       echo '<div class="product-card">';
        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
        echo '<br>';
         echo '</div>';
      
    }
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();  
}


?>

</body>
</html>

<script>
    // Check for existing username and password cookies on page load
    document.addEventListener('DOMContentLoaded', function () {
        const savedUsername = getCookie('pathivarausername');
        const savedPassword = getCookie('pathivarapassword');

        if (savedUsername && savedPassword) {

        }
        else {
            window.location.href = 'Ad/login.html';
        }
    });

    // Function to get cookie value by name
    function getCookie(name) {
        const cookies = document.cookie.split(';');
        for (const cookie of cookies) {
            const [cookieName, cookieValue] = cookie.trim().split('=');
            if (cookieName === name) {
                return cookieValue;
            }
        }
        return null;
    }

    // Display error message if provided in the URL (e.g., login.php?error=1)
    const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = urlParams.get('error');

    if (errorMessage) {
        document.getElementById('errorMessage').textContent = 'Invalid username or password. Please try again.';
    }
</script>