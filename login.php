<?php
session_start();
if (isset($_SESSION['email'])) {
    session_destroy();
}

include_once('dbcon.php');
$ref=@$_GET['q'];       //same as admin.php
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email); //it will strip the backslashes. to prevent SQL injection
$email = addslashes($email); //used to add backslashes with data, to keep database user-friendly
//this is for password purpose
$password = stripslashes($password); 
$password = addslashes($password);

$password=md5($password); //encrypts the password with md5 function
$query = "SELECT email FROM admin WHERE email = '$email' and password = '$password'";
$result = mysqli_query($connection,$query)or die('Error');

$rows = mysqli_num_rows($result); //basically it checkes if the data is present in database or not.

if ($rows==1) {
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
    }
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    header('location:account.php?q=1');
}
else {
    header("location:$ref?w=Wrong Username and Password!"); //same as admin.php
}

?>