<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





$sql2 = "SELECT DISTINCT Locationn from picz";
$result2 = mysqli_query($db, $sql2);

$price = isset($_GET['price']) ? $_GET['price'] : '';
$location = isset($_GET['loc']) ? $_GET['loc'] : '';

// Perform the filtering based on $price and $location and retrieve the filtered properties
// Replace the following code with your actual database query
$sql = "SELECT * FROM picz WHERE Pricee <= ? AND Locationn = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "ss", $price, $location);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Generate HTML for the filtered properties
$html = '';
while ($property = mysqli_fetch_assoc($result)) {
    // Generate HTML for each property listing
    $html .= '<div class="col-md-4">';
    // ... Add your property listing HTML here ...
    $html .= '</div>';
}

// Return the HTML content as the response
echo $html;

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
  <link rel="stylesheet" href="../css/new.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <style>
    .property-wrap {
      border: 1px solid #ccc;
      border-radius: 5px;
      margin: 10px;
      /* padding: 10px; */
      width: 400px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    @media screen and (max-width:425px) {
      .property-wrap {

        width: 355px;

      }
    }

    @media screen and (max-width:325px) {
      .property-wrap {

        width: 300px;

      }
    }

    .custom-input {
      border: 1px solid yellow;
      padding: 5px;
      /* Add some padding to make it look nice */
      border-radius: 3px;
      /* Add rounded corners to the input field */
      width: 100%;
      /* Set the width to 100% or adjust as needed */
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
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
              <a class="dropdown-item" href="properties.php">Residential Properties</a>
              <a class="dropdown-item" href="commercialPropertiy.php">Commercial Properties</a>
            </div>
          </li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate pb-0 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Properties <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-3 bread"> Residential Properties</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="search-wrap-1 ftco-animate p-4">
            <div class="search-property-1">
              <div class="row">
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="#">Price Limit</label>
                    <div class="form-field">
                      <div class="custom-input">
                        <input type="text" id="price-input" class="form-control" placeholder="Enter price">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="#">Location</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="custom-input">
                          <select id="location-select" class="form-control">
                            <option value="" selected style="background: white; color: black;">Select option</option>
                            <?php
                            while ($row2 = mysqli_fetch_array($result2)) {
                            ?>
                              <option value="<?php echo $row2['Locationn']; ?>" style="background: white; color: black;"><?php echo $row2['Locationn']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="#"></label>
                    <div class="form-field">
                      <button id="filter-button" class="btn btn-primary">Filter</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <script>
    // Function to load filtered properties using AJAX
    function loadFilteredProperties() {
      var price = document.getElementById("price-input").value;
      var location = document.getElementById("location-select").value;

      // Send an AJAX request to fetch filtered properties
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Update the content of the property listings section
          document.getElementById("filtered-properties-content").innerHTML = xhr.responseText;
        }
      };

      // Construct the URL with the selected location and price
      var url = "filter_properties.php?loc=" + location + "&price=" + price;
      xhr.open("GET", url, true);
      xhr.send();
    }

    // Attach an event listener to the filter button
    var filterButton = document.getElementById("filter-button");
    if (filterButton) {
      filterButton.addEventListener("click", loadFilteredProperties);
    }
  </script>



  <section class="ftco-section goto-here">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Properties</h2>
        </div>
      </div>

      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $items_per_page = 6;
      $offset = ($page - 1) * $items_per_page;

      // Corrected SQL query using prepared statements
      $sql = "SELECT * FROM picz LIMIT ?, ?";
      $stmt = mysqli_prepare($db, $sql);
      mysqli_stmt_bind_param($stmt, "ii", $offset, $items_per_page);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      ?>

      <div class="row ftco-animate">
        <?php while ($property = mysqli_fetch_assoc($result)) { ?>
          <div class="col-md-4">
            <div class="item">
              <div class="property-wrap ftco-animate">
                <a href="properties-single.php?imageID=<?php echo $property['ImagesID']; ?>" class="img" style="background-image: url('../uploaded_photos/<?php echo $property['ImageName1']; ?>');">
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
                  <h3><a href="#"><?php echo $property['Enterprisee']; ?></a></h3>
                  <span class="location"><?php echo $property['Locationn']; ?></span>
                  <a href="#" class="d-flex align-items-center justify-content-center btn-custom">
                    <span class="fa fa-link"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div id="filtered-properties-content" class="row ftco-animate"></div>

        <?php } ?>
      </div>

      <?php
      // Corrected SQL query for counting total items
      $sql1 = "SELECT COUNT(*) as count FROM picz";
      $result1 = mysqli_query($db, $sql1);
      $row1 = mysqli_fetch_assoc($result1);
      $total_items = $row1['count'];
      $total_pages = ceil($total_items / $items_per_page);

      echo "<div style='width: 70%; margin: auto; text-align: center;'>";
      for ($b = 1; $b <= $total_pages; $b++) {
      ?>
        <a class="btn btn-primary" style="font-size: 30px; color: black;" href="properties.php?page=<?php echo $b; ?>">
          <?php echo "&laquo; " . $b . " &raquo; "; ?>
        </a>
      <?php
      }
      echo "</div>";
      ?>
    </div>
  </section>


  <footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <a class="navbar-brand" href="../index.php">

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
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Search Properties</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>For Agents</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Reviews</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">About Us</h2>
            <ul class="list-unstyled">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Our Story</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Meet the team</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
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
                <li><span class="icon fa fa-map"></span><span class="text">Address: Office 10 Ground Floor Tower A, Unitech Business Zone, <br>Sector-50 Golf Course Extension Road, Gurugram, Haryan.</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+91 9821001425</span></a></li>
                <li><a href="#"><span class="icon fa fa-envelope pr-4"></span><span class="text">info@prakashproperties.com</span></a></li>
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
  <script>
    function search(ele) {
      if (event.key === 'Enter') {
        var price = ele.value;
        window.location.href = "search.php?id=" + "?price=" + price;
      }
    }
  </script>
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
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <!-- <script src="../js/google-map.js"></script> -->
  <script src="../js/main.js"></script>

</body>

</html>