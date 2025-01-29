<?php
$Id = intval($_GET['ID']); // Convert ID to an integer to avoid SQL injection

include 'Config.php'; // Include the database configuration

if ($con) {
    $query = "DELETE FROM `tblproduct` WHERE Id = $Id";
    if (mysqli_query($con, $query)) {
        header("location:mystore.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Database connection failed.";
}
?>
