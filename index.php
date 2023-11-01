<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Delete property
if (isset($_GET['delete_property'])) {
  $propertyID = $_GET['delete_property'];

  // Add code to delete the property based on $propertyID
  $deleteSQL = "DELETE FROM picz WHERE ImagesID = $propertyID";
  if (mysqli_query($db, $deleteSQL)) {
    echo "Property deleted successfully!";
  } else {
    echo "Error deleting property: " . mysqli_error($db);
  }
}

// Retrieve existing properties
$sql = "SELECT * FROM picz ORDER BY ImagesID DESC LIMIT 3";
$result = mysqli_query($db, $sql);

$sql2 = "SELECT * FROM pictures ORDER BY ImagesID DESC LIMIT 3";
$result2 = mysqli_query($db, $sql2);
if (!$result) {
  die("Error in SQL query: " . mysqli_error($db));
}
if (!$result2) {
  die("Error in SQL query: " . mysqli_error($db));
}

$type = !empty($_GET['type']) || !empty($_GET['location']) || !empty($_GET['price']);
// if ($type="Residence") {
//     // $_SESSION['pricelimit'] = $price;
//     header("Location: /properties.php");
//     exit();
// }else{
//   header("Location: commercialPropertiy.php");
//   exit();
// }
$sql;
// echo $type ; 
if ($type) {
  $conditions = array(); // Create an array to hold filter conditions
  echo "<script>console.log('Got Filters')</script>";
  if (!empty($_GET['price'])) {
    $price = mysqli_real_escape_string($db, $_GET['price']);
    $conditions[] = "Pricee <= '$price'";
  }

  if (!empty($_GET['location'])) {
    $location = mysqli_real_escape_string($db, $_GET['location']);
    $conditions[] = "Locationn = '$location'";
  }
  // Combine filter conditions with "AND"
  $sql = "SELECT * from picz WHERE " . implode(" AND ", $conditions);
  // echo $sql ; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome to Prakash Properties</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <style>
    .custom-input {
      border: 1px solid yellow;
      padding: 5px;
      /* Add some padding to make it look nice */
      border-radius: 3px;
      /* Add rounded corners to the input field */
      width: 100%;
      /* Set the width to 100% or adjust as needed */
    }

    @media screen and (max-width:800px) {
      .navbar {
        position: absolute !important;
      }

    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="Group 2351.png" alt="PropertyDash Logo" style="width: 90px; height: 100px;">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="view/about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="view/agent.php" class="nav-link">Agent</a></li>
          <li class="nav-item"><a href="view/services.php" class="nav-link">Services</a></li>
          <li class="nav-item dropdown ">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Properties
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- Dropdown items go here -->
              <a class="dropdown-item" href="./view/properties.php">Residentail Properties</a>
              <a class="dropdown-item" href="./view/commercialPropertiy.php">Commercial Properties</a>
            </div>
          </li>
          <li class="nav-item"><a href="view/contact.php" class="nav-link">Contact</a></li>
          <!-- <li class="nav-item"><a href="admin/adminlogin.php" class="nav-link">Admin</a></li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- END nav -->
  <section class="hero-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center">
        <div class="col-lg-7 col-md-6 ftco-animate d-flex align-items-end">
          <div class="text">
            <h1 class="mb-4">Find Your Home</h1>
            <p style="font-size: 18px;">Affordability, Conveniency & Trust</p>
            <div class="row ">
              <p class="ml-2"><a href="./view/properties.php" class="btn btn-primary py-3 px-4">View Residential properties</a></p>
              <p class="ml-2"><a href="./view/commercialPropertiy.php" class="btn btn-primary py-3 px-4">View Commercial properties</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SEARCH BAR -->
  <section class="ftco-section ftco-no-pb ftco-no-pt search-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="search-wrap-1 ftco-animate p-4">
            <form class="search-property-1" id="property-search-form" method="GET">
              <div class="row">
                <!-- <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Keyword</label>
		          				<div class="form-field">
		          					<div class="icon"><span class="fa fa-search"></span></div>
				                <input type="text" class="form-control" placeholder="Enter Keyword">
				              </div>
			              </div>
		        			</div> -->
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="property-type">Property Type</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <!-- <div class="iconv ml-2" style=""><span class="fa fa-chevron-down"></span></div> -->
                        <div class="custom-input">
                          <select id="property-type" name="type" class="form-control">
                            <option value="Residence">Residence</option>
                            <!-- <option value="">Offices</option> -->
                            <option value="Commercial">Commercial</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="location">Location</label>
                    <div class="form-field">
                      <!-- <div class="icon ml-2"><span class="fa fa-search"></span></div> -->
                      <div class="custom-input">
                        <input type="text" class="form-control " placeholder="Location" name="location" id="location">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg align-items-end ">
                  <div class="form-group">
                    <label class for="#">Price Limit</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="custom-input">
                          <!-- <div class="icon ml-2"><span class="fa fa-chevron-down"></span></div> -->

                          <select id="price" name="price" class="form-control" color="black">
                            <option color="black" value="">₹0 - ₹50,00,000</option>
                            <option value="">₹50,00,000 - ₹1cr</option>
                            <option value="">₹1cr - ₹3cr</option>
                            <option value="">₹3cr - ₹5cr</option>
                            <option value="">₹5cr - ₹10cr</option>
                            <option value="">₹10cr+</option>
                            <!-- <option value="">₹1,00,00,000+</option>
		                        <option value="">GHC300,000</option>
		                        <option value="">GHC400,000</option>
		                        <option value="">GHC500,000</option>
		                        <option value="">GHC600,000</option>
		                        <option value="">GHC700,000</option>
		                        <option value="">GHC800,000</option>
		                        <option value="">GHC900,000</option>
		                        <option value="">GHC1,000,000</option>
		                        <option value="">GHC2,000,000</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" value="Search" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <script>
              document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("property-search-form");
                const propertyTypeSelect = document.getElementById("property-type");

                form.addEventListener("submit", function(e) {
                  const selectedType = propertyTypeSelect.value;

                  if (selectedType === "Residence") {
                    form.action = "./view/properties.php";
                  } else if (selectedType === "Commercial") {
                    form.action = "./view/commercialPropertiy.php";
                  }
                });
              });
            </script>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ========================================================== -->

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-primary">
    <div class="container">
      <div class="row d-flex no-gutters">
        <div class="col-md-3 d-flex align-items-stretch ftco-animate">
          <div class="media block-6 services services-bg d-block text-center px-4 py-5">
            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
            <div class="media-body py-md-4">
              <h3>Trusted by Thousands</h3>
              <p>We are here to serve our customer, give them the best of treatment</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch ftco-animate">
          <div class="media block-6 services services-bg services-darken d-block text-center px-4 py-5">
            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-home"></span></div>
            <div class="media-body py-md-4">
              <h3>Wide Range of Properties</h3>
              <p>There are variety of properties on this platform with at most one year payment</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch ftco-animate">
          <div class="media block-6 services services-bg services-lighten d-block text-center px-4 py-5">
            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-stats"></span></div>
            <div class="media-body py-md-4">
              <h3>Financing Made Easy</h3>
              <p>Get the details of the property owner on this platform, contact him if interested and make necessary payment</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch ftco-animate">
          <div class="media block-6 services services-bg d-block text-center px-4 py-5">
            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-quarantine"></span></div>
            <div class="media-body py-md-4">
              <h3>Locked in Pricing</h3>
              <p>Prices on this platform are at most 500 cedis</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section mt-5">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Featured Residential Properties</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <?php while ($property = mysqli_fetch_assoc($result)) { ?>
          <div class="col-md-4">
            <div class="item">
              <div class="property-wrap ftco-animate">
                <a href="./view/properties-single.php?imageID=<?php echo $property['ImagesID']; ?>" class="img" style="background-image: url('uploaded_photos/<?php echo $property['ImageName1']; ?>');">
                  <div class="rent-sale">
                    <span class="sale"><?php echo $property['Statuss']; ?></span>
                  </div>
                  <p class="price"><span class="orig-price">Price: <?php echo $property['Pricee']; ?></span></p>
                </a>
                <div class="text">
                  <ul class="property_list">
                    <li><span class="flaticon-bed"></span><?php echo $property['Bedroomm']; ?> Bedrooms</li>
                    <li><span class="flaticon-bathtub"></span><?php echo $property['Washroomm']; ?> Washrooms</li>
                  </ul>
                  <h3><a href="./view/properties-single.php?imageID=<?php echo $property['ImagesID']; ?>"><?php echo $property['Enterprisee']; ?></a></h3>
                  <span class="location"><?php echo $property['Locationn']; ?></span>
                  <a href="./view/properties-single.php?imageID=<?php echo $property['ImagesID']; ?>" class="d-flex align-items-center justify-content-center btn-custom">
                    <span class="fa fa-link"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- ==================================================================================== -->
  <section class="ftco-section">
    <div class="container">
      <!-- <div class="row justify-content-center"> -->
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <!-- <span class="subheading">What we offer</span> -->
        <h2 class="mb-2">Featured Commercial Properties</h2>
        <!-- </div> -->
      </div>
      <div class="row ftco-animate">
        <?php while ($property = mysqli_fetch_assoc($result2)) { ?>
          <div class="col-md-4">
            <div class="item">
              <div class="property-wrap ftco-animate">
                <a href="./view/singlecommercial.php?imageID=<?php echo $property['ImagesID']; ?>" class="img" style="background-image: url('uploaded_photo/<?php echo $property['ImageName1']; ?>');">
                  <div class="rent-sale">
                    <span class="sale"><?php echo $property['Status']; ?></span>
                  </div>
                  <p class="price"><span class="orig-price">Price: <?php echo $property['Price']; ?></span></p>
                </a>
                <div class="text">
                  <ul class="property_list">
                    <li><span class="flaticon-bed"></span>Type: <?php echo $property['propertytype']; ?></li>
                    <li><span class="flaticon-bathtub"></span>Size: <?php echo $property['propertysize']; ?></li>
                  </ul>
                  <h3><a href="./view/singlecommercial.php?imageID=<?php echo $property['ImagesID']; ?>"><?php echo $property['Enterprise']; ?></a></h3>
                  <span class="location"><?php echo $property['Location']; ?></span>
                  <a href="./view/singlecommercial.php?imageID=<?php echo $property['ImagesID']; ?>" class="d-flex align-items-center justify-content-center btn-custom">
                    <span class="fa fa-link"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="ftco-section services-section bg-darken">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
          <span class="subheading">Work flow</span>
          <h2 class="mb-3">How it works</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services services-2">
            <div class="media-body py-md-4 text-center">
              <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>01</span>
                <img src="images/blob.svg" alt="">
              </div>
              <h3>Evaluate Property</h3>
              <p>Explore endless possibilities Secure your ideal property now!.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services services-2">
            <div class="media-body py-md-4 text-center">
              <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>02</span>
                <img src="images/blob.svg" alt="">
              </div>
              <h3>Meet Your Agent</h3>
              <p>Speak to the agents, so they direct you to the property owners</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services services-2">
            <div class="media-body py-md-4 text-center">
              <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>03</span>
                <img src="images/blob.svg" alt="">
              </div>
              <h3>Close the Deal</h3>
              <p>Make payment to property owner</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services services-2">
            <div class="media-body py-md-4 text-center">
              <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>04</span>
                <img src="images/blob.svg" alt="">
              </div>
              <h3>Have Your Property</h3>
              <p>The property is yours till the agreed time is over</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="ftco-counter img" id="section-counter">
    <div class="container">
      <div class="row pt-md-5">
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-5 mb-4">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="1000">0</strong>
              <span>Area <br>Population</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-5 mb-4">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="2500">0</strong>
              <span>Total <br>Properties</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-5 mb-4">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="500">0</strong>
              <span>Average <br>House</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-5 mb-4">
            <div class="text d-flex align-items-center">
              <strong class="number" data-number="67">0</strong>
              <span>Total <br>Branches</span>
            </div>
          </div>
        </div>
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
              <li><a href="index.php"><span class="fa fa-chevron-right mr-2"></span>Search Properties</a></li>
              <li><a href="./view/agent.php"><span class="fa fa-chevron-right mr-2"></span>For Agents</a></li>
              <li><a href="./view/about.php"><span class="fa fa-chevron-right mr-2"></span>Reviews</a></li>
              <li><a href="./view/contact.php"><span class="fa fa-chevron-right mr-2"></span>FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">About Us</h2>
            <ul class="list-unstyled">
              <li><a href="./view/about.php"><span class="fa fa-chevron-right mr-2"></span>Our Story</a></li>
              <li><a href="./view/agent.php"><span class="fa fa-chevron-right mr-2"></span>Meet the team</a></li>
              <li><a href="./view/contact.php"><span class="fa fa-chevron-right mr-2"></span>Contact Us</a></li>
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


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>