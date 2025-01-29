<?php

session_start();

if(isset($_SESSION['email'])){



// Check if the addCart form was submitted
if (isset($_POST['addCart'])) {
    if (isset($_POST['PName']) && isset($_POST['PPrice']) && isset($_POST['PQuantity'])) {
        $product_name = $_POST['PName'];
        $product_price = $_POST['PPrice'];
        $product_quantity = $_POST['PQuantity'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $check_product = array_column($_SESSION['cart'], 'productName');
        if (in_array($product_name, $check_product)) {
            echo "
            <script>
                alert('Product already added');
                window.location.href = 'index.php';
            </script>
            ";
        } else {
            $_SESSION['cart'][] = array(
                'productName' => $product_name,
                'productPrice' => $product_price,
                'productQuantity' => $product_quantity
            );
            header("location:viewCart.php");
        }
    }
}

// Remove product
foreach ($_SESSION['cart'] as $key => $value) {
    if (isset($_POST["remove_$key"])) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
        header('location:viewCart.php');
        exit(); // Stop the script after redirection
    }
}


// Update product
foreach ($_SESSION['cart'] as $key => $value) {
    if (isset($_POST["update_$key"])) {
        $product_name = $_POST["PName_$key"];
        $product_price = $_POST["PPrice_$key"];
        $product_quantity = $_POST["PQuantity_$key"];

        $_SESSION['cart'][$key] = array(
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQuantity' => $product_quantity
        );
        header('location:viewCart.php');
        exit(); // Stop the script after redirection
    }
}
}

else{
    header("location:form/register.php");
}

?>
