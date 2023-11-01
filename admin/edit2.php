<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Delete property
if (isset($_GET['delete_property'])) {
  $propertyID = $_GET['delete_property'];

  // Add code to delete the property based on $propertyID
  $deleteSQL = "DELETE FROM pictures WHERE ImagesID = $propertyID";
  if (mysqli_query($db, $deleteSQL)) {
    echo '<script>alert("Property deleted successfully!");</script>';
    echo '<script>window.location.href = "edit2.php";</script>';

  } else {
    echo "Error deleting property: " . mysqli_error($db);
  }
}

// Retrieve existing properties
$propertyList = mysqli_query($db, "SELECT * FROM pictures");
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Properties</title>
    <!-- Add any necessary CSS styles here -->

<!-- </head>
<body>

</body>
</html> -->



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
</head>

<body>
  <style>
    .property-wrap {
      border: 1px solid #ccc;
      border-radius: 5px;
      margin: 10px;
      padding: 10px;
      width: 100%;
      /* Initially, the card takes full width */
      max-width: 400px;
      /* Limit the maximum width to 400px */
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .row.ftco-animate {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    @media screen and (max-width: 768px) {
      .property-wrap {
        max-width: 300px;
        /* Reduce the maximum width for medium-sized screens */
      }
    }

    @media screen and (max-width: 425px) {
      .property-wrap {
        max-width: 250px;
        /* Reduce the maximum width for small-sized screens */
      }
    }

    @media screen and (max-width: 325px) {
      .property-wrap {
        max-width: 200px;
        /* Further reduce the maximum width for extra small screens */
      }
    }

    .delete-button,
    .update-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #FF0000;
      /* Red color for Delete button */
      color: #FFFFFF;
      /* White text color */
      text-decoration: none;
      /* Remove underline from links */
      margin-right: 10px;
      /* Add some space between the buttons */
      border-radius: 5px;
      /* Add rounded corners */
    }

    .update-button {
      background-color: #008000;
      /* Green color for Update button */
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="../Group 2351.png" alt="PropertyDash Logo" style="width: 90px; height: 100px;">
      </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="admin.php" class="nav-link">Dashboard</a></li>
          <li class="nav-item "><a href="add_commerical.php" class="nav-link">Add Property</a></li>

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
          <p class="breadcrumbs"><span class="mr-2"><a href="admin.php">Dashboard <i class="fa fa-chevron-right"></i></a></span> <span>See Property <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-3 bread"> Commercial Property's</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Featured Properties</h2>
        </div>
      </div>
      <div class="row ftco-animate">
      <?php $count = 0; ?>
        <?php while ($property = mysqli_fetch_assoc($propertyList)) { ?>
          <div class="col-md-4"> <!-- This div wraps each property card and limits to 3 per row -->
            <div class="item">
              <div class="property-wrap ftco-animate">
                <a href="#" class="img" style="background-image: url('../uploaded_photos/<?php echo $property['ImageName1']; ?>');"
>
                  <div class="rent-sale">
                    <span class="sale">Sale</span>
                  </div>
                  <p class="price"><span class="orig-price">Price: <?php echo $property['Price']; ?></span></p>
                </a>
                <div class="text">
                  <ul class="property_list">
                    <li><span class="flaticon-bed"></span> Type:<?php echo $property['propertytype']; ?></li>
                    <li><span class="flaticon-bathtub"></span>Size:<?php echo $property['propertysize']; ?></li>
                  </ul>
                  <h3><a href="#"><?php echo $property['Enterprise']; ?></a></h3>
                  <span class="location"><?php echo $property['Location']; ?></span>
                  <a href="#" class="d-flex align-items-center justify-content-center btn-custom">
                    <span class="fa fa-link"></span>
                  </a>
                </div>
                <div class="text">
                  <!-- Other property details -->
                  <a href="?delete_property=<?php echo $property['ImagesID']; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
                  <a href="updatecommercial.php?property_id=<?php echo $property['ImagesID']; ?>" class="update-button">Update</a>
                </div>

              </div>
            </div>
          </div>
          <?php $count++; ?>
          <?php if ($count % 3 === 0) echo '</div><div class="row ftco-animate">'; ?> <!-- Start a new row every 3 cards -->
        <?php } ?>
      </div>
    </div>
  </section>



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
              <li><a href="../index.php"><span class="fa fa-chevron-right mr-2"></span>Search Properties</a></li>
              <li><a href="../view/agent.php"><span class="fa fa-chevron-right mr-2"></span>For Agents</a></li>
              <li><a href="../view/about.php"><span class="fa fa-chevron-right mr-2"></span>Reviews</a></li>
              <li><a href="../view/contact.php"><span class="fa fa-chevron-right mr-2"></span>FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">About Us</h2>
            <ul class="list-unstyled">
              <li><a href="../view/about.php"><span class="fa fa-chevron-right mr-2"></span>Our Story</a></li>
              <li><a href="../view/agent.php"><span class="fa fa-chevron-right mr-2"></span>Meet the team</a></li>
              <li><a href="../view/contact.php"><span class="fa fa-chevron-right mr-2"></span>Contact Us</a></li>
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
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>

</body>

</html>