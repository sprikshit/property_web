<?php
// Establish a database connection
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





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
