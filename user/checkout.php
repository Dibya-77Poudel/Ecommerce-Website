<?php
 session_start();
    
    

?>


  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewCart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha348-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


<style>
    
    
    

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
            padding: 9px;
        }
    </style>

    <nav class="navbar" style="position: relative; width: 100%; padding: 5px 20px; display: flex; flex-direction: column;">
        <!-- Navigation links -->
        <ul style="list-style: none; display: flex; justify-content: flex-end; margin: 6px; padding: 0; margin-right: 90px;">
            <li style="margin: 0 10px;">
                <a href="index.php"  style="text-decoration: none; font-size: 17px;">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li style="margin: 0 10px;">
                <a href="about.php" style="text-decoration: none; font-size: 17px;">
                    <i class="fas fa-info-circle"></i> About
                </a>
            </li>
            <li style="margin: 0 10px;">
                <a href="#products"  style="text-decoration: none; font-size: 17px;">
                    <i class="fas fa-th"></i> Products
                </a>
            </li>
            
            <li style="margin: 0 10px;" class="cart-icon">
                <a href="viewCart.php" class="active" style="text-decoration: none; font-size: 17px;">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                
            </li>
            <li style="margin: 0 10px;">
                <a href="" style="text-decoration: none; font-size: 17px;">
                    <i class=""></i> Contact Us
                </a>
            </li>

            <li style="margin: 0; position: absolute; right: 40px; top: 30px; font-size: 16px; display: inline-flex; align-items: center;">
    <i class="fas fa-hand-paper" style="margin-right: 5px;"></i> Hey there, 
    <?php
    if (isset($_SESSION['email'])) {
        
        echo '
            <a href="form/logout.php" class="nav-icon" style="text-decoration: none; margin-left: 1px; display: inline-flex; align-items: center;">
                <i class="fas fa-user-shield" style="margin-right: 2px;"></i> Logout
            </a>
        ';
    } else {
        echo '
            <a href="form/register.php" class="nav-icon" style="text-decoration: none; margin-left: 1px; display: inline-flex; align-items: center;">
                <i class="fas fa-user-shield" style="margin-right: 1px;"></i> Signup/Register
            </a>
        ';
    }
    ?>
</li>

        </ul>
        
       
     <!-- Search bar -->
     <div class="search-container" style="display: flex; align-items: center; justify-content: center; margin: 5px auto 0; padding: 5px; margin-left: 160px; width: 90%; max-width: 800px;">
    <div style="position: relative; width: 90%;">
        <i class="fas fa-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); color: deeppink; font-size: 16px;"></i>
        <input type="text" placeholder="Search..." class="search-box" style="border: 1px solid #ccc; width: 100%; padding: 7px 7px 7px 10px; border-radius: 4px; font-size: 15px; outline: none;">
    </div>
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
    <div class="col-lg-12 text-center bg-light mb-3 rounded">
  <h1 class="text-warning" style="font-size: 1.8rem;">Checkout</h1>
  
</div>
<hr>
  
    


<div class="container-fluid" style="background-color: #ffe6f0;">
    <form action="placeorder.php" method="POST">
<div class="row" style="margin-top:20px; margin-left: 130px;" >
      <div class="col-md-5">
        <h5 style="margin-left: -100px;">Basic Details:</h5>
        <hr style="margin-left: -100px;">
        <div class="row">
         <div class="col-md-6 mb-3" style="margin-left: -100px;">
            <label class="fw-bold">Name</label>
            <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
         </div>

         <div class="col-md-6 mb-3">
            <label class="fw-bold">E-mail</label>
            <input type="email" name="email" required placeholder="Enter your email" class="form-control">
         </div>

         <div class="col-md-6 mb-3" style="margin-left: -100px;">
            <label class="fw-bold">Phone no.</label>
            <input type="text" name="phone" required placeholder="Enter your phone number" class="form-control">
         </div>

         <div class="col-md-6 mb-3">
            <label class="fw-bold">Pin Code</label>
            <input type="text" name="pincode" required placeholder="Enter your Pin code" class="form-control">
         </div>

         <div class="col-md-6 mb-3" style="margin-left: -100px;">
            <label class="fw-bold">Shipping Address</label>
            <textarea name="address" required class="form-control" rows="4"></textarea>
         </div>

        </div>
   
      </div>


        <div class="col-md-5">
         <h5>Order Details:</h5>
         <hr>
        <table class="table table-sm table-borderless">
  <thead class="text-white fs-6">
    <tr>
      <th>S.N</th>
      <th>Product Name</th>
      <th>P_Price</th>
      <th>P_Quantity</th>
      <th>Total_pr</th>
    </tr>
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
            <tr>
            
                <td>".($key + 1)."</td>
                <td><input type='text' name='PName_$key' value='{$value['productName']}' class='form-control form-control-sm' style='width: 160px; background-color:rgb(166, 241, 247);' readonly></td>
                <td><input type='number' name='PPrice_$key' value='{$product_price}' class='form-control form-control-sm text-center'style='width: 70px;' readonly></td>
                <td><input type='number' name='PQuantity_$key' value='{$product_quantity}' class='form-control form-control-sm text-center' style='width: 68px;'readonly></td>
                <td>$product_total</td>
               
            </tr>
            ";
        }
    } else {
        echo "
        <tr>
            <td colspan='5'>Your cart is empty.</td>
        </tr>
        ";
    }
    ?>
  </tbody>
</table>

            <div class="text-end" style="margin-right: -150px;">
  <h3 style="font-size: 1.3rem;">Total Price: <?php echo $total_price; ?></h3>
  <div class="">
    <input type="hidden" name="payment_mode" value="COD">
   <button  type="submit" name="placeOrderBtn" class="btn btn-primary" style="width: 100%;">Confirm and Place order | COD</button>
</div>
</div>
</div>




            

        </div>
        </form>
    </div>
    </div>
   <style>
  table {
  width: 100% !important;  /* Ensure table width is applied */
  margin: 0 auto;         /* Center the table */
  table-layout: auto;     /* Allow table to expand based on content */
}

th, td {
  padding: 15px !important; /* Ensure padding is applied */
}





</style>
</div>


</body>
</html>