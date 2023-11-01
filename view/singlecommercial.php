<?php
// Initialize your database connection
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Check if the product ID is provided via GET request (you should pass the product ID when clicking on a product)
if (isset($_GET['imageID'])) {
    $productID = $_GET['imageID'];

    // Fetch product details from the database
    $query = "SELECT Enterprise, Description, ImageName1, ImageName2, ImageName3,video, Status, Price, Location, Contact FROM pictures WHERE ImagesID = $productID";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Prakash Properties</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .sildercontent {
            height: 400px;
            width: 100%;

        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../index.php">

                <img src="../Group 2351.png" alt="PropertyDash Logo" style="width: 90px; height: 100px;">
            </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span>
                Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
                    <li class="nav-item "><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="agent.php" class="nav-link">Agent</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item dropdown active">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Properties
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- Dropdown items go here -->
                            <a class="dropdown-item" href="properties.php">Residentail Properties</a>
                            <a class="dropdown-item" href="commercialPropertiy.php">Commercial Properties</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-0 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="properties.php">Properties <i class="fa fa-chevron-right"></i></a></span> <span>Properties Single <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-3 bread">Property Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <?php if (isset($product)) : ?>
            <center>
                <h1><?php echo $product['Enterprise']; ?></h1>
            </center>

            <div class="row">
                <div class="col-lg-6 sildercontent">
                    <!-- Carousel for images and video -->
                    <div id="productCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            // Display images
                            $imagePaths = array(
                                "../uploaded_photo/{$product['ImageName1']}",
                                "../uploaded_photo/{$product['ImageName2']}",
                                "../uploaded_photo/{$product['ImageName3']}"
                            );

                            foreach ($imagePaths as $index => $imagePath) {
                                echo '<div class="carousel-item' . ($index === 0 ? ' active' : '') . '">';
                                echo '<img src="' . $imagePath . '" class="d-block w-100 resized-image" alt="Product Image ' . ($index + 1) . '">';
                                echo '</div>';
                            }

                            // Display video
                            // if (!empty($product['VideoName1'])) {
                            //     echo '<div class="carousel-item">';
                            //     echo '<video controls width="100%"><source src="./uploaded_video/' . $product['VideoName'] . '" type="video/mp4"></video>';
                            //     echo '</div>';
                            // }
                            ?>
                            <div class="carousel-item">
                                <video controls width="100%">
                                    <source src="../uploaded_video/<?php echo $product['video']; ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" ariahidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Enquire button -->
                    <p>Status: <?php echo $product['Status']; ?></p>
                    <p><?php echo $product['Description']; ?></p>
                    <p>Price: <?php echo $product['Price']; ?></p>
                    <p>Locaton: <?php echo $product['Location']; ?></p>
                    <p>Contact: <?php echo $product['Contact']; ?></p>
                    <a href="contact.php" class="btn btn-primary">Enquire Now</a>
                </div>
            </div>
        <?php else : ?>
            <p>Product not found.</p>
        <?php endif; ?>
    </div>

    <style>
        .resized-image {
            max-height: 400px;
            /* Set your desired maximum height */
            max-width: 100%;
            /* Maintain aspect ratio and fit within the container */
        }

        .carousel-control-next,
        .carousel-control-prev {
            /* background-color: green; */
            height: 55%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }
    </style>




<footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <a class="navbar-brand" href="index.php">
              <img src="../newlogo (2).png" alt="PropertyDash Logo" style="width: 150px; height: 150px;">
            </a>
            <ul class="ftco-footer-social list-unstyled mt-5">
              <li class="ftco-animate"><a href="https://www.linkedin.com/company/100705638/admin/feed/posts/"><span class="fa fa-linkedin"></span></a></li>
              <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=61551836951366"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/official_prakashproperties/"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Community</h2>
            <ul class="list-unstyled">
              <li><a href="index.php"><span class="fa fa-chevron-right mr-2"></span>Search Properties</a></li>
              <li><a href="agent.php"><span class="fa fa-chevron-right mr-2"></span>For Agents</a></li>
              <li><a href="about.php"><span class="fa fa-chevron-right mr-2"></span>Reviews</a></li>
              <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">About Us</h2>
            <ul class="list-unstyled">
              <li><a href="about.php"><span class="fa fa-chevron-right mr-2"></span>Our Story</a></li>
              <li><a href="agent.php"><span class="fa fa-chevron-right mr-2"></span>Meet the team</a></li>
              <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>Contact Us</a></li>
            </ul>
          </div>
        </div>
        <!-- <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Company</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Press</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div> -->
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+91 9821001425</span></a></li>
                <li><a href="#"><span class="icon fa fa-envelope pr-4"></span><span class="text">info@prakashproperties.com</span></a></li>
                <li><span class="icon fa fa-map"></span><span class="text">Address: Office 10 Ground Floor Tower A, Unitech Business Zone, Sector-50 Golf Course Extension Road, Gurugram, Haryan.</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
  </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/scrollax.min.js"></script>
    <script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../js/google-map.js"></script>
    <script src="../js/main.js"></script>



</body>

</html>