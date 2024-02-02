<?php
// Disable error reporting
error_reporting(0);

// Don't display errors on the screen
ini_set('display_errors', 0);



$blogtitle = "";
$blogimage = "";
$blogcontent = "";
$blogdate= "";
$blogauthor= "";
$blogauthorimage= "";
$blogoneliner="";




include 'php/sql.php';



if(isset($_GET["id"]))
{
$Id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM  blogs Where id= $Id";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $blogtitle = $row["blogtitle"];
$blogimage = $row["blogimage"];
$blogcontent = $row["blogcontent"];
$blogdate = $row["blogdate"];
$blogauthor= $row["blogauthor"];
$blogauthorimage= $row["blogauthorimage"];
$blogoneliner=$row["blogoneliner"];
  }
} else {
  echo "0 results";
}
$conn->close();
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Benefits of Mindfulness Meditation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #20c997;
            color: #ecf0f1;
            padding: 1em;
            text-align: center;
        }

        section {
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        article {
            margin-bottom: 2em;
            border-bottom: 1px solid #eee;
            padding-bottom: 1em;
        }

        article h2 {
            color: #2c3e50;
            display: flex;
            align-items: center;
        }

        article img {
            border-radius: 50%;
            margin-right: 1em;
        }

        article .cover-image {
            width: 100%;
            max-height: 300px;
            /* Adjust the maximum height as needed */
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1em;
        }

        article p {
            color: #555;
        }

        article .meta-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1em;
        }

        article .author-info {
            display: flex;
            align-items: center;
        }

        article a {
            color: #3498db;
            text-decoration: none;
        }

        article a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <header>
        <h1>New Pathivara Blog</h1>
    </header>

    <section>
        <article>
            <h2>
                <img src="<?php echo $blogauthorimage; ?>" alt="NewPathivaraFurnishingCenterBlogAuthor" width="30" height="30">
                <?php echo $blogtitle; ?>
            </h2>
            <img src="<?php echo "images/" . $blogimage; ?>" alt="NewPathivaraFurnishingCenterBlogImage" class="cover-image">
            <div class="meta-info">
                <div class="author-info">
                    <span>By <?php echo $blogauthor; ?></span>
                </div>
                <span>Date: <?php echo $blogdate; ?></span>
            </div>
            <p><?php echo $blogcontent; ?></p>


        </article>


    </section>

</body>

</html>