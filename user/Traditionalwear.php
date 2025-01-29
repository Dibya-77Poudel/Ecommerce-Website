<?php
session_start();
$count = 0;
if (isset($_SESSION['cart'])) {
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
            font-size: 20px;
            /* Font size */
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
            width: 30px;
            /* Icon width */
            height: 30px;
            /* Icon height */
            text-align: center;
            line-height: 18px;
            /* Match line height to height */
            z-index: 1000;
            font-weight: bold;
            /* Bold font */
            margin-top: -2px;
            /* Adjust this value to move the symbol up */
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
            height: 200px;
            /* Set a fixed height for uniformity */
            overflow: hidden;
        }

        /* Ensure image fills the container and maintains aspect ratio */
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Cover the container while maintaining aspect ratio */
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
            top: 0;
            /* Sticks to the top of the page */
            z-index: 1000;
            /* Ensure it stays above other content */
            background-color: #ff60a7;
            /* Optional: Set background color */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Optional: Add shadow for clarity */
        }






        /* Sidebar trigger area */
        .sidebar-container {
            position: fixed;
            top: 120px;
            /* Sidebar starts 10px from the top */
            left: 0;
            height: calc(70vh - 10px);
            /* Adjust height to match viewport minus top offset */
            width: 175px;
            /* Thin activation area */
            z-index: 1000;
            background-color: transparent;
            overflow: hidden;
            /* Prevent content overflow */
        }

        /* Hidden sidebar */
        .container {
            position: absolute;
            top: 40;
            left: -160px;
            /* Initially hidden off-screen */
            width: 180px;
            /* Sidebar width */
            height: 90%;
            /* Full height relative to the parent */
            background-color: #E0E0E0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            transition: left 0.3s ease;
            /* Smooth slide-in effect */
        }

        /* Show sidebar when hovering over the container */
        .sidebar-container:hover .container {
            left: 0;
            /* Bring into view */
        }

        /* Styling for each box */
        .wear-box {
            width: 100%;
            /* Full width inside the sidebar */
            height: 40px;
            background-color: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            text-transform: capitalize;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s, box-shadow 0.3s;
        }

        /* Hover effect on wear-box */
        .wear-box:hover {
            transform: scale(1.03);
            background-color: #ffccd5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Button inside each box */
        .cta-button {
            text-decoration: none;
            color: white;
            width: 100%;
            text-align: center;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .wear-box:hover .cta-button {
            color: white;
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
                max-width: 80px;
                /* Reduced size to make header appear smaller */
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
                        <i class="fas fa-user"></i> Contact us
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
            <div class="search-container" style="display: flex; align-items: center; justify-content: center; margin: 2px auto 0; padding: 3px; width: 90%; max-width: 800px; margin-left: 200px;">
    <input type="text" id="searchBox" placeholder="Search..." class="search-box" style="border: 1px solid #ccc; width: 73%; padding: 8px; border-radius: 4px; font-size: 14px; outline: none;">
    <!-- <i class="fas fa-search" style="margin-left: 10px; font-size: 16px;"></i> -->
    <select id="colorFilter" class="search-box" style="border: 1px solid #ccc; padding: 8px; border-radius: 4px; font-size: 14px; outline: none; max-width: 100px; margin-left: 10px;">
        <option value="">All Colors</option>
        <option value="Red">Red</option>
        <option value="Blue">Blue</option>
        <option value="Green">Green</option>
        <!-- Add more color options as needed -->
    </select>
</div>
<div id="productContainer" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 10px;">

        </nav>
        <div>
            <a href="all.php" class="back-arrow">
                <span class="back-arrow-icon"></span>
                <span class="back-arrow-tooltip">Go back</span>
            </a>
        </div>
    </header>



    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">

                <h2 class="text-warning font-monospace text-center my-3">Traditional Wear</h2>


                <div class="sidebar-container">
                    <div class="container">
                    <div class="wear-box">
                            <a href="all.php" class="cta-button">All Product</a>
                        </div>
                        <div class="wear-box">
                            <a href="Traditionalwear.php" class="cta-button">Traditional Wear</a>
                        </div>
                        <div class="wear-box">
                            <a href="Culturalwear.php" class="cta-button">Cultural Wear</a>
                        </div>
                        <div class="wear-box">
                            <a href="Westernwear.php" class="cta-button">Western Wear</a>
                        </div>
                        <div class="wear-box">
                            <a href="Trendingwear.php" class="cta-button">Trending Wear</a>
                        </div>
                        <div class="wear-box">
                            <a href="Weedingwear.php" class="cta-button">Weeding Wear</a>
                        </div>
                        <div class="wear-box">
                            <a href="Winterwear.php" class="cta-button">Winter Wear</a>
                        </div>
                    </div>
                </div>

                <?php
// Include your database configuration file
include 'Config.php';

// Fetch products from the database
$Record = mysqli_query($con, "SELECT id, PName, PPrice, PDescription, PImage, PCategory, PStock, PColor FROM tblproduct");

// Loop through products
while ($row = mysqli_fetch_array($Record)) {
    $check_page = $row['PCategory'];
    if ($check_page === 'Traditional Wear') {
        echo "
        <div class='product-card' data-product='{$row['PName']}' data-color='{$row['PColor']}' style='width: 290px; height: 390px; margin-left: 40px; margin-bottom: 20px;'>
            <div class='card m-auto col-md-3' style='width: 100%; height: 100%;'>
                
                <div class='image-container' style='position: relative; height: 290px;'>
                 <form action='Insertcart.php' method='POST'>
                    <div style='position: absolute; top: 1px; left: 1px; background: rgba(0, 0, 0, 0.6); color: white; padding: 5px 10px; font-size: 0.9rem; border-radius: 5px;'>
                        Stock: {$row['PStock']}
                    </div>
                    <div style='position: absolute; top: 1px; right: 1px; background: rgba(255, 0, 0, 0.8); color: white; padding: 5px 10px; font-size: 0.9rem; border-radius: 5px;'>
                        Rs: {$row['PPrice']}
                    </div>
                    <img src='../admin/product/{$row['PImage']}' class='card-img-top' style='width: 100%; height: 100%; object-fit: cover; cursor: pointer;' onclick='showImageModal(\"../admin/product/{$row['PImage']}\")'>
                </div>
                <div class='card-body text-center'>
                    <h5 class='card-title text-danger fs-6 fw-bold' style='font-size: 0.8rem;'>{$row['PName']}</h5>
                    <div id='productDetails{$row['id']}' style='font-size: 0.8rem; margin: 3px 10px 0; margin-top: -5px; color: #555; line-height: 1.3; max-width: 220px; word-wrap: break-word; white-space: normal;'>
                        <p>{$row['PDescription']}</p>
                    </div>
                    <div style='width: 70%; margin: auto; margin-top: 1px; text-align: left;'>
                        <input type='number' name='PQuantity' min='1' max='20' placeholder='Quantity'  
                            style='width: 100%; padding: 6px; font-size: 0.8rem; box-sizing: border-box; height: 25px; margin-bottom: 2px;' required>
                        <select name='PSize' class='form-select' 
                            style='width: 100%; padding: 6px; font-size: 0.8rem; box-sizing: border-box; height: 30px; margin-bottom: 2px;' required>
                            <option value='' disabled selected>Select Size</option>
                            <option value='S'>Small</option>
                            <option value='M'>Medium</option>
                            <option value='L'>Large</option>
                        </select>
                    </div>
                </div>
                <!-- Add to Cart Button -->
                <input type='hidden' name='PName' value='{$row['PName']}'>
                <input type='hidden' name='PPrice' value='{$row['PPrice']}'>
                <input type='hidden' name='PImage' value='{$row['PImage']}'>
                <input type='hidden' name='PStock' value='{$row['PStock']}'>
                <input type='submit' name='addCart' class='btn btn-warning text-white fw-bold' style='width: 80%; margin: -10px auto 5%;' value='Add To Cart'>
                
            </form>
            </div>
        </div>
        ";    
    }
}
?>
                <!-- Modal for image popup -->
                <div id='imageModal' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); z-index: 1000; justify-content: center; align-items: center;'>
                    <img id='modalImage' src='' style='max-width: 90%; max-height: 90%; border: 5px solid white;'>
                    <span style='position: absolute; top: 10px; right: 10px; color: white; font-size: 30px; cursor: pointer;' onclick='closeImageModal()'>&times;</span>
                </div>

                <script>
                    function showImageModal(imageSrc) {
                        const modal = document.getElementById('imageModal');
                        const modalImage = document.getElementById('modalImage');
                        modalImage.src = imageSrc;
                        modal.style.display = 'flex';
                    }

                    function closeImageModal() {
                        const modal = document.getElementById('imageModal');
                        modal.style.display = 'none';
                    }
                    // JavaScript to filter products
const searchBox = document.getElementById('searchBox');
const colorFilter = document.getElementById('colorFilter');
const productCards = document.querySelectorAll('.product-card');

searchBox.addEventListener('input', filterProducts);
colorFilter.addEventListener('change', filterProducts);

function filterProducts() {
    const query = searchBox.value.toLowerCase();
    const selectedColor = colorFilter.value.toLowerCase();

    productCards.forEach(card => {
        const productName = card.getAttribute('data-product').toLowerCase();
        const productColor = card.getAttribute('data-color').toLowerCase();

        if ((productName.includes(query) || query === '') && (productColor.includes(selectedColor) || selectedColor === '')) {
            card.style.display = 'block'; // Show matching cards
        } else {
            card.style.display = 'none'; // Hide non-matching cards
        }
    });
}

                </script>

</body>

</html>