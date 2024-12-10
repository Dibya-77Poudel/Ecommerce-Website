<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<style>
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
        <div class="row">
            <div class="col-md-6 m-auto bg-white shadow font-monospace border border-info">

            <p class="text-warning text-center fs-3 fw-bold my-3">Register to Fashion Wear</p>
            <form action="insert.php" method="POST">
                <div class="mb-3">
                    <label for="">UserName:</label>
                    <input type="text" name="name" placeholder="Enter User Name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">UserEmail:</label>
                    <input type="email" name="email" placeholder="Enter User Email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">UserNumber:</label>
                    <input type="number" name="number" placeholder="Enter User Number" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">UserPassword</label>
                    <input type="password" name="password"  placeholder="Enter Password" class="form-control">
                </div>

                <div class="mb-3">
                    
                    <button name="submit" class="w-30 bg-warning fs-5 text-white" style="width: 97%;">REGISTER NOW</button>

                </div>


                <div style="display: flex; justify-content: center; align-items: center; height: 5vh;" >
                <div class="mb-3">Already have an account?
                    <button ><a href="login.php" class="text-decoration-none">Login</a></button>

                </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <header>
    <div>
    <a href="../index.php" class="back-arrow">
        <span class="back-arrow-icon"></span>
        <span class="back-arrow-tooltip">Go back</span>
    </a>
</div>
    </header>
</body>
</html>