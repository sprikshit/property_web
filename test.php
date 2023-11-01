
<?php
            $db= mysqli_connect("localhost","dash","","final");
            $sql = "SELECT * FROM images";
            $result= mysqli_query($db,$sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='row'>";
                
                echo "<div id='img_div'>";
                    echo "<img src='images/".$row['image']."' >";
                echo "</div>";
              }
        
        ?>