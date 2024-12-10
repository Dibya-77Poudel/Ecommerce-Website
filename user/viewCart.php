<?php
 session_start();
    $count = 0;
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
    }

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


<style>
    /* Popup icon styling */
    .popup-icon {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: white;
        color: black;
        font-size: 20px; /* Font size */
        padding: 5px;
        border-radius: 50%;
        cursor: pointer;
        width: 30px; /* Icon width */
        height: 30px; /* Icon height */
        text-align: center;
        line-height: 18px; /* Match line height to height */
        z-index: 1000;
        font-weight: bold; /* Bold font */
        margin-top: -2px; /* Adjust this value to move the symbol up */
    }
    
    /* Popup content styling */
    .popup-content {
        display: none;
        position: absolute;
        top: 50px;
        left: 10px;
        background-color: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        width: 300px;
        z-index: 1000;
    }

    .popup-content h4 {
        margin-top: 0;
    }

    /* Product card styling */
    .card {
        position: relative;
        width: 18rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card img {
        width: 100%;
        height: auto;
    }

    .image-container {
            width: 100%;
            height: 200px; /* Set a fixed height for uniformity */
            overflow: hidden;
        }

        /* Ensure image fills the container and maintains aspect ratio */
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the container while maintaining aspect ratio */
        }

    .card-body {
        padding: 15px;
        text-align: center;
    }

    .container-fluid {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-4 {
        padding: 10px;
    }








    .back-arrow {
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    text-decoration: none;
    background: linear-gradient(45deg, #ff7eb3, #ff758c);
    color: white;
    border: none;
    border-radius: 50%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.back-arrow:hover {
    background: linear-gradient(45deg, #ff5177, #ff2a4d);
    transform: scale(1.1);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.back-arrow-icon {
    display: inline-block;
    width: 12px;
    height: 12px;
    border: solid white;
    border-width: 2px 2px 0 0;
    transform: rotate(-135deg);
    margin-right: -2px;
    margin-top: 2px;
}

.back-arrow-tooltip {
    display: none;
    position: absolute;
    bottom: -30px;
    right: 0;
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 0.3rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    white-space: nowrap;
}

.back-arrow:hover .back-arrow-tooltip {
    display: block;
}





    .header {
        position: sticky;
        top: 0; /* Sticks to the top of the page */
        z-index: 1000; /* Ensure it stays above other content */
        background-color: #ff60a7; /* Optional: Set background color */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for clarity */
    }







</style>


    
</head>
<body>


<header class="header" style="padding: 5px 0; height: auto;">
    <div class="logo">
        <a href="index.php">
            <img src="images/logo.png" alt="Fashionista Logo" class="logo-image">
        </a>
    </div>
    <style>
        .logo {
            text-align: center;
        }

        .logo-image {
            max-width: 80px; /* Reduced size to make header appear smaller */
            height: auto;
        }
    </style>

    <nav class="navbar" style="position: relative; width: 100%; padding: 5px 20px; display: flex; flex-direction: column;">
        <!-- Navigation links -->
        <ul style="list-style: none; display: flex; justify-content: flex-end; margin: 0; padding: 0;">
            <li style="margin: 0 10px;">
                <a href="index.php" class="nav-icon" style="text-decoration: none;">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li style="margin: 0 10px;">
                <a href="#about" class="nav-icon" style="text-decoration: none;">
                    <i class="fas fa-info-circle"></i> About
                </a>
            </li>
            <li style="margin: 0 10px;">
                <a href="#products" class="nav-icon" style="text-decoration: none;">
                    <i class="fas fa-th"></i> Products
                </a>
            </li>
            
            <li style="margin: 0 10px;" class="cart-icon">
                <a href="viewCart.php" class="nav-icon" style="text-decoration: none;">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <span class="cart-count"><?php echo $count ?></span>
            </li>
            <li style="margin: 0 10px;">
                <a href="#login" class="nav-icon" style="text-decoration: none;">
                    <i class="fas fa-user"></i> Account
                </a>
            </li>
        </ul>
        <!-- Search bar -->
        <div class="search-container" style="display: flex; align-items: center; justify-content: center; margin: 10px auto 0; padding: 5px; width: 90%; max-width: 800px;">
            <input type="text" placeholder="Search..." class="search-box" style="border: 1px solid #ccc; width: 100%; padding: 8px; border-radius: 4px; font-size: 14px; outline: none;">
            <i class="fas fa-search" style="margin-left: 10px; font-size: 16px;"></i>
        </div>
    </nav>
    <div>
    <a href="index.php" class="back-arrow">
        <span class="back-arrow-icon"></span>
        <span class="back-arrow-tooltip">Go back</span>
    </a>
</div>
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