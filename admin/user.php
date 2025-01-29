<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <nav class="sidebar">
            <h4>FashionWear</h4>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="./product/mystore.php"><i class="fas fa-box"></i> Orders</a></li>
                <li><a href="./product/index.php"><i class="fas fa-cube"></i>Products</a></li>
                <li><a href="user.php" class="active"><i class="fas fa-user"></i> Users</a></li>
                <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
            </ul>
            <button class="logout-btn"><li><a href="form/logout.php" class="text-decoration-none text-white"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            
            </button> 
        </nav>

        <div class="main-content col-md-11">
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
            $Record = mysqli_query($con , "SELECT * FROM `tbluser`");
            $row_count = mysqli_num_rows($Record);
            ?>

            <table class="table table-secondary table-bordered">
    <thead class="text-center">
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Delete</th>  
    </thead>

    <tbody class="text-center text-danger">
    <?php

    $i = 0;
   while( $row = mysqli_fetch_array($Record)){
    echo " 
    <tr>
            <td>"; ?><?php echo ++$i; ?><?php echo "</td>
            <td>$row[UserName]</td>
            <td>$row[Email]</td>
            <td>$row[Number]</td>
          <td>
  <a href='delete.php? ID=$row[Id]' class='btn btn-outline-danger' style='padding: 5px 10px; font-size: 16px;'>Delete</a>
</td>

        </tr>
        ";
   
   }
    
    ?>

    </tbody>
</table>
         </div>

         <div class="col-md-1 pr-5 text-center">
            <h3 class="text-danger">Total</h3>
            <h1 class="bg-danger text-white"> <?php echo $row_count; ?></h1>
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
</style>

</html>
