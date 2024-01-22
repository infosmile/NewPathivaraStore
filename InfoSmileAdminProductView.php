<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
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
// Replace with your database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve all records from the products table
$sql = "SELECT * FROM infosmilenewpathivaraproducts";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<img src="images/' . $row["ProductImage"] . '" alt="' . $row["ProductName"] . '">';
        echo '<p><strong>Product ID:</strong> ' . $row["ProductId"] . '</p>';
        echo '<p><strong>Product Name:</strong> ' . $row["ProductName"] . '</p>';
        echo '<p><strong>Product Category:</strong> ' . $row["ProductCategory"] . '</p>';
        echo '<p><strong>Product Price:</strong> Rs.' . $row["ProductPrice"] . '</p>';
        echo '<p><strong>Product Tag:</strong> ' . $row["ProductTag"] . '</p>';
        echo '<p><strong>Product Tag:</strong> ' . 'images/' . $row["ProductImage"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
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
            window.location.href = 'Admin/login.html';
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