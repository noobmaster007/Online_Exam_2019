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
<span class="logo">Online Examination</span></div>
<?php
include_once('dbcon.php');
session_start();

$email = $_SESSION['email'];
if (!(isset($_SESSION['email']))) { //if there is no email is match in database then go back to index.php
  header('location:');  //index.php 
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
        <li <?php if(@$_GET['q']==0) echo 'class="active"'; ?>><a href="dash.php?q=0"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</a></span></li>
        <li <?php if(@$_GET['q']==1) echo 'class="active"'; ?>><a href="dash.php?q=1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;User</a></li>
		<li <?php if(@$_GET['q']==2) echo 'class="active"'; ?>><a href="dash.php?q=2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
        <li class="dropdown <?php if(@$_GET['q']==3 || @$_GET['q']==4) echo 'class="active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=3"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add Exam</a></li>
            <li><a href="dash.php?q=4"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Remove Exam</a></li>
			
          </ul>
        </li><li class="pull-right"> <a href=""><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		
      </ul>
          </div>
  </div>
</nav>

<div class="container">
<div class="row">
<div class="col-md-12">
<!--home start same as user part-->    

<?php 

if(@$_GET['q']==0) {

  $result = mysqli_query($connection, "SELECT * FROM exam ORDER BY date DESC")or die('Error');

  echo '<div class="panel">
          <div class="table-responsive">
            <table class="table table-striped title1">
            
            <tr>
              <td><b>Serial NO.</b></td>
              <td><b>Topic</b></td>
              <td><b>Total Question</b></td>
              <td><b>Marks</b></td>
              <td><b>Time Limit</b></td>
              <td></td>
            </tr>';

    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
      $title = $row['title'];
      $total = $row['total'];
      $right = $row['right'];
      $time = $row['time'];
      $eid = $row['eid'];

      $q12 = mysqli_query($connection,"SELECT score FROM history WHERE eid='$eid' and email='$email'")or die('Error98');

      $row=mysqli_num_rows($q12);

      if ($row==0) {
          echo '<tr>
                  <td>'.$c++.'</td>
                  <td>'.$title.'</td>
                  <td>'.$total.'</td>
                  <td>'.$right*$total.'</td>
                  <td>'.$time.'&nbsp;min</td>
                  <td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background=99cc32" aria-hidden="true"&nbsp;><span class="title1"><b>START</b></span></a></b></td></tr>';

      }
      else {
        echo '<tr style="color:#99cc32">
                <td>'.$c++.'</td>
                <td>'.$title.'&nbsp;<span title="This exam already solved by you" class="glyphicon glyphicon-ok" aria-hidden="true"></td>
                <td>'.$total.'</td>
                <td>'.$right*$total.'</td>
                <td>'.$time.'&nbsp;min</td>
                <td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red" aria-hidden="true">&nbsp;<span class="title1"><b>RESTART</b></span></a></b></td></tr>';

      }
    }
    $c=0;
    echo '</table>
        </div>
      </div>';
}

// ranking start    same as user part
if (@$_GET['q']==2) {

  $q = mysqli_query($connection, "SELECT * FROM rank ORDER BY score DESC")or die('Error221');

  echo '<div class="panel title">
          <div class="table-responsive">
            <table class="table table-striped title1">
            
            <tr style="color:black">
              <td><b>Rank</b></td>
              <td><b>Name</b></td>
              <td><b>Gender</b></td>
              <td><b>College</b></td>
              <td><b>Score</b></td>
            </tr>';

  $c=0;
  while ($row=mysqli_fetch_array($q)) {
    
    $email = $row['email'];
    $score = $row['score'];

    $q12 = mysqli_query($connection,"SELECT * FROM user WHERE email='$email'")or die('Error234');
    while ($row=mysqli_fetch_array($q12)) {

      $name = $row['name'];
      $gender = $row['gender'];
      $college = $row['college'];
    }
    $c++;

    echo '<tr>
          <td style="color:#99cc32"><b>'.$c.'</b></td>
          <td>'.$name.'</td>
          <td>'.$gender.'</td>
          <td>'.$college.'</td>
          <td>'.$score.'</td>
          </tr>';
  }
  echo '</table>
      </div>
    </div>';
}
?>
<!--home closed-->


<!--users start-->
<?php 
if (@$_GET['q']==1) {
  
  $result = mysqli_query($connection,"SELECT * FROM user")or die('Error');

  echo '<div class="panel">
          <div class="table-responsive">
              <table class="table table-striped title1">
              <tr>
                <td><b>Serial No.</b></td>
                <td><b>Name</b></td>
                <td><b>Gender</b></td>
                <td><b>College</b></td>
                <td><b>Email</b></td>
                <td><b>Mobile</b></td>
              </tr>';
      
    $c=1;
    while ($row=mysqli_fetch_array($result)) {
      
      $name = $row['name'];
      $mob = $row['mob'];
      $gender = $row['gender'];
      $email = $row['email']; //it shows and transferred into update page for deletion.
      $college = $row['college'];

      echo '<tr>
              <td>'.$c++.'</td>
              <td>'.$name.'</td>
              <td>'.$gender.'</td>
              <td>'.$college.'</td>
              <td>'.$email.'</td>
              <td>'.$mob.'</td>
              <td><a title="Delete user" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';

    }
    $c=0;
    echo '</table>
        </div>
        </div>';
}
?>
<!--user end-->


<!--add quiz start-->
<?php
if (@$_GET['q']==3 && !(@$_GET['step'])) {

  echo '<div class="row">
          <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br><br>
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form class="form-horizontal title1" name="form" action="update.php?q=addquiz" method="POST">
              <fieldset>
              
              <div class="form-group">
                <label class="col-md-12 control-label" for="name"></label>
                <div class="col-md-12">
                <input id="name" name="name" placeholder="Enter Exam title" class="form-control input-md" type="text">
                
                </div>
              </div>
              
              
              <div class="form-group">
              <label class="col-md-12 control-label" for="total"></label>
              <div class="col-md-12">
              <input id="total" name="total" placeholder="Enter Total Number of Questions" class="form-control input-md" type="number">
              
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-md-5" for="right">Marks on Right Answer</label>
              <div class="col-md-12">
              <input id="right" class="form-control input-md" min="0" type="number" value="2" readonly="readonly">
              
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-md-6" for="wrong">Marks on Wrong Answer W/o sign</label>
              <div class="col-md-12">
              <input id="wrong" name="wrong" value="1" readonly="readonly" class="form-control input-md" min="0" type="number">
              
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-md-12 control-label" for="time"></label>
                <div class="col-md-12">
                  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">

                </div>
            </div>
    
    <div class="form-group">
      <label class="col-md-12 control-label" for=""></label>
      <div class="col-md-12">
        <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
      </div>
    </div>
    
    
    </fieldset>
    </form>
    </div>';

}
?>
<!--add quiz end-->

<!--Enter Questions along with Options START-->
<?php
if (@$_GET['q']==3 && @$_GET['step']==2) {  //this gets the value from update page, when add exam is finish executing
  // also get the value of n and eid from update page
  echo '<div class="row">
        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br><br>
          <div class="col-md-3">
          </div>
            <div class="col-md-6">
              <form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4" method="POST">
              <fieldset>';
      
      for ($i=1; $i <=@$_GET['n'] ; $i++) { 
        echo '<b>Question Number&nbsp;'.$i.'&nbsp;</b><br>
        <div class="form-group">
          <label class="col-md-12 control-label" for="qns'.$i.'"></label>
          <div class="col-md-12">
          <textarea row="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-12 control-label" for="'.$i.'1"></label>
          <div class="col-md-12">
          <input id="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
          
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-12 control-label" for="'.$i.'2"></label>
            <div class="col-md-12">
            <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
            
            </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-12 control-label" for="'.$i.'3"></label>
              <div class="col-md-12">
              <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
              
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-12 control-label" for="'.$i.'4"></label>
              <div class="col-md-12">
              <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
              
              </div>
            </div>
            <br>
            <b>Correct Answer</b><br>
            <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer" class="form-control input-md">
                  <option value="a">Select answer for question '.$i.'</option>
                  <option value="a">option a</option>
                  <option value="b">option b</option>
                  <option value="c">option c</option>
                  <option value="d">option d</option>
              </select><br><br>';
      }

  echo '<div class="form-group">
        <label class="col-md-12 control-label" for=""></label>
        <div class="col-md-12">
          <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
        </div>
      </div>
      
      <fieldset>
      </form>
      </div>';
}
?>
<!--Enter Questions along with Options END-->

<!--remove quiz START-->
<?php
if (@$_GET['q']==4) {   //check the url whether matches or not

  $result = mysqli_query($connection,"SELECT * FROM exam ORDER BY DATE DESC")or die('Error');
  //fetch the exams order by date, means most recent exam placed on top
  echo '<div class="panel">
          <div class="table-responsive">
            <table class="table table-striped title1">
            
            <tr>
            <td><b>Serial No.</b></td>
            <td><b>Topic</b></td>
            <td><b>Total Question</b></td>
            <td><b>Marks</b></td>
            <td><b></b></td>
            </tr>';   //table format

    $c=1; //serial no.
    while ($row=mysqli_fetch_array($result)) {
      $title = row['title'];
      $total = row['total'];
      $right = row['right'];  //marks of each question
      $eid = row['eid'];

      echo '<tr>
            <td>'.$c++.'</td>
            <td>'.$title.'</td>
            <td>'.$total.'</td>
            <td>'.$right*$total.'</td>
            <td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></b></td>
            </tr>';   //put the value into the table...
    }
    $c=0;
    echo '</table>
    </div>
    </div>';
}
?>
<!--remove quiz END-->

</div><!--container closed-->
</div></div>
</body>
</html>
