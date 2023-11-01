<?php 
session_start();
$price=5;
if($_SESSION['pricelimit']){
	$price = $_SESSION['pricelimit'];
}
$price1 = isset($_GET['price']) ? $_GET['price'] : '';
if(!empty($price1)){
	$price = $price1;
}

$db= mysqli_connect("localhost","dash","dash@123","dash");

$sql2 = "SELECT DISTINCT Locationn from picz";
$result2= mysqli_query($db,$sql2);

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../index.php">PropertyDash</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="agent.php" class="nav-link">Agent</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <li class="nav-item active"><a href="properties.php" class="nav-link">Properties</a></li>
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
            <h1 class="mb-3 bread">Properties</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate p-4">
							<form action="#" class="search-property-1">
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
								<label for="#">Price Limit</label>
		          				<div class="form-field">
		          					<div class="icon"><span class="fa fa-search"></span></div>
				                <input type="text" name="price" class="form-control" placeholder="Enter price" >
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Location</label>
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
		                      <select   id="" class="form-control" onchange="location = this.value;">
							  <option value="" selected style="background: white; color: black;">Select option</option>
								<?php
								while ($row2 = mysqli_fetch_array($result2)){
									?>
									<option value="locations.php?loc=<?php echo $row2['Locationn']; ?>" style="background: white; color: black;"><?php echo $row2['Locationn']; ?></option>
									<?php
								}
									?>								
		                      </select>
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			
		        			</div>

				              </div>
			              </div>
		        			</div>
		        			</div>
		        		</div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
    </section>

    <section class="ftco-section goto-here">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Properties</h2>
          </div>
        </div>


		<?php
		$page = isset($_GET['page']) ? $_GET['page'] : '';
		if($page=="" || $page=="1"){
			$page1=0;
		}
		else{
			$page1= ($page*6)-6;
		}

            $sql = "SELECT * FROM picz WHERE Pricee <= '$price'limit $page1,6";
            $result= mysqli_query($db,$sql);
            while ($row = mysqli_fetch_array($result)){		
        echo "<div class='col-md-4 mt-4'>
        		<div class='property-wrap ftco-animate'>
				<a href='properties-single.php?id=".$row['ImagesID']."' class='img' id='img' style='background-image: url(../uploaded_photos/".$row['ImageName'].");'>
        				<div class='rent-sale'>
        					<span class='sale'>".$row['Statuss']."</span>
        				</div>
        				<p class='price'><span class='orig-price'>Price:".$row['Pricee']."</span></p>
        			</a>
        			<div class='text'>
        				<ul class='property_list'>
        					<li><span class='flaticon-bed'></span>".$row['Bedroomm']."</li>
        					<li><span class='flaticon-bathtub'></span>".$row['Washroomm']."</li>
        				</ul>
        				<h3><a href='#'>".$row['Enterprisee']."</a></h3>
						</span>
        				<a href='#' class='d-flex align-items-center justify-content-center btn-custom'>
        					<span class='fa fa-link'></span>
        				</a>
        				<div class='list-team d-flex align-items-center mt-2 pt-2 border-top'>	
						<span class='location'>".$row['Locationn']."</span>

        				</div>
        			</div>
        		</div>
        	</div>";
		}
		/*

		*/
			echo "</section>";
		$sql1 = "SELECT * FROM picz WHERE Pricee <= '$price'";
		$row = mysqli_query($db,$sql1);
		$count = mysqli_num_rows($row);
		$per_page = ceil($count/6);

		echo "<div  style='width: 70%; margin: auto; text-align: center;'>";
		for($b = 1; $b <=$per_page; $b++){
            ?> <a class="btn btn-primary"
            style='font-size: 30px;color: black;'href="properties.php?page=<?php echo $b; ?>"> <?php echo "&laquo; ". $b." &raquo; ";?></a> <?php
        }
		echo "</div>";
        
		mysqli_close($db); ?>
    
	<footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">PropertyDash</h2>
              <p>Just feel at home!</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
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
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Company</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Press</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map"></span><span class="text">Ashesi University, 1 University Avenue, Berekuso</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+233 558073764</span></a></li>
	                <li><a href="#"><span class="icon fa fa-envelope pr-4"></span><span class="text">propertydash@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
    </footer>
    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script>
  function search(ele) {
    if(event.key === 'Enter') {
		var price = ele.value;
        window.location.href="search.php?id="+"?price="+price;    
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>