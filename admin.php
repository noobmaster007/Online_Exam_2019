<?php
include_once ('dbcon.php');
$ref = @$_GET['q']; //first value of q=index.php comes from the index page,
$email = $_POST['uname'];
$password = $_POST['password'];

$email = stripslashes($email); //it will strip the backslashes. to prevent SQL injection
$email = addslashes($email); //used to add backslashes with data, to keep database user-friendly

$password = stripslashes($password);
$password = addslashes($password);
$query = "SELECT email FROM admin WHERE email = '$email' and password = '$password'";
$result = mysqli_query($connection,$query) or die ('Error');

$rows = mysqli_num_rows($result); //basically it checkes if the data is present in database or not.

session_start();
if ($rows==1) {
    if (isset($_SESSION['email'])) { //checks the session email exist or not
        session_unset(); //it deletes the session variable data, but the session still exist.
        //create sessions, so we know the user logged in.. 
        //they act as a cookies, remembers the credential data on the localserver.
    }
    
    $_SESSION["name"]='Admin';
    // $_SESSION["key"]='admin';
    $_SESSION["email"]=$email;
    header("location:dash.php?q=0");
}
else { //if the login credential doesn't match, then this will execute.
    header("location:$ref?w=Warning = Access Denied!");
    // if the password is incorrect in the admin login page, then it shows a msg,
    //then it redirects to index page.. that's why we use ref variable, in location.. 
}

?>