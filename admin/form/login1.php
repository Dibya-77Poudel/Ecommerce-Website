<?php
$con = mysqli_connect('localhost','root','','ecommerce');

$A_name=$_POST['username'];
$A_password=$_POST['userpassword'];

$result=mysqli_query($con,"SELECT * FROM `admin` WHERE username= '$A_name' AND userpassword= '$A_password'");

session_start();

if(mysqli_num_rows($result)){

    $_SESSION['admin'] = $A_name;

    echo"
    <script>
    alert('Login successfully!');
    window.location.href='../dashboard.php';
        </script>
    ";
}
else{

    echo "
    <script>
    alert('Invalid username/Password');
    window.location.href='../login.php';
    </script>
    ";

}

?>