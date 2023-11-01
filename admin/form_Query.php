<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve existing properties
$propertyList = mysqli_query($db, "SELECT * FROM form_query");

?><!DOCTYPE html>
<html>
<head>
    <title>Contact Information Table</title>
    <style>
        body {
            text-align: center;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h1>Contact Information Table</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>number</th>
            <th>Message</th>
        </tr>
        <?php
        if ($propertyList->num_rows > 0) {
            while ($row = $propertyList->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["number"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data available</td></tr>";
        }

        // Close the database connection
        $db->close();
        ?>
    </table>
</body>
</html>

