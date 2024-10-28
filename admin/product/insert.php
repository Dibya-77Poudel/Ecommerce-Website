<?php

if(isset($_POST['submit'])){
    include 'Config.php';
    $product_name = $_POST['Pname'];
    $product_price = $_POST['Pprice'];
    $product_image = $_FILES['Pimage'];
    $image_loc = $_FILES['Pimage']['tmp_name'];
    $image_name = $_FILES['Pimage']['name'];
       $img_des = "Uploadimage/".$image_name;
       move_uploaded_file($image_loc, "Uploadimage/".$image_name);
       $product_description = $_POST['Pdescription'];
       $product_category = $_POST['PCategory'];


    //insert product

    mysqli_query($con,"   INSERT INTO `tblproduct`( `PName`, `PPrice`, `PImage`, `PDescription`, `PCategory`) 
    VALUES ('$product_name','$product_price','$img_des','$product_description','$product_category')");

    header("location:index.php");


    }
?>

