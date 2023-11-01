<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Check for property addition request
if (isset($_POST['add_property'])) {
    $status = $_POST['property_status'];
    $property_price = $_POST['property_price'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $property_name = $_POST['property_name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $contact_info = $_POST['contact_info'];
    $selectpricee = $_POST['selectpricee'];

    // Initialize image variables
    $image1 = '';
    $image2 = '';
    $image3 = '';
    $image4 = '';

    $videoName = '';

    // Upload images
    for ($i = 1; $i <= 4; $i++) {
        $fileKey = 'ImageName' . $i;
        if (isset($_FILES[$fileKey]) && !empty($_FILES[$fileKey]['name'])) {
            $imageNames[] = $_FILES[$fileKey]['name'];
            $image_upload_path = '../uploaded_photos/' . $imageNames[$i - 1];
            move_uploaded_file($_FILES[$fileKey]['tmp_name'], $image_upload_path);

            // Assign image names to variables
            if ($i === 1) {
                $image1 = $imageNames[0];
            } elseif ($i === 2) {
                $image2 = $imageNames[1];
            } elseif ($i === 3) {
                $image3 = $imageNames[2];
            } elseif ($i === 4) {
                $image4 = $imageNames[3];
            }
        }
    }

    // Upload video
    if (isset($_FILES['video']) && !empty($_FILES['video']['name'])) {
        $videoName = $_FILES['video']['name'];
        $video_upload_path = '../uploaded_video/' . $videoName;
        move_uploaded_file($_FILES['video']['tmp_name'], $video_upload_path);
    }

    $insertSQL = "INSERT INTO picz (ImageName1, ImageName2, ImageName3, ImageName4, Statuss, Pricee, Bedroomm, Washroomm, Enterprisee, Locationn, Descriptionn, Contactt, Videoss, selectpricee) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($db, $insertSQL);
if ($stmt) {
    // Build the bind parameter string with 13 placeholders (4 for images, 9 for other parameters, 1 for video)
    $bindParams = 'ssssssssssssss';

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, $bindParams, $image1, $image2, $image3, $image4, $status, $property_price, $bedrooms, $bathrooms, $property_name, $location, $description, $contact_info, $videoName, $selectpricee);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Property added successfully!");</script>';
        echo '<script>window.location.href = "edit.php";</script>';
    } else {
        echo "Error inserting property: " . mysqli_error($db);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing SQL statement: " . mysqli_error($db);
}

}
// Retrieve existing properties
$propertyList = mysqli_query($db, "SELECT * FROM picz");
?>


<!DOCTYPE html>
<html lang="en">
<!-- Your HTML content here -->

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Delete Property</title>
    <!-- Add any necessary CSS styles here -->
</head>

<body>
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
            background-color: #007BFF;
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

    <section class="add-property-form">
        <h1 class="heading">Add Property</h1>
        <form action="" method="post" class="search-property-1" enctype="multipart/form-data">
    <div>
        <div class="inputBox">
            <span>Property Name <span class="required">*</span></span>
            <input type="text" class="box" required maxlength="255" placeholder="Enter property name" name="property_name">
        </div>
        <div class="inputBox">
            <span>Property Price <span class="required">*</span></span>
            <input type="text" class="box" required placeholder="Enter property price" name="property_price">
        </div>
        <div class="inputBox">
            <span>Number of Bedrooms</span>
            <input type="number" class="box" min="0" placeholder="Enter the number of bedrooms" name="bedrooms">
        </div>
        <div class="inputBox">
            <span>Number of Bathrooms</span>
            <input type="text" class="box" min="0" placeholder="Enter the number of bathrooms" name="bathrooms">
        </div>
        <div class="inputBox">
            <span>Location <span class="required">*</span></span>
            <input type="text" class="box" required placeholder="Enter the location" name="location">
        </div>
        <div class="inputBox">
            <span>Property Status <span class="required">*</span></span>
            <input type="text" class="box" required maxlength="255" placeholder="Enter property status" name="property_status">
        </div>
        <div class="inputBox">
            <span>Contact Information <span class="required">*</span></span>
            <input type="text" class="box" required placeholder="Enter contact information" name="contact_info">
        </div>
        <div class="inputBox">
        <span>Select Price (required)</span>
    <select id="price" name="selectpricee" class="box">
        <option value="₹0 - ₹50,00,000">₹0 - ₹50,00,000</option>
        <option value="₹50,00,000 - ₹1cr">₹50,00,000 - ₹1cr</option>
        <option value="₹1cr - ₹3cr">₹1cr - ₹3cr</option>
        <option value="₹3cr - ₹5cr">₹3cr - ₹5cr</option>
        <option value="₹5cr - ₹10cr">₹5cr - ₹10cr</option>
        <option value="₹10cr+">₹10cr+</option>
    </select>
</div>
    </div>
    <div>
        <div class="inputBox">
            <span>Video</span>
            <input type="file" name="video" accept="video/*" class="box">
        </div>
        <div class="inputBox">
            <span>Image 1 <span class="required">*</span></span>
            <input type="file" name="ImageName1" accept="image/*" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 2</span>
            <input type="file" name="ImageName2" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
        </div>
        <div class "inputBox">
            <span>Image 3</span>
            <input type="file" name="ImageName3" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
        </div>
        <div class="inputBox">
            <span>Image 4</span>
            <input type="file" name="ImageName4" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
        </div>
        <div class="inputBox">
            <span>Description <span class="required">*</span></span>
            <textarea name="description" placeholder="Enter property description" class="box" required maxlength="500" cols="30" rows="10"></textarea>
        </div>
    </div>
    <input type="submit" value="Add Property" class="btn" name="add_property">
</form>

    </section>
    <!-- Add any necessary JavaScript scripts here -->
</body>

</html>