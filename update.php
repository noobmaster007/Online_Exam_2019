<?php
include('dbcon.php');
session_start();

//restart quiz
if (@$_GET['q']=='quizre' && @$_GET['step']==25) {
    
    $eid = @$_GET['eid'];   //retrieve the data in the url
    $n = @$_GET['n'];
    $t = @$_GET['t'];
    //fetch the score of a particular user from history table
    $q = mysqli_query($connection,"SELECT score from history where eid='$eid' and email='$email'")or die('Error132');

    while ($row=mysqli_fetch_array($q)) {

        $score=$row['score'];
    }

    $q=mysqli_query($connection,"DELETE FROM `history` WHERE eid='$eid' and email='$email'")or die('Error154'); //it will display the last score you attempt.
    //it will delete the previous data.

    header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
    
}
?>
