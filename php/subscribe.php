<?php

// Disable error reporting
error_reporting(0);

// Don't display errors on the screen
ini_set('display_errors', 0);
 

$Email = $_POST["email"];



include 'sql.php';

  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customerorder (email, Tag)
VALUES ('$Email','subscribe')";

if ($conn->query($sql) === TRUE) {

 // header("Location: productBuy.php?pid=$ProductId&postmessage=Thank you for contacting, We will get back to you as soon as possible");
//exit;

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

    <!--Meta detail to be added for SEO-->

  <title>New Pathivara</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />

  <script src="../js/custom2.js"></script>


</head>

<body>
  

<?php echo "<div class=\"overlay\" id=\"popup\">
    <div class=\"popup-content\">
        <span class=\"close-btn\" onclick=\"closePopup()\">×</span>
        <h4>Thank you for Subscribing to us!</h4>
        <a href=\"../index.html\"><button>Ok</button></a>
    </div>
</div>";;?>

      




</body>
</body>

</html>