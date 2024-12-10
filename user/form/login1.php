
<?php
$Email = $_POST['email'];
$Password = $_POST['password'];
echo $Email;
echo $Password;
$Password1 = password_hash($Password, PASSWORD_BCRYPT);

$Con = mysqli_connect('localhost','root','','ecommerce');
$result = mysqli_query($Con, "SELECT * FROM `tbluser` WHERE email = '$Email' AND password='$Password'");


if(mysqli_num_rows($result)){

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