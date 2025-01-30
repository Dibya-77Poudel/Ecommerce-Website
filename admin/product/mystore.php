<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-page</title>

    <!---Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <!-- Font Awesome CDN -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

<style>
   .container-custom {
            margin-top: 20px; /* Space below the header */
            margin-left: 20px; /* Slight shift to the right */
        }

        .row {
            background-color: #f4f4f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
    </style>


  </head>
<body>



<div class="container">
        <nav class="sidebar">
            <h4>FashionWear</h4>
            <ul>
                <li><a href="../dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="" class="active"><i class="fas fa-box"></i> Product</a></li>
                <li><a href=""><i class="fas fa-cube"></i> Order</a></li>
                <li><a href="../user.php"><i class="fas fa-tags"></i> Users</a></li>
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

                <div>
    <a href="../dashboard.php" class="back-arrow">
        <span class="back-arrow-icon"></span>
        <span class="back-arrow-tooltip">Go back</span>
    </a>
</div>

            </header>
           

           

           
 
   


  
<!---fetch data----->


   
<div> <a href="index.php" class="add-product-btn">+ Add New Product</a></div>
   
  
<table class="table table-secondary table-bordered custom-table">
<thead class="text-center">
      <th>Id</th>                              
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Category</th>
      <th>Image</th>
      <th>Stock</th>
      <th>Color</th>
      <th>Delete</th>
      <th>Update</th>
  </thead>

  <tbody class="text-center text-danger">
    <?php
  include 'Config.php';
  $product_record = mysqli_query($con,"SELECT * FROM `tblproduct`");
  $product_row_count = mysqli_num_rows($product_record); 
?>
<?php

$i = 0;
while ($row = mysqli_fetch_array($product_record)){
 echo " 
 <tr>
         <td>"; ?><?php echo ++$i; ?><?php echo "</td>
<td>$row[PName]</td>
<td>$row[PPrice]</td>
<td>{$row['PDescription']}</td>
<td>$row[PCategory]</td>
<td><img src='$row[PImage]' height='53px' width='60px'></td>
<td>$row[PStock]</td>
<td>$row[PColor]</td>
<td><a href='delete.php? ID= $row[Id]' class='btn btn-outline-danger'>Delete</a></td>
<td><a href='update.php? ID= $row[Id]' class = 'btn btn-outline-warning' >Update</a></td>

  </tr>
 ";
}

   ?>
  </tbody>

</table>
<hr>
<div class="col-md-1 pr-5 text-center">
            <h3 class="text-dark">Total:<?php echo $product_row_count; ?></h3>
           
         </div>
</div>
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
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logout-btn i {
    margin-right: 5px;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    margin-left: 100px; /* Offset by sidebar width */
    width: 120px;
}

header {
    display: flex;
    justify-content: space-between; /* Ensures items are spaced out (logo on left, user on right) */
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
    justify-content: center; /* Center the content inside the user div */
    margin-right: -400px;
}

.user i {
    margin-right: 5px; /* Space between icon and text */
}

.add-product-btn {
            position: absolute;
            top: 88px;
            right: 146px;
            padding: 5px 8px;
            background-color:rgb(34, 94, 173); /* Light blue color */
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .add-product-btn:hover {
            background-color:rgb(74, 126, 238); /* Slightly darker blue on hover */
        }

        .custom-table {
        margin-top: 45px;
       /* Adjust the value as needed */
    }








</style>
</div>

    </div>
</html>