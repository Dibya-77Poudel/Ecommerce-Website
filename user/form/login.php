<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto bg-white shadow font-monospace border border-info">

            <p class="text-warning text-center fs-3 fw-bold my-3">User LOGIN</p>
            <form action="login1.php" method="POST">
                

                <div class="mb-3">
                    <label for="">UserEmail:</label>
                    <input type="email" name="email" placeholder="Enter User Email" class="form-control">
                </div>

               

                <div class="mb-3">
                    <label for="">UserPassword</label>
                    <input type="password" name="password"  placeholder="Enter Password" class="form-control">
                </div>


                <div class="mb-3">
                    <button class="w-30  fs-5 text-dark">LOGIN</button>
                </div>

                <div class="mb-3">
                    <button name="submit" class="w-30 bg-warning fs-5 text-white"><a href="register.php" class="text-decoration-none">REGISTER</a></button>

                </div>

            </form>
            </div>
        </div>
    </div>
</body>
</html>