<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home-page</title>


     <!-----Bootstrap CDN--->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha348-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>

<?php
session_start();
if(!$_SESSION['admin']){
    header("location:form/login.php");
}
?>



<body>
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white "><h1>WomenWear</h1></a>
    <span>
      <i class="fas fa-user-shield"></i>
      Hello,<?php echo $_SESSION['admin']; ?> |
      <i class="fas fa-sign-out-alt"></i>
      <a href="form/logout.php" class="text-decoration-none text-white">Logout</a> |
      <a href="" class="text-decoration-none text-white">Userpanel</a>
    </span>
  </div>
</nav>

<div>
    <h2 class="text-center">Dashboard</h2>
</div>

<div class="row justify-content-center">
    <!-- Add Post Section -->
    <div class="col-md-3 mx-5 my-4">
        <div class="card bg-danger text-white text-center">
            <div class="card-body">
                <a href="product/index.php" class="text-white text-decoration-none fs-4 fw-bold">Add Post</a>
            </div>
        </div>
    </div>
    <!-- Users Section -->
    <div class="col-md-3 mx-5 my-4">
        <div class="card bg-danger text-white text-center">
            <div class="card-body">
                <a href="" class="text-white text-decoration-none fs-4 fw-bold">Users</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>