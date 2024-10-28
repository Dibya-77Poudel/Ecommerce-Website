<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-page</title>

    <!---Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    <div class="container">
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
  <option value="Casual Wear">CASUAL WEAR</option>
</select>
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
  

  <thead class="  bg-dark text-white fs-5 font-monospace text-center">
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
</html>