<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>DASHBOARD</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Online Test</span></div>
<?php
include_once('dbcon.php');
session_start();

$email = $_SESSION['email'];
if (!(isset($_SESSION['email']))) { //if there is no email is match in database then go back to index.php
  header('location:index.php');
}
else {  //if yes, then print the name of the user in dash.php
  $name = $_SESSION['name'];

echo '<span class="pull-right top title1">
            <span class="log1">
            <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            Hello, <a href="#"> class="log log1">'.$name.'</a>&nbsp;&nbsp;<a href="logout.php?" class="log">
            <span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></span>';
}
?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</a></span></li>
        <li ><a href=""><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;User</a></li>
		<li ><a href=""><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=""><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add Quiz</a></li>
            <li><a href=""><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Remove Quiz</a></li>
			
          </ul>
        </li><li class="pull-right"> <a href=""><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		
      </ul>
          </div>
  </div>
</nav>

<div class="container">
<div class="row">
<div class="col-md-12">
<!--home start-->




<!--home closed-->
<!--users start-->

<!--user end-->

<!--feedback start-->

<!--feedback closed-->

<!--feedback reading portion start-->

<!--Feedback reading portion closed-->

<!--add quiz start-->

<!--add quiz end-->

<!--add quiz step2 start-->
<!--add quiz step 2 end-->

<!--remove quiz-->



</div><!--container closed-->
</div></div>
</body>
</html>
