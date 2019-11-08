<?php
include_once('dbcon.php');

$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];

//using stripslashes and addslashes for prevent SQL injection.
$name = stripslashes($name);
$name = addslashes($name);

$gender = stripslashes($gender);
$gender = addslashes($gender);

$email = stripslashes($email);
$email = addslashes($email);

$college = stripslashes($college);
$college = addslashes($college);

$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$sql = "INSERT INTO user VALUES ('$name','$gender','$college','$email','$mob','$password')";
$result = mysqli_query($connection,$sql);
session_start();
if ($result) {
    $_SESSION['email']=$email; //checks whether the email is register before or not.
    //if not then redirect to account page, and stores the data into db
    header('location:account.php?q=1');
}
else { //if yes then show up a warning! 
    header('location:index.php?w=Email Already Registered!');
}
?>