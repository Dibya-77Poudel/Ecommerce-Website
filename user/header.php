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
    <title>A B2C Fashion Wear Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha348-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    



<style>
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
                <a href="index.php" class="active" style="text-decoration: none; font-size: 17px;">
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
                <a href="viewCart.php"  style="text-decoration: none; font-size: 17px;">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <span class="cart-count"><?php echo $count ?></span>
            </li>
            <li style="margin: 0 10px;">
                <a href=""  style="text-decoration: none; font-size: 17px;">
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
       
    </header>



</class>

    <main class="main-content">
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Welcome to B2C Fashion Wear Application. </h1>
                <p>Your go-to store for ladies' fashion!</p>
                <a href="all.php" class="cta-button">Shop Now</a>
            </div>
            <div class="hero-image">
                <img src="images/backk.png" alt="Background Image" />
            </div>
        </div>
    </section>
</main>

<style>
    .hero {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background-color:rgb(250, 247, 247);
        position: relative;
        overflow: hidden;
    }

    .hero-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 1200px;
        width: 100%;
    }

    .hero-text {
        flex: 1;
        max-width: 50%;
        color: #ffffff; /* White text */
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); /* Adds contrast for readability */
    }

    .hero-text h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ffffff; /* White heading */
    }

    .hero-text p {
        margin: 10px 0;
        font-size: 1.2rem;
        color: #ffffff; /* White paragraph */
    }

    .cta-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1rem;
        color: #fff; /* White text */
        background-color: #ff007f; /* Pink button */
        border: none;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .cta-button:hover {
        background-color: #e60073; /* Slightly darker pink on hover */
    }

    .navbar ul li a.active {
    background-color:rgb(255, 126, 190);
    border-radius: 5px;
    padding: 12px;
}

    .hero-image {
        flex: 1;
        max-width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-image img {
        max-width: 100%;
        height: auto;
        object-fit: contain; /* Keeps the original image quality */
    }



    @media (max-width: 768px) {
        .hero-content {
            flex-direction: column;
        }

        .hero-text {
            max-width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .hero-image {
            max-width: 100%;
        }
    }
</style>



   

    <script>
        let cartCount = 0;

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                cartCount++;
                document.querySelector('.cart-count').innerText = cartCount;
                alert('Product added to cart!');
            });
        });

        // Hamburger menu toggle
        const hamburger = document.getElementById('hamburger');
        const navbarMenu = document.querySelector('.navbar ul');

        hamburger.addEventListener('click', () => {
            navbarMenu.classList.toggle('active');
        });
    </script>


<div class="container mt-3">
<h1 class="text-danger font-monospace text-center my-3" style="font-weight: bold; text-transform: uppercase; letter-spacing: 2px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                OUR COLLECTIONS
            </h1>
            
            <!-- Decorative line with gradient and icons -->
            <div class="d-flex justify-content-center align-items-center mb-4">
                <!-- Decorative icon on the left -->
                <i class="fas fa-star text-danger me-2" style="font-size: 1.5rem;"></i>
                <!-- Gradient line -->
                <div style="width: 150px; height: 4px; background: linear-gradient(to right, red, yellow); border-radius: 5px;"></div>
                <!-- Decorative icon on the right -->
                <i class="fas fa-star text-danger ms-2" style="font-size: 1.5rem;"></i>
            </div>
        

        
 

            <div class="row">
    <!-- All Category Section -->
    <section class="categories">
    <div class="container">
        <div class="category-text">
            <h3><a href="all.php" style="color: #ff007f; font-weight: bold;">All</a></h3>
            <p>Explore our entire collection, from traditional to trendy, and find the perfect wear for every occasion.</p>
        </div>
        
        <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
            <a href="all.php"style="color: #ff007f; font-weight: bold;">
                <img src="images/tre.jpeg" alt="All Categories" style="width: 100%; height: auto; object-fit: cover; display: block;" id="slidingImage">
            </a>
        </div>
    </div>
    <a href="all.php" class="cta-button">Shop Now</a>
</section>

<style>
    /* Set a fixed-size box for the images */
    .category-image {
        width: 200px; /* Fixed width */
        height: 200px; /* Fixed height */
        overflow: hidden; /* Hide any overflow */
    }

    /* Adjust image to fit within the box */
    .category-image .adjusted-size {
        width: 100%; /* Make image cover the box width */
        height: 100%; /* Make image cover the box height */
        object-fit: cover; /* Crop image to fill the box */
    }
</style>

<script>
    // JavaScript to create a sliding effect for the images
    const images = [
        'images/old.jpeg',       // Image 1
        'images/westt.jpeg',        // Image 2
        'images/tre.jpeg',      // Image 3
    ];
    let currentIndex = 0;

    function slideImage() {
        const slidingImage = document.getElementById('slidingImage');
        currentIndex = (currentIndex + 1) % images.length;  // Loop through images
        slidingImage.src = images[currentIndex];
    }

    // Change image every 2 seconds
    setInterval(slideImage, 2000);
</script>




    <!-- First Row (3 items) -->
    <section class="categories">
        <div class="container">
            <div class="category-text">
                <h2>Categories</h2>
                <h3><a href="Traditionalwear.php" style="color: #ff007f; font-weight: bold;">Traditional Wear</a></h3>
                
                <p>Elevate your style with our collection of edgy jackets and coats, designed to make a statement wherever you go. From sleek leather bombers to overcoats, each piece combines attitude and utility for a truly unique look.</p>
                <a href="Traditionalwear.php" class="cta-button">Show</a>
            </div>
            <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
  <a href="Traditionalwear.php">
    <img src="images/old.jpeg" alt="Traditional Wear" style="width: 100%; height: auto; object-fit: cover; display: block;">
  </a>
</div>
        </div>
        
    </section>

    <section class="categories">
    <div class="container">
    <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
  <a href="Culturalwear.php">
    <img src="images/culturall.jpg" alt="Cultural Wear" style="width: 80%; height: 250px; object-fit: cover; display: block;">
  </a>
</div>
        <div class="category-text">
            <h3><a href="Culturalwear.php" style="color: #ff007f; font-weight: bold;">Cultural Wear</a></h3>
            <p>Elevate your style with our collection of edgy jackets and coats, designed to make a statement wherever you go. From sleek leather bombers to overcoats, each piece combines attitude and utility for a truly unique look.</p>
            <a href="Culturalwear.php" class="cta-button">Show</a> <!-- Moved here -->
        </div>
    </div>
</section>


    <section class="categories">
        <div class="container">
            <div class="category-text">
                <h3><a href="Westernwear.php" style="color: #ff007f; font-weight: bold;">Western Wear</a></h3>
                <p>Elevate your style with our collection of edgy jackets and coats, designed to make a statement wherever you go. From sleek leather bombers to overcoats, each piece combines attitude and utility for a truly unique look.</p>
                <a href="Westernwear.php" class="cta-button">Show</a>
           
            </div>
            <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
  <a href="Westernwear.php">
    <img src="images/westt.jpeg" alt="Western Wear" style="width: 100%; height: auto; object-fit: cover; display: block;">
  </a>
</div>
        </div>
        
    </section>
</div>

<br>

<div class="row">
    <!-- Second Row (3 items) -->
    <section class="categories">
        <div class="container">
        <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
  <a href="Trendingwear.php">
    <img src="images/tre.jpeg" alt="Trending Wear" style="width: 100%; height: 300px; object-fit: cover; display: block;">
  </a>
</div>
            <div class="category-text">
                <h3><a href="Trendingwear.php" style="color: #ff007f; font-weight: bold;">Trending Wear</a></h3>
                <p>Make your big day special with our exclusive trending wear.</p>
                <a href="Trendingwear.php" class="cta-button">Show</a>
            </div>
        </div>
        
    </section>

    <section class="categories">
        <div class="container">
            <div class="category-text">
                <h3><a href="Winterwear.php" style="color: #ff007f; font-weight: bold;">Winter Wear</a></h3>
                <p> Stay comfortable and stylish with our casual wear.</p>
                <a href="Winterwear.php" class="cta-button">Show</a>
            </div>
            <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
  <a href="winterwear.php">
    <img src="images/winter.jpeg" alt="winter Wear" style="width: 80%; height: 300px; object-fit: cover; display: block;">
  </a>
</div>
        </div>
        
    </section>

    <section class="categories">
        <div class="container">
        <div class="category-image" style="width: 90%; max-width: 400px; margin: 0 auto;">
  <a href="Weedingwear.php">
    <img src="images/weeding.jpg" alt="Weeding Wear" style="width: 100%; height:440px; object-fit: cover; display: block;">
  </a>
</div>
            
            <div class="category-text">
                <h3><a href="Weedingwear.php" style="color: #ff007f; font-weight: bold;">Wedding Wear</a></h3>
                <p>Dress to impress with our Wedding wear collection.</p>
                <a href="Weedingwear.php" class="cta-button">Show</a>
            </div>
            
        </div>
        
    </section>
</div>

<style>
    /* Styles for making images between small and medium */
    .category-image .adjusted-size {
        max-width: 200px; /* Set size between small and medium */
        height: auto; /* Maintain aspect ratio */
    }
</style>


</body>
</html>
