<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Check if the form has been submitted for updating the property
if (isset($_POST['update_property'])) {
    $property_id = $_POST['property_id'];
    $property_name = $_POST['property_name'];
    $property_price = $_POST['property_price'];
    $propertytype = $_POST['propertytype'];
    $propertysize = $_POST['propertysize'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $contact_info = $_POST['contact_info'];

    // Update the property in the database
    $updateSQL = "UPDATE pictures SET Enterprise = ?, Price = ?, propertytype = ?, propertysize = ?, Location = ?, Description = ?, Contact = ? WHERE ImagesID = ?";
    $stmt = mysqli_prepare($db, $updateSQL);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $property_name, $property_price, $propertytype, $propertysize, $location, $description, $contact_info, $property_id);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Property updated successfully!");</script>';
            echo '<script>window.location.href = "edit2.php";</script>';
        } else {
            echo "Error updating property: " . mysqli_error($db);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing SQL statement: " . mysqli_error($db);
    }
}

if (isset($_GET['property_id'])) {
    $propertyID = $_GET['property_id'];

    $propertyQuery = mysqli_query($db, "SELECT * FROM pictures WHERE ImagesID = $propertyID");
    $property = mysqli_fetch_assoc($propertyQuery);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Property</title>
    <!-- Add any necessary CSS styles here -->
    <style>
        /* Style the form container */
        .add-property-form {

            margin: 40px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the heading */
        .heading {
            text-align: center;
            font-size: 40px;
            color: #333;
            margin-bottom: 20px;
        }

        .search-property-1 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .inputBox {
            display: flex;
            flex-direction: column;
        }

        /* Style the input labels */
        .inputBox label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
            color: #555;
        }

        .inputBox input {
            margin-top: 10px;
            width: 100%;
        }

        /* Style the input fields */
        .box {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style the required input fields */
        .box[required] {
            border-color: #ff5722;
        }

        /* Style the number input fields */

        textarea {
            margin-top: 10px;
        }

        /* Style the textarea */
        textarea.box {
            resize: vertical;
        }

        /* Style the submit button */
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #0098B0;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            grid-column: 1/4;
        }

        /* Change button color on hover */
        .btn:hover {
            background-color: #0056b3;
        }

        /* Style for error messages (customize as needed) */
        .error-message {
            color: #ff5722;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Style the property list container */
        .property-list {
            padding: 20px;
        }

        /* Style the property cards container */
        .property-cards {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
        }

        /* Style each property card */
        .property-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            width: 300px;
            /* Adjust the width as needed */
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Style the property image */
        .property-image {
            width: 100%;
            height: auto;
            border-radius: 5px 5px 0 0;
        }

        /* Style the property information */
        .property-info {
            padding: 10px;
        }

        /* Style the property name */
        .property-name {
            font-weight: bold;
            font-size: 18px;
        }

        /* Style the property price */
        .property-price {
            font-size: 16px;
            color: #007BFF;
        }

        /* Style the delete link */
        .delete-link {
            display: block;
            color: white;
            text-decoration: none;
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: red;
            padding: 10px;
        }
    </style>
   
</head>
<body>
<section class="add-property-form">
        <h1 class="heading">Add Property</h1>
        <form action="" method="post" class="search-property-1" enctype="multipart/form-data">
        <input type="hidden" name="property_id" value="<?php echo $property['ImagesID']; ?>">

            <div>
                <div class="inputBox">
                    <span>Property Name (required)</span>
                            <input type="text" class="box" required maxlength="255" placeholder="Enter property name" name="property_name" value="<?php echo $property['Enterprise']; ?>">

                </div>
                <div class="inputBox">
                    <span>Property Price (required)</span>
                    <input type="text" class="box" required placeholder="Enter property price" name="property_price" value="<?php echo $property['Price']; ?>">
                </div>
                <div class="inputBox">
                    <span>Property Type (required)</span>
                    <input type="text" class="box" required min="0" placeholder="Enter the number of propertytype" name="propertytype" value="<?php echo $property['propertytype']; ?>">
                </div>
                <div class="inputBox">
                    <span>Property size (required)</span>
                    <input type="text" class="box" required min="0" placeholder="Enter the number of propertysize" name="propertysize" value="<?php echo $property['propertysize']; ?>">
                </div>
                <div class="inputBox">
                    <span>Location (required)</span>
                    <input type="text" class="box" required placeholder="Enter the location" name="location" value="<?php echo $property['Location']; ?>">
                </div>
            </div>
            <div>
                <div class="inputBox">
                    <span>Contact Information (required)</span>
                    <input type="text" class="box" required placeholder="Enter contact information" name="contact_info" value="<?php echo $property['Contact']; ?>">
                </div>
                <!-- <div class="inputBox">
                    <span>Image (required)</span>
                    <input type="file" name="ImageName" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                </div> -->
                <div class="inputBox">
                    <span>Description (required)</span>
                    <textarea name="description" placeholder="Enter property description" class="box" required maxlength="500" cols="30" rows="10"><?php echo $property['Description']; ?></textarea>
                    </div>
            </div>
            <input type="submit" value="Update Property" class="btn" name="update_property">

        </form>

    </section>

</body>
</html>
