
<?php


// Disable error reporting
error_reporting(0);

// Don't display errors on the screen
ini_set('display_errors', 0);



$productImage = "";
$productName = "";
$ProductSpecs = "";
$productPrice= "";




include 'php/sql.php';



if(isset($_GET["pid"]) && !isset($_GET["name"]) && !isset($_GET["address"]) && !isset($_GET["message"]))
{
$ProductId = $_GET["pid"];
$postmessage = "";

$printMessage = "";

if(isset($_GET["postmessage"]))
{
  $postmessage = $_GET["postmessage"];

$printMessage = "<div class=\"overlay\" id=\"popup\">
    <div class=\"popup-content\">
        <span class=\"close-btn\" onclick=\"closePopup()\">×</span>
        <h4>Thank you for placing your Order!</h4>
        <p>$postmessage</p>
        <a href=\"Index.html\"><button>Ok</button></a>
    </div>
</div>";
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM  infosmilenewpathivaraproducts Where ProductId= $ProductId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $productId = $row["ProductId"];
$productImage = $row["ProductImage"];
$productName = $row["ProductName"];
$ProductSpecs = $row["specification"];
$productPrice= $row["ProductPrice"];
  }
} else {
  echo "0 results";
}
$conn->close();
}




if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["message"]))
{
$ProductId = $_POST["pid"];  
$Name = $_POST["name"];
$Address = $_POST["address"];
$Phone = $_POST["phone"];
$Email = $_POST["email"];
$Message = $_POST["message"];




  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customerorder (fullname, phone, email,fulladdress, fullmessage, productId, Tag)
VALUES ('$Name', '$Phone', '$Email', '$Address','$Message', '$ProductId','customerorder')";

if ($conn->query($sql) === TRUE) {

  header("Location: productBuy.php?pid=$ProductId&postmessage=Thank you for contacting, We will get back to you as soon as possible");
exit;

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}



else
{

}
?>


<!DOCTYPE html>
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
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="js/custom2.js"></script>


</head>

<body>
  <div class="hero_area" style="height: auto;">



    <!-- header section strats -->
    <header class="header_section">

     

      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img id="MainLogoImg" src="" alt="" />            
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#aboutsection"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contactsection">Contact us</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="">
              </a>
            </div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1" style="background-color: black;">

                </span>
                <span class="s-2" style="background-color: black;">

                </span>
                <span class="s-3" style="background-color: black;">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
  
  

    <!-- slider section -->





  
 </div>












  <!-- contact section -->
<section id="contactsection">
  <section class="contact_section layout_padding">
    <div class="container ">
      <div class="heading_container">
        <h4 class="buyingproductname">
          <?php echo $productName; ?>
        </h4>
      </div>

    </div>
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <div class="map_container">
            <img id="buyingproductimage" src="images/<?php echo $productImage; ?>" style="height:500px; width:100%;">

          </div>
        </div>


        <div class="col-md-6">
          <h5>
          <pricetagname style="color:#24d278;">Price</pricetagname><currency> : Rs.</currency>  <price id="buyingproductprice"><?php echo $productPrice; ?><price/>
        </h5>
          <h6>
            Specifications: 
          </h6>
         <p id="buyingproductspecification">
          <?php echo $ProductSpecs; ?>
          
         </p>
          <h6>
            Send Query:
          </h6>
          <form action="ProductBuy.php" method="POST">
            <div>
              <input type="text" name = "name" placeholder="Name" required/>
            </div>
            <div>
              <input type="email" name = "email" placeholder="Email(Optional)" />
            </div>
            <div>
              <input type="text" name = "phone" placeholder="Phone" required/>
            </div>
            <div>
              <input type="text" name = "address" placeholder="Address" />
            </div>
            <div>
              <input type="text" name = "message" class="message-box" placeholder="Message(Optional)" />
            </div>
            <div>
              <input id = "formvaluepid" style="display:none" type="text" name = "pid" value = "<?php echo $productId; ?>" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
        
      </div>


<?php echo $printMessage;?>

      




      <div class="row">

<div class="col-md-8">
 
</div>



      </div>


    </div>
  </section>
</section>
  <!-- end contact section -->


  <!-- end client section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          New Pathivara Store
        </h2>
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p id="aboutshopaddress">
               
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p id="aboutshopphone">
               
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p id="aboutshopemail">
                
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p id="footerInformationContent">
              
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              Instagram
            </h5>
            <div class="insta_container">
              <div>
                <a href="">
                  <div class="insta-box b-1">
                    <img src="images/i-1.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="images/i-2.jpg" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/i-3.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/i-4.jpg" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/i-5.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/i-6.jpg" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="https://www.facebook.com/rubal.sharma.90"> 
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; 2019 All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        420: {
          items: 2
        },
        1000: {
          items: 5
        }
      }

    });
  </script>
  <script>
    var nav = $("#navbarSupportedContent");
    var btn = $(".custom_menu-btn");
    btn.click
    btn.click(function (e) {

      e.preventDefault();
      nav.toggleClass("lg_nav-toggle");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    });
  </script>
  <script>
    $('.carousel').on('slid.bs.carousel', function () {
      $(".indicator-2 li").removeClass("active");
      indicators = $(".carousel-indicators li.active").data("slide-to");
      a = $(".indicator-2").find("[data-slide-to='" + indicators + "']").addClass("active");
      console.log(indicators);

    })
  </script>


<script>
  // Add the 'show' class to all images after a delay to trigger the fade-in effect
  document.addEventListener('DOMContentLoaded', function () {
    var images = document.querySelectorAll('.product-image ');
    images.forEach(function (image) {
      image.classList.add('show');
    });
  });
</script>

<script>
  // Add the 'show' class to all images after a delay to trigger the fade-in effect
  document.addEventListener('DOMContentLoaded', function () {
    var images = document.querySelectorAll('.aboutusimage');
    images.forEach(function (image) {
      image.classList.add('show');
    });
  });
</script>


</body>
</body>

</html>


