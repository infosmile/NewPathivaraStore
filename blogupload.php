<?php

date_default_timezone_set('UTC');

// Get the current date and format it

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $blogtitle = $_POST["blogtitle"];
    $blogauthor = $_POST["blogauthor"];
    $blogauthorimage = $_POST["blogauthorimage"];
    $blogoneliner = $_POST["blogoneliner"];
    $blogcontent = $_POST["blogcontent"];
    $blogdate = $currentDate = date('Y-m-d'); 

    // Process image upload
    $targetDir = "images/";
    $targetFile = $targetDir . basename($_FILES["blogimage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["blogimage"]["tmp_name"]);
    if ($check !== false) {

        if (file_exists($targetFile)) {
            die("Sorry, the file already exists.");

        } else {

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }


            if ($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png" || $imageFileType === "gif") {

                if (move_uploaded_file($_FILES["blogimage"]["tmp_name"], $targetFile)) {
       

                    include 'php/sql.php';

                    $conn = new mysqli($servername, $username, $password, $dbname);


                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO blogs (blogtitle, blogauthor, blogdate, blogimage , blogcontent, blogoneliner,blogauthorimage)
                            VALUES ('$blogtitle', '$blogauthor', '$blogdate', '" . basename($_FILES["blogimage"]["name"]) . "', '$blogcontent', '$blogoneliner', '$blogauthorimage')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Data stored successfully.";
                        header("Location: Ad/BlogManagement.php");
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
