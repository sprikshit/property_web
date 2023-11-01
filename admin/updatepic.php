<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





if(isset($_POST['submitig'])){
    $id = $_SESSION['aptid'];
    $sql = "SELECT * from picz WHERE ImagesID = '$id'";
    $result= mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $oldimagename = $row['ImageName'];
    //echo $oldimagename;

    $path = "uploaded_photos/".$oldimagename;
    //unlink($path);

    $target = "uploaded_photos/".basename($_FILES["image"]["name"]);
    $image = $_FILES["image"]["name"];
    $sqli = "UPDATE picz set ImageName = '$image' WHERE ImagesID = '$id'";
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)){
        $msg = "Image uploaded";

    }else{
        $msg = "Error uploading";
    }
/*
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $newimgname = addslashes(file_get_contents($_FILES['image']['name']));
    $target = "PICS/".basename($newimgname);

    mysqli_query($db, $sqli) or die (mysqli_error($db));
    if(move_uploaded_file($newimgname, $target)){
        header('Location: edit.php');
    }*/
}



?>

<ul class="property-cards">
        <?php while ($property = mysqli_fetch_assoc($propertyList)) { ?>
            <li class="property-card">
                <img src="../uploaded_photos/<?php echo $property['ImageName']; ?>" alt="Property Image" class="property-image">
                <div class="property-info">
                    <p class="property-name"><?php echo $property['Enterprisee']; ?></p>
                    <p class="property-price">Price: <?php echo $property['Pricee']; ?></p>
                    <!-- Display other property information here -->

                    <!-- Add delete and update buttons -->
                    <a href="?delete_property=<?php echo $property['ImagesID']; ?>" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
                    <a href="updatedet.php?property_id=<?php echo $property['ImagesID']; ?>">Update</a>
                </div>
            </li>
        <?php } ?>
    </ul>
    <p><a href="add_property.php">Add New Property</a></p>











    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $items_per_page = 6;
    $offset = ($page - 1) * $items_per_page;

    // Assume $db is your database connection (make sure it's established earlier in your code)

    // Corrected SQL query using prepared statements
    $sql = "SELECT * FROM picz LIMIT ?, ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $offset, $items_per_page);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);