<?php
$Con = mysqli_connect('localhost', 'root', '', 'ecommerce');

// Check database connection
if (!$Con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Number = $_POST['number'];
    $Password = $_POST['password'];
    $ConfirmPassword=$_POST['confirmpassword'];

    // Validate password: must be greater than 5 characters and contain at least one special character
    if (strlen($Password) <= 5 || !preg_match('/[^a-zA-Z0-9]/', $Password)) {
        echo "
        <script>
        alert('Password must be more than 5 characters and include at least one special character.');
        window.location.href = 'register.php';
        </script>
        ";
        exit();
    }
    //Validating password and confirm password
    if($Password!=$ConfirmPassword){
        echo "
        <script>
        alert('Password do not match.');
        window.location.href = 'register.php';
        </script>
        ";
    }


    // Validate number: must be exactly 10 digits and start with 98
    if (!preg_match('/^\d{10}$/', $Number)) {
        echo "
        <script>
        alert('Number must be exactly 10 digits.');
        window.location.href = 'register.php';
        </script>
        ";
        exit();
    }
    
    // Hash the password if validation is successful
    //$Password = password_hash($Password, PASSWORD_BCRYPT);

    // Check for duplicate email or username
    $Dup_Email = mysqli_query($Con, "SELECT * FROM `tbluser` WHERE Email = '$Email'");
    $Dup_username = mysqli_query($Con, "SELECT * FROM `tbluser` WHERE UserName = '$Name'");

    if (mysqli_num_rows($Dup_Email)) {
        echo "
        <script>
        alert('This Email is already taken');
        window.location.href = 'register.php';
        </script>
        ";
    } elseif (mysqli_num_rows($Dup_username)) {
        echo "
        <script>
        alert('This username is already taken');
        window.location.href = 'register.php';
        </script>
        ";
    } else {
        // Insert the data into the database
        $query = "INSERT INTO `tbluser`(`UserName`, `Email`, `Number`, `Password`) VALUES ('$Name', '$Email', '$Number', '$Password')";
        if (mysqli_query($Con, $query)) {
            echo "
            <script>
            alert('Registered successfully!');
            window.location.href = 'login.php';
            </script>
            ";
        } else {
            echo "Error: " . mysqli_error($Con);
        }
    }
}
?>
