
<?php
$Email = $_POST['email'];
$Password = $_POST['password'];



$Con = mysqli_connect('localhost','root','','ecommerce');
$result = mysqli_query($Con, "SELECT * FROM `tbluser` WHERE Email = '$Email' AND password='$Password'");


session_start();
if(mysqli_num_rows($result)){

    $_SESSION['email'] = $Email ;
    

    echo "
        <script>
        alert('Successfully Login');
        window.location.href = '../index.php';
        </script>
        ";
}
else{
    echo "
        <script>
        alert('Incorrect email/password');
        window.location.href = 'login.php';
        </script>
        ";
}
?>