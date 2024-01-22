<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $productName = $_POST["productName"];
    $productCategory = $_POST["productCategory"];
    $productPrice = $_POST["productPrice"];
    $productTag = $_POST["productTag"];

    // Process image upload
    $targetDir = "images/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check !== false) {
        // Check if the file already exists
        if (file_exists($targetFile)) {
            die("Sorry, the file already exists.");
            // Alternatively, you can use exit();
        } else {
            // Check if the target directory exists; if not, create it
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Check if the file is an allowed image format
            if ($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png" || $imageFileType === "gif") {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
                    // Store the data in a table (you should replace this with your database connection and query)
                    // For example, using MySQL:
                    $conn = new mysqli("localhost", "u521780023_eliza", "azam1azam", "u521780023_eliza");


                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO infosmilenewpathivaraproducts (ProductName, ProductCategory, ProductPrice, ProductImage, ProductTag)
                            VALUES ('$productName', '$productCategory', '$productPrice', '" . basename($_FILES["productImage"]["name"]) . "', '$productTag')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Data stored successfully.";
                        header("Location: InfoSmileAdminProductView.php");
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}
?>

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
