<!DOCTYPE html>
<head>


<title>Home</title>
<!-- Downloaded minified css files of bootstrap[offline] -->
<link  rel="stylesheet" href="css/bootstrap.min.css"/> 
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
     <!-- Downloaded minified css files of bootstrap[offline] -->
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <!-- Download JS of Bootstrap[offline] -->
  <script src="js/jquery.js" type="text/javascript"></script>
  <!-- Download JS of Bootstrap[offline] -->
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("college must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
</script>


</head>

<body>
<div class="header">
   <div class="row">
   <div class="col-lg-6">
<span class="logo">Online Examination</span></div>
<div class="col-md-2 col-md-offset-4">
<a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Signin</b></span></a></div>
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title"><span style="color:blue;font-family:'typo' "> User Log In</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email" required>
    
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password" required>

  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div>
  </div>
</div>

</div><!--header row closed-->
</div>

<div class="bg1">
<div class="row">

<div class="col-md-3"></div>
<div class="col-md-5 panel">
<!-- sign in form begins -->  
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md" >
   <option value="Male">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Enter your college name" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="number">
    
  </div>
</div>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
    <label class="col-md-12control-label" for="cpassword"></label>
        <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control input-md" type="password">
    
  </div>
</div>
<?php
if (@$_GET['w']) {
      echo '<p style="color:red;font-size:15px;">'.@$_GET['w'];
}
?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <b><input  type="submit" class="sub" value="REGISTER HERE" class="btn btn-primary"/></b>
  </div>
</div>

</fieldset>
</form>
</div><!--End of col-md-6-->
</div></div>
</div>

<!--FOOTER-->
<div class="row footer">
<div class="col-md-3 box">
<a href="https://github.com/noobmaster007/Online_Exam_2019" target="_blank"><b>Github Page</b></a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login"><b>Admin Login</b></a></div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers"><b>Developers</b></a>
</div>
<div class="col-md-3 box">

<!--DEVELOPER MODAL STARTS FROM HERE-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:blue">Developers</span></h4>
      </div>
	  
      <div class="modal-body"> <!--div start-->
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="images/Pratip.jpg" width=100 height=100 alt="Pratip Sarkar" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.facebook.com/YuoCanCallMeZedi" target="_blank" style="color:#202020; font-family: 'Lato', sans-serif; font-size:18px" title="Find on Facebook">Pratip Sarkar</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 9614333732</h4>
		<h4 style="font-family:'typo' ">gablusarkar91@gmail.com</h4>
		<h4 style="font-family:'typo' ">Siliguri Institute of Technology, Siliguri</h4></div></div>
		</p>
      </div> <!--div end-->

      <div class="modal-body"> <!--div start-->
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="images/Sudipta.jpg" width=100 height=100 alt="Sudipta Gupta" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.linkedin.com/in/sudipta-gupta-03482a17a" target="_blank" style="color:#202020; font-family: 'Lato', sans-serif; font-size:18px" title="Find on LinkedIn">Sudipta Gupta</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 8145385398</h4>
		<h4 style="font-family:'typo' ">sudiptagupta14@gmail.com</h4>
		<h4 style="font-family:'typo' ">Siliguri Institute of Technology, Siliguri</h4></div></div>
		</p>
      </div> <!--div end-->
    
    <div class="modal-body"> <!--div start-->
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="images/Pranay.jpg" width=100 height=100 alt="Pranay Karmakar" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.linkedin.com/in/pranay-karmakar-6b1a82155" target="_blank" style="color:#202020; font-family: 'Lato', sans-serif; font-size:18px" title="Find on LinkedIn">Pranay Karmakar</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 7602458272</h4>
		<h4 style="font-family:'typo' ">pranaykarmakar9@gmail.com</h4>
		<h4 style="font-family:'typo' ">Siliguri Institute of Technology(SIT), Naxalbari</h4></div></div>
		</p>
    </div> <!--div end-->

    <div class="modal-body">  <!--div start--> 
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="images/Bishal.jpeg" width=100 height=100 alt="Bishal Chanda" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.linkedin.com/in/bishal-chanda-ba2896194" target="_blank" style="color:#202020; font-family: 'Lato', sans-serif; font-size:18px" title="Find on LinkedIn">Bishal Chanda</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 8637868184</h4>
		<h4 style="font-family:'typo' ">bishalchanda2110@gmail.com</h4>
		<h4 style="font-family:'typo' ">Siliguri Institute of Technology, Siliguri</h4></div></div>
		</p>
      </div> <!--div end-->

    <div class="modal-body"> <!--div start-->
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="images/Sakila.jpg" width=100 height=100 alt="Sakila Sultana" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="#" style="color:#202020; font-family: 'Lato', sans-serif; font-size:18px" title="Find on Facebook">Sakila Sultana</a>
		    <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 7583980837</h4>
		<h4 style="font-family:'typo' ">email id</h4>
		 <h4 style="font-family:'typo' ">Siliguri Institute of Technology, Siliguri</h4></div></div>
		</p>
      </div> <!--div end-->
    
    </div>
  </div>
</div>

<!--ADMIN PORTAL MODAL STARTS FROM HERE-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:blue;font-family:'typo' ">Admin Log In</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="">
<div class="form-group">
<input type="email" name="uname" maxlength="50"  placeholder="Admin user id" class="form-control" required/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" id="myInput" placeholder="Password" class="form-control" required/>
<input type="checkbox" onclick="myFunction()">Show Password
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      
        
      </div>
    </div>
  </div>
</div>



</body>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>
