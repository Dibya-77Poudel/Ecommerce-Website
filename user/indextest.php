<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Ecommerce</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- For icons -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="header-icons">
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
            <a href="#"><i class="fas fa-user"></i></a> <!-- Login Icon -->
        </div>
    </header>

    <!-- Main Banner Section -->
    <section class="banner">
        <div class="banner-content">
            <h1>Welcome to A B2C Application for Fashion Ware <br> Where Style Meets Elegance!</h1>
            <a href="#" class="btn-shop">Shop Now</a>
        </div>
        <div class="banner-images">
            <img src="model1.jpg" alt="Model 1">
            <img src="model2.jpg" alt="Model 2">
            <img src="model3.jpg" alt="Model 3">
            <img src="model4.jpg" alt="Model 4">
            <img src="model5.jpg" alt="Model 5">
        </div>
    </section>

</body>
<style> /* General styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #e1006e;
    height: 80px; /* Adjust header height */
}

header .logo {
    background-color: white;
    padding: 5px;
    border-radius: 5px;
}

header .logo img {
    width: 70px; /* Adjust logo size */
}

nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.search-bar {
    display: flex;
    align-items: center;
}

.search-bar input {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.search-bar button {
    background-color: #fff;
    border: none;
    cursor: pointer;
    padding: 5px;
    margin-left: 5px;
}

.header-icons a {
    color: white;
    font-size: 20px;
    margin-left: 15px;
}

.banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f5f5f5;
}

.banner-content {
    text-align: center;
    flex: 1;
}

.banner-content h1 {
    font-size: 2.5em;
    color: #333;
}

.btn-shop {
    display: inline-block;
    padding: 10px 20px;
    background-color: #e1006e;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.banner-images {
    flex: 2;
    display: flex;
    gap: 10px;
}

.banner-images img {
    width: 150px;
    height: auto;
    border-radius: 10px;
}
</style>
</html>
