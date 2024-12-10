<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-page</title>

    <!---Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


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
                <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-box"></i> Orders</a></li>
                <li><a href="index.php"><i class="fas fa-cube"></i>Products</a></li>
                <li><a href="#"><i class="fas fa-tags"></i> Categories</a></li>
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
    <a href="../mystore.php" class="back-arrow">
        <span class="back-arrow-icon"></span>
        <span class="back-arrow-tooltip">Go back</span>
    </a>
</div>

            </header>
           

           
</div>

    </div>


    <div class="container-custom">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-3">

           
    <form action="insert.php" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <p class="text-center fw-bold fs-3 text-warning">Product Detail:</p>
</div>

<div class="mb-3">
  <label class="form-label">Product Name:</label>
  <input type="text" name="Pname" class="form-control" placeholder="Enter product name">
</div>

<div class="mb-3">
  <label class="form-label">Product Price:</label>
  <input type="text" name="Pprice" class="form-control" placeholder="Enter product price">
</div>

<div class="mb-3">
  <label class="form-label">Add Product Image:</label>
  <input type="file" name="Pimage"class="form-control" >
</div>

<div class="mb-3">
                    <label class="form-label">Product Description:</label>
                    <textarea name="Pdescription" class="form-control" placeholder="Enter product description" rows="3"></textarea>
                </div>

<div class="mb-3">
  <label class="form-label">Select Page Category</label>
  <select class="form-select" name="PCategory">
  <option value="Home">HOME</option>
  <option value="Traditional Wear">TRADITIONAL WEAR</option>
  <option value="Cultural Wear">CULTURAL WEAR</option>
  <option value="Western Wear">WESTERN WEAR</option>
  <option value="Trending Wear">TRENDING WEAR</option>
  <option value="Weeding Wear">WEEDING WEAR</option>
  <option value="Winter Wear">WINTER WEAR</option>
</select>
</div>

<div class="mb-3">
  <label class="form-label">Total Stock Available:</label>
  <input type="number" name="Pstock" class="form-control" placeholder="Enter total stock available" min="0">
</div>

<div class="mb-3">
  <label class="form-label">Color Name:</label>
  <input type="text" name="Pcolor" class="form-control" placeholder="Enter color name" oninput="updateColorBox(this.value)">
</div>

    <button name="submit"class="bg-danger fs-4 fw-bold my-3 form-control text-white">Upload</button>
</form>

</div>
        </div>
    </div>


  
<!---fetch data----->

<div class="container">
  <div class="row">
    <div class="col-md-8 m-auto">

   

<table class="table border border-warning table-hover border my-5">
  

  <thead class="bg-dark text-white fs-5 font-monospace text-center">
      <th>Id</th>                              
      <th>Name</th>
      <th>Price</th>
      <th>Image</th>
      <th>Description</th>
      <th>Category</th>
      <th>Delete</th>
  </thead>


  <tbody class="text-center">
    <?php
  include 'Config.php';
  $Record = mysqli_query($con,"SELECT * FROM `tblproduct`");

  while ($row = mysqli_fetch_array($Record))

  echo"

  <tr>  

<td>$row[Id]</td>
<td>$row[PName]</td>
<td>$row[PPrice]</td>
<td><img src='$row[PImage]' height='90px' width='200px'></td>
<td>{$row['PDescription']}</td>
<td>$row[PCategory]</td>
<td><a href='' class = 'btn btn-danger'>Delete</a></td>

  </tr>
 ";


   ?>
  </tbody>

</table>
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

.container-custom {
     /* Ensure it respects nearby elements */
    top: -20px; /* Move it upwards */
    /* Remove any default margin from the top */
    padding: -70px; /* Adjust padding if necessary */
    background-color: #f8f9fa; /* Example background color */
    border: 1px solid #ccc; /* Example border */
    border-radius: 5px; /* Optional rounded corners */
}

</style>
</html>