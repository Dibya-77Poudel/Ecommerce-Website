<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: form/login.php");
    exit;
}
?>

    <div class="container">
        <nav class="sidebar">
            <h4>FashionWear</h4>
            <ul>
                <li><a href="dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="./product/mystore.php"><i class="fas fa-box"></i> Product Detail</a></li>
                <li><a href="./product/index.php"><i class="fas fa-cube"></i>Products</a></li>
                <li><a href="user.php"><i class="fas fa-user"></i> Users</a></li>
                <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
             
                </ul>
            <button class="logout-btn"><li><a href="form/logout.php" class="text-decoration-none text-white"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            
            </button>
            
        </nav>

        <div class="main-content">
            <header>
                <div class="search-bar">
                    <input type="text" placeholder="Search Product..">
                    <i class="fas fa-search" style="margin-left: 10px; font-size: 16px;"></i>
                </div>
                <div class="user">
                    <i class="fas fa-user"></i> <span>Fashion Wear</span>
                </div>
            </header>


            <?php
  $con = mysqli_connect('localhost','root','','ecommerce');
  $product_record = mysqli_query($con,"SELECT * FROM `tblproduct`");
  $product_row_count = mysqli_num_rows($product_record); 
?>
            

            <?php
            
            $con = mysqli_connect('localhost','root','','ecommerce');
            $Record = mysqli_query($con , "SELECT * FROM `tbluser`");
            $row_count = mysqli_num_rows($Record);
            ?>

            <div class="dashboard" style="display: flex; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
  <div class="card" style="flex: 1; max-width: 22%; padding: 20px; text-align: center; background-color: #f4f4f4; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h3><i class="fas fa-shopping-cart"></i> Total Orders</h3>
    <p>0</p>
  </div>
  <div class="card" style="flex: 1; max-width: 22%; padding: 20px; text-align: center; background-color: #f4f4f4; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h3><i class="fas fa-box"></i> Total Products</h3>
    <p><?php echo $product_row_count; ?></p>
  </div>

  
  <div class="card" style="flex: 1; max-width: 22%; padding: 20px; text-align: center; background-color: #f4f4f4; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h3><i class="fas fa-user"></i> Total Users</h3>
    <p><?php echo $row_count; ?></p>
  </div>
  <div class="card" style="flex: 1; max-width: 22%; padding: 20px; text-align: center; background-color: #f4f4f4; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h3><i class="fas fa-dollar-sign"></i> Total Revenue</h3>
    <p>0</p>
  </div>
</div>


<?php
  $row = mysqli_fetch_array($product_record)?>

<?php
   $row = mysqli_fetch_array($Record)?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ppWCBNhlwTQdH7OxyRXIBLGDFNyRC1cIvFJk9ZFFzPi5Kj2LsmneZtjbISdeDZsj" crossorigin="anonymous"></script>



    <div class="col-md-1 pr-5 text-center">
    <div class="box">
        <a href="../user/index.php" class="box-link">User Panel</a>
    </div>
</div>


</body>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%; /* Full height */
    width: 100%; /* Full width */
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
}

.container {
    display: flex;
    height: 100vh; /* Ensure full height */
    background-color: #ecf0f5;
}

.sidebar {
    width: 220px;
    background-color: #2c3e50;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
    position: fixed; /* Fix the sidebar on the left */
    left: 0;
    top: 0;
    bottom: 0;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #ecf0f5;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 20px;
}

.sidebar ul li a {
    text-decoration: none;
    color: white;
    display: block;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    margin-right: 10px;
}

.sidebar ul li a.active,
.sidebar ul li a:hover {
    background-color: #34495e;
}

.logout-btn {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 5px 10px; /* Decreased vertical padding to reduce height */
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
}

.logout-btn i {
    margin-right: 5px;
}

.logout-btn li{
    margin-top: 4px;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    margin-left: 100px; /* Offset by sidebar width */
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding: 10px 20px; /* Added padding for spacing */
    background-color: #34495e; /* Darker blue-gray background for the header */
    border-radius: 8px; /* Rounded corners */
    color: white; /* Text color set to white for better contrast */
}

.search-bar input {
    width: 400px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.user {
    background-color: #3498db; /* Blue background for the user section */
    color: white;
    padding: 10px;
    border-radius: 5px;
    display: flex;
    align-items: center;
}

.user i {
    margin-right: 5px;
}

.dashboard {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 20px;
    
   
}

.card {
    background-color: white;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: auto;
    
}

.card h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #2c3e50;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card h3 i {
    margin-right: 5px;
}

.card p {
    font-size: 24px;
    color: #e74c3c;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sidebar {
        width: 100px;
    }

    .sidebar h2 {
        display: none;
    }

    .sidebar ul li a {
        font-size: 14px;
    }

    .main-content {
        padding: 10px;
        margin-left: 100px; /* Adjust for smaller sidebar */
    }

    header .search-bar input {
        width: 100%;
    }

    }

    .box {
    border: 2px solid #ddd;  /* Border around the box */
    padding: 5px;  /* Padding inside the box */
    margin: 5px;
    margin-top: 20px;
    border-radius: 5px;  /* Rounded corners */
    background-color: #f8f8f8;  /* Light gray background */
    display: inline-block;  /* Keeps the box inline */
    width: 100%;  /* Makes it span the full width of its parent */
    text-align: center;  /* Centers the link inside the box */
    cursor: pointer;
}

.box-link {
    color: #007bff;  /* Blue link color */
    text-decoration: none;  /* Removes underline */
    font-size: 16px;  /* Font size */
}

.box-link:hover {
    color: #0056b3;  /* Darker blue when hovering */
    text-decoration: underline;  /* Underline the link on hover */
}

</style>

</html>
