<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Check for a successful connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve existing properties
$propertyList = mysqli_query($db, "SELECT * FROM picz");

// Display the properties
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Properties</title>
    <!-- Add any necessary CSS styles here -->
</head>
<body>
    <!-- Add your HTML and CSS to format the properties as needed -->
    <div class="property-list">
        <h1>Properties List</h1>
        <div class="property-cards">
            <?php while ($property = mysqli_fetch_assoc($propertyList)) { ?>
                <div class="property-card">
                    <div class="property-image" style="background-image: url('../uploaded_photos/<?php echo $property['ImageName4']; ?>');"></div>
                    <div class="property-info">
                        <div class="property-name"><?php echo $property['Property_Name']; ?></div>
                        <div class="property-price">$<?php echo $property['Pricee']; ?></div>
                        <div class="property-location"><?php echo $property['Locationn']; ?></div>
                        <div class="property-description"><?php echo $property['Descriptionn']; ?></div>
                        <a href="delete_property.php?id=<?php echo $property['Property_ID']; ?>" class="delete-link">Delete</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Add any necessary JavaScript scripts here -->
</body>
</html>
