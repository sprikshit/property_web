
<section class="ftco-section ftco-property-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="property-details">
      				<?php echo "<div class='img' style='background-image: url(../uploaded_photos/".$row['ImageName'].");'>" ?> 
					  <a class="img-video popup-vimeo d-flex align-items-center justify-content-center" href= <?php echo 'video/'.$row['videoss'].''?>>
            <span class="fa fa-play"></span> </a>
      			</div>
      				<div class="text">
      					<span class="subheading"><?php echo $row['Locationn']; ?></span>
      					<h2><?php echo $row['Enterprisee']; ?></h2>
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
						    			<p><?php echo $row['Contactt']; ?> </p>
						    		</div>
									<!--
						    		<div class="col-md-4">
						    			<p>0546708194</p>
						    		</div>
						    		<div class="col-md-4">
						    		</div>-->
						    	</div>
						    </div>

						    
							<div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						    	<!--<p> 3 bedroom apartment, opposite Adenta police station</p>-->
								<p> <?php echo $row['Descriptionn']; ?> </p>
							</div>
				</div>
      </div>
    </section>