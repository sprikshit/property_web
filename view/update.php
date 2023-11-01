<?php
session_start();
$db= mysqli_connect("localhost","dash","dash@123","dash");
$id = isset($_GET['id']) ? $_GET['id'] : '';
$_SESSION['aptid'] = $id;
$sql1 = "SELECT * FROM picz where ImagesID = '$id' ";
$result= mysqli_query($db,$sql1);
$row = mysqli_fetch_array($result);

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
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">PropertyDash</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="../edit.php" class="nav-link">Home</a></li>
	          
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-0 text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="properties.html">Properties <i class="fa fa-chevron-right"></i></a></span> <span>Properties Single <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-3 bread">Property Details</h1>
          </div>
        </div>
      </div>
    </section>
	
    <section class="ftco-section ftco-property-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="property-details">
      				<?php echo "<div class='img' style='background-image: url(PICS/".$row['ImageName'].");'>" ?> 

					  <a class="img-video popup-vimeo d-flex align-items-center justify-content-center" href= <?php echo 'video/'.$row['videoss'].''?>>
            <span class="fa fa-play"></span> </a>
            <button class="btn btn-danger btn-sm delete"
                        onclick = "document.getElementById('id01').style.display='block'">
                        <span class='spinner-grow spinner-grow-sm'></span>Change pic</button>
      				</div>

              <div id="id01" class="modal" style="width: 40%; margin: auto;">
        
        <div class="full text_align_center" style=" background-color: #90ee90; height: 150px;  ">
        
            <div>
              <form action="updatepic.php" METHOD="POST">
            <label>Upload Picture</label>
                    <input type="file" name="image" accept="image/*">
                    <?php echo "<input name ='submitig' value='Submit' type='submit'>" ;?>

</form>
          </div>
        </div>
      </div>

      				<div class="text">
                <?php echo "<form action='updatedet.php' method='POST'>"; ?>
                <?php echo "<input type=text name=loc value= '".$row['Locationn']."'>";?>
      					
              	<!--<p name=loc contenteditable="true"> <?php/* echo $row['Locationn'];*/ ?> </p></span>-->
                <h2><?php echo "<input type=text name=ent value= '".$row['Enterprisee']."'>";?></h2>
      					<!--<h2 name=ent contenteditable="true"><?php //echo $row['Enterprisee']; ?></h2>-->

      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							  <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>


							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Contact</a>
							    </li>

							    
							    <li class="nav-item">
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
                
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
						    		<div class="col-md-4">
                    <?php echo "<input type=text name=cont value= '".$row['Contactt']."'>";?>
						    		</div>
									<!--
						    		<div class="col-md-4">
						    			<p></p>
						    		</div>
						    		<div class="col-md-4">
						    		</div>-->
						    	</div>
                  
						    </div>
						    
							<div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						    	<!--<p> 3 bedroom apartment, opposite Adenta police station</p>-->
                 <?php echo "<input type=text name=desc value= '".$row['Descriptionn']."'>";?>
                <!--<input type = 'text' name=desc value= <?php //echo $row['Descriptionn'];?>></p>-->
								<!--<p class="input" role = "textbox" name=desc contenteditable="true"> <?php// echo $row['Descriptionn']; ?> </p>-->

							</div>
				</div>
        
      </div>
      <?php echo "<input name ='submit' id='submit' value=Edit type='submit'>" ;
           echo "</form>" ; ?>
    </section>

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