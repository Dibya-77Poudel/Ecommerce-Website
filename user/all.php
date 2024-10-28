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
</style>
    
</head>
<body>

<?php
 session_start();
    $count = 0;
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
    }

?>
    <header class="header">
    <div class="logo">
    <a href="index.php">
        <img src="images/logo.png" alt="Fashionista Logo" class="logo-image">
    </a>
</div>
<style>
    .logo {
       
    }
    
    .logo-image {
        max-width: 100px; 
        height: auto; 
    }
</style>

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



<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">

<h1 class="text-warning font-monospace text-center my-3">All</h1>

<?php
        // Include your database configuration file
        include 'Config.php';
        
        // Fetch products from the database
        $Record = mysqli_query($con, "SELECT id, PName, PPrice, PDescription, PImage, PCategory FROM tblproduct");
        
        // Loop through products
        while ($row = mysqli_fetch_array($Record)) {
            $check_page = $row['PCategory'];
            if ($check_page === 'Home'); {
                // Dynamically generate product card with a popup icon
                echo "
                <div class='col-md-4'>
                <form action = 'Insertcart.php' method = 'POST'>
                    <div class='card m-auto' >


                        <!-- Popup Icon -->
                        <div class='popup-icon' onclick='togglePopup({$row['id']})'>!</div>

                         <div class='image-container'>
                            <img src='../admin/product/{$row['PImage']}' class='card-img-top'>
                        </div>

                        <div class='card-body text-center'>
                            <h5 class='card-title text-danger fs-4 fw-bold'>{$row['PName']}</h5>
                            <p class='card-text text-danger fs-5 fw-bold'>Rs: {$row['PPrice']}</p>

                            <input type= 'hidden' name= 'PName' value= '$row[PName]'>
                             <input type= 'hidden' name= 'PPrice' value= '$row[PPrice]'>
                            
                            <!-- Quantity Input -->
                            <input type='number' name='PQuantity' min='1' max='20' placeholder='Quantity'  
  style='width: 60%; padding: 10px; font-size: 1rem; box-sizing: border-box; height: 30px; margin-top: 10px;' required>

                            <!-- Size Select -->
                            <select name='PSize' class='form-select' 
                                style='width: 60%; padding: 8px; font-size: 0.9rem; box-sizing: border-box; height: 35px; margin-top: 10px;' required>
                                <option value='' disabled selected>Select Size</option>
                                <option value='S'>Small</option>
                                <option value='M'>Medium</option>
                                <option value='L'>Large</option>
                                <option value='XL'>Extra Large</option>
                            </select><br>

                            <!-- Add to Cart Button -->
                           <input type='submit' name='addCart' class='btn btn-success text-white fw-bold' style='width: 80%;' value='Add To Cart'>

                        </div>

                        <!-- Hidden Popup Content for Product Details -->
                        <div class='popup-content' id='productDetails{$row['id']}'>
                            <h4>{$row['PName']} Details</h4>
                            <p>{$row['PDescription']}</p>
                            
                        </div>
                    </div>
                    </form>
                </div>
                ";
            }
        }
        ?>

    </div>
</div>

<script>
    // Function to toggle the popup visibility
    function togglePopup(id) {
        // Log the id to check if it's being passed correctly
        console.log("Toggle Popup for ID:", id);

        var popup = document.getElementById('productDetails' + id);
        
        // Check if the element exists before trying to toggle
        if (popup) {
            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'block';
            } else {
                popup.style.display = 'none';
            }
        } else {
            console.error("Popup element not found for ID:", id);
        }
    }
</script>

</body>
</html>