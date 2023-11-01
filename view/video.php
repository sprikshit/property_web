<?php
if (isset($_POST['submit'])){

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "video/".$filename;

    $db= mysqli_connect("localhost","dash","dash@123","dash");

    move_uploaded_file($tempname,$folder);

    $sql = "INSERT INTO picz (videoss) VALUES ('$filename')";

    if (mysqli_query($db,$sql)){
        echo "video uploaded";

    }else{
        echo "not Successful";
    }
}
?>
  <form method='POST'  enctype="multipart/form-data">
                <input type="file" name="file" id="file">                
            
             <input type="submit" name="submit" value="submit">
                
</form>
$image = "../uploaded_photos/" . $row["ImageName"];
echo "<div class='col-md-4 mt-4'>
        <div class='property-wrap ftco-animate'>
          <a href='ind.php?id=" . $row['ImagesID'] . "' class='img' id='img'>
            <div class='cardimg'>
              <img src='" . $image . "' alt='" . $row['Enterprisee'] . "' style='width: 100%; height: auto; max-width: 100%;'> <!-- Apply styling to the image -->
            </div>
            <div class='rent-sale'>
              <span class='sale'>" . $row['Statuss'] . "</span>
            </div>
          </a>
          <p class='price'><span class='orig-price'>Price: " . $row['Pricee'] . " /mon</span></p>
          <div class='text'>
            <ul class='property_list'>
              <li><span class='flaticon-bed'></span> Bedroom: " . $row['Bedroomm'] . "</li>
              <li><span class='flaticon-bathtub'></span> Washroom: " . $row['Washroomm'] . "</li>
            </ul>
            <h3><a href='#'>" . $row['Enterprisee'] . "</a></h3>
            <a href='#' class='d-flex align-items-center justify-content-center btn-custom'>
              <span class='fa fa-link'></span>
            </a>
            <div class='list-team d-flex align-items-center mt-2 pt-2 border-top'>
              <span class='location'>" . $row['Locationn'] . "</span>
            </div>
          </div>
        </div>
     
      
        	</div>";
      }
      
      echo "</section>";
      $sql1 = "SELECT * FROM picz";
      $row = mysqli_query($db, $sql1);
      $count = mysqli_num_rows($row);
      $per_page = ceil($count / 6);

      echo "<div  style='width: 70%; margin: auto; text-align: center;'>";
      for ($b = 1; $b <= $per_page; $b++) {
      ?>
       <a class="btn btn-primary" style='font-size: 30px;color: black;' href="properties.php?page=<?php echo $b; ?>"> <?php echo "&laquo; " . $b . " &raquo; "; ?></a> <?php }
  