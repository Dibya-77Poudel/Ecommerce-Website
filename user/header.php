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
<link rel="stylesheet" href="css/style.css">
    
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
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-box">
        <i class="fas fa-search search-icon"></i> <!-- Font Awesome icon -->
    </div>
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

    <main class="main-content">
        <section class="hero">
            <h1>Welcome to Woman's wear</h1>
            <p>Your go-to store for ladies' fashion!</p>
            <a href="#products" class="cta-button">Shop Now</a>
        </section>
    </main>

   

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
        
        <div class="category-image">
            <a href="all.php">
                <img src="images/rain.jpg" alt="All Categories" class="adjusted-size" id="slidingImage">
            </a>
        </div>
    </div>
    <a href="all.php" class="cta-button">Shop Now</a>
</section>

<style>
    /* Set a fixed-size box for the images */
    .category-image {
        width: 200px; /* Fixed width */
        height: 150px; /* Fixed height */
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
        'images/rain.jpg',       // Image 1
        'images/sun.webp',        // Image 2
        'images/cloud.jpg',      // Image 3
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
            <div class="category-image">
                <a href="Traditionalwear.php"><img src="images/shirt.png" alt="Traditional Wear" class="adjusted-size"></a>
            </div>
        </div>
        
    </section>

    <section class="categories">
    <div class="container">
        <div class="category-image">
            <a href="Culturalwear.php"><img src="images/shirt.png" alt="Cultural Wear" class="adjusted-size"></a>
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
            <div class="category-image">
                <a href="Westernwear.php"><img src="images/shirt.png" alt="Western Wear" class="adjusted-size"></a>
            </div>
        </div>
        
    </section>
</div>

<br>

<div class="row">
    <!-- Second Row (3 items) -->
    <section class="categories">
        <div class="container">
            <div class="category-image">
                <a href="Trendingwear.php"><img src="images/shirt.png" alt="Trending Wear" class="adjusted-size"></a>
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
                <h3><a href="Casualwear.php" style="color: #ff007f; font-weight: bold;">Casual Wear</a></h3>
                <p> Stay comfortable and stylish with our casual wear.</p>
                <a href="Casualwear.php" class="cta-button">Show</a>
            </div>
            <div class="category-image">
                <a href="Casualwear.php"><img src="images/shirt.png" alt="Casual Wear" class="adjusted-size"></a>
            </div>
        </div>
        
    </section>

    <section class="categories">
        <div class="container">
            <div class="category-image">
                <a href="Weedingwear.php"><img src="images/shirt.png" alt="Wedding Wear" class="adjusted-size"></a>
                
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
