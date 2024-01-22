

<?php
ini_set('log_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "u521780023_eliza";
$password = "azam1azam";
$dbname = "u521780023_eliza";

$jsonData = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT * FROM infosmilenewpathivarapagecontent ";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and store in an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

  
    $jsonData =  json_encode($data, JSON_PRETTY_PRINT);

} else {
    //echo "No data found in the table.";
}


function getContentByName($name, $jsonData) {
    // Decode the JSON data
    $data = json_decode($jsonData, true);

    // Check if decoding was successful
    if ($data === null) {
        return "Invalid JSON data";
    }

    // Search for the "content" value based on the "name"
    foreach ($data as $item) {
        if (isset($item['name']) && isset($item['content']) && $item['name'] === $name) {
            return $item['content'];
        }
    }

    return "Name not found";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            /* Adjust the width as needed */
            max-width: 800px;
            /* Set a maximum width */
            margin: auto;
            /* Center the form */
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            grid-column: span 3;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .small-button {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid #3498db;
            color: #3498db;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Hover effect */
        .small-button:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>

<body>

    <form action="InfoSmileAdminPageContentProcessor.php" method="post">

        <div>
            <label for="mainlogo">mainlogo:</label>
            <input type="text" id="mainlogo" name="mainlogo" value="<?php echo getContentByName("mainlogo",$jsonData);?>" required>

            <label for="introvideo">introvideo:</label>
            <input type="text" id="introvideo" name="introvideo" value="<?php echo getContentByName("introvideo",$jsonData);?>" required>

            <label for="aboutus">aboutus:</label>
            <input id="aboutus" name="aboutus" rows="4" value="<?php echo getContentByName("aboutus",$jsonData);?>" required>
        </div>

        <div>
            <label for="testimonial-1-image">testimonial-1-image:</label>
            <input type="text" id="testimonial-1-image" name="testimonial-1-image" value="<?php echo getContentByName("testimonial-1-image",$jsonData);?>" required>

            <label for="testimonial-1-name">testimonial-1-name:</label>
            <input type="text" id="testimonial-1-name" name="testimonial-1-name" value="<?php echo getContentByName("testimonial-1-name",$jsonData);?>" required>

            <label for="testimonial-1-job">testimonial-1-job:</label>
            <input type="text" id="testimonial-1-job" name="testimonial-1-job" value="<?php echo getContentByName("testimonial-1-job",$jsonData);?>" required>

            <label for="testimonial-1-comment">testimonial-1-comment:</label>
            <input id="testimonial-1-comment" name="testimonial-1-comment" rows="4" value="<?php echo getContentByName("testimonial-1-comment",$jsonData);?>" required>
        </div>

        <div>
            <label for="testimonial-2-image">testimonial-2-image:</label>
            <input type="text" id="testimonial-2-image" name="testimonial-2-image" value="<?php echo getContentByName("testimonial-2-image",$jsonData);?>" required>

            <label for="testimonial-2-name">testimonial-2-name:</label>
            <input type="text" id="testimonial-2-name" name="testimonial-2-name" value="<?php echo getContentByName("testimonial-2-name",$jsonData);?>" required>

            <label for="testimonial-2-job">testimonial-2-job:</label>
            <input type="text" id="testimonial-2-job" name="testimonial-2-job" value="<?php echo getContentByName("testimonial-2-job",$jsonData);?>" required>

            <label for="testimonial-2-comment">testimonial-2-comment:</label>
            <input id="testimonial-2-comment" name="testimonial-2-comment" rows="4" value="<?php echo getContentByName("testimonial-2-comment",$jsonData);?>" required>
        </div>

        <div>

            <label for="trendingImage1">trendingImage1:</label>
            <input type="text" id="trendingImage1" name="trendingImage1" value="<?php echo getContentByName("trendingImage1",$jsonData);?>" required>

            <label for="trendingImage2">trendingImage2:</label>
            <input type="text" id="trendingImage2" name="trendingImage2" value="<?php echo getContentByName("trendingImage2",$jsonData);?>" required>

            <label for="trendingImage3">trendingImage3:</label>
            <input type="text" id="trendingImage3" name="trendingImage3" value="<?php echo getContentByName("trendingImage3",$jsonData);?>" required>

            <label for="trendingImage4">trendingImage4:</label>
            <input type="text" id="trendingImage4" name="trendingImage4" value="<?php echo getContentByName("trendingImage4",$jsonData);?>" required>
        </div>

        <div>

            <label for="aboutshopaddress">about shop address:</label>
            <input type="text" id="aboutshopaddress" name="aboutshopaddress" value="<?php echo getContentByName("aboutshopaddress",$jsonData);?>" required>

            <label for="aboutshopphone">about shop phone:</label>
            <input type="text" id="aboutshopphone" name="aboutshopphone" value="<?php echo getContentByName("aboutshopphone",$jsonData);?>" required>

            <label for="aboutshopemail">about shop email:</label>
            <input type="text" id="aboutshopemail" name="aboutshopemail" value="<?php echo getContentByName("aboutshopemail",$jsonData);?>" required>

            <label for="footerInformationContent">footer Information Content:</label>
            <input type="text" id="footerInformationContent" name="footerInformationContent" value="<?php echo getContentByName("footerInformationContent",$jsonData);?>" required>
        </div>

        <input type="submit" value="Submit">

        <a href="/InfoSmile/NewPathivara/Admin/InfoSmileAdminProductUpload.html" class="small-button">Add Products</a>
        <a href="/InfoSmile/NewPathivara/InfoSmileAdminProductView.php" class="small-button">View Products</a>
    </form>
  
</body>

</html>

<script>
        // Check for existing username and password cookies on page load
        document.addEventListener('DOMContentLoaded', function () {
            const savedUsername = getCookie('pathivarausername');
            const savedPassword = getCookie('pathivarapassword');

            if (savedUsername && savedPassword) {
          
            }
            else
            {
                window.location.href = '/InfoSmile/NewPathivara/Admin/login.html';
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


