<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ladies Fashion E-commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha348-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    
</head>
<body>

<?php

    $count = 0;
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
    }

?>
    <header class="header">
        <div class="logo">Fashionista</div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php" class="nav-icon"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#about" class="nav-icon"><i class="fas fa-info-circle"></i> About</a></li>
                <li><a href="#products" class="nav-icon"><i class="fas fa-th"></i> Products</a></li>
                <li><a href="#login" class="nav-icon"><i class="fas fa-user"></i> Login</a></li>
                <li><a href="../admin/mystore.php" class="nav-icon"><i class="fas fa-user-shield"></i> Admin</a></li>
                <li>
                    <input type="text" placeholder="Search..." class="search-box">
                </li>
                <li class="cart-icon">
                    <a href="viewCart.php" class="nav-icon"><i class="fas fa-shopping-cart"></i> Cart</a>
                    <span class="cart-count"><?php echo $count?></span>
                </li>
            </ul>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center bg-light mb-5 rounded">
            <h1 class="text-warning">My Cart</h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="col-sm-12 col-md-6 col-lg-9">
            <table class="table table-bordered text-center">
                <thead class="bg-danger text-white fs-5">
                    <th>Serial no.</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
    <?php
  
    $total_price = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $product_price = (float) $value['productPrice'];
            $product_quantity = (int) $value['productQuantity'];
            $product_total = $product_price * $product_quantity;
            $total_price += $product_total;

            echo "
            <form action='Insertcart.php' method='POST'>
            <tr>
                <td>".($key + 1)."</td>
                <td><input type='text' name='PName_$key' value='{$value['productName']}' readonly></td>
                <td><input type='number' name='PPrice_$key' value='{$product_price}' min='0' step='0.01'></td>
                <td><input type='number' name='PQuantity_$key' value='{$product_quantity}' min='1'></td>
                <td>$product_total</td>
                <td><button name='update_$key' class='btn btn-warning'>Update</button></td>
                <td><button name='remove_$key' class='btn btn-danger'>Delete</button></td>
                <td><input type='hidden' name='item_$key' value='{$value['productName']}'></td>
            </tr>
            </form>
            ";
        }
    } else {
        echo "
        <tr>
            <td colspan='7'>Your cart is empty.</td>
        </tr>
        ";
    }
    ?>
</tbody>



            </table>
            <div class="text-end">
                <h3>Total Price: <?php echo $total_price; ?></h3>
            </div>
        </div>
    </div>
</div>

</body>
</html>