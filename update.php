<?php
include('dbcon.php');
session_start();

//start quiz
//this update page is hidden from a user.
if (@$_GET['q']='quiz' && @$_GET['step']==2) {
    //get the values from the url
    $eid=@$_GET['eid']; //user id
    $sn=@$_GET['n'];    //question number
    $total=@$_GET['t']; //total question
    $ans=@$_GET['ans']; //this is user input
    $qid=@$_GET['qid']; //question
    
    $q=mysqli_query($connection,"SELECT * FROM answer WHERE qid='$qid'");
    //fetch the answer each questions from qid

    while ($row=mysqli_fetch_array($q)) {
        $ansid=$row['ansid'];   //fetch the correct ans from answer table
    }

    if ($ans == $ansid) {       //if the answer is matched
        $q=mysqli_query($connection,"SELECT * FROM quiz WHERE eid='$eid'");

        while ($row=mysqli_fetch_array($q)) {
            $right=$row['right'];   //denotes marks of each question,provided by the admin
        }
        if ($sn==1) {
            $q=mysqli_query($connection,"INSERT INTO history VALUES('$email','$eid','0','0','0','0',NOW())")or die('Error');
        }
        $q=mysqli_query($connection,"SELECT * FROM history WHERE eid='$eid' and email='$email'")or die('Error112');

        while ($row=mysqli_fetch_array($q)) {
            
            $s=$row['score'];
            $r=$row['right'];   //how many ans's are correct
        }
        $r++;   //ans matched, incremented
        $s=$s+$right;   //marks of each ques + previous score

        $q=mysqli_query($connection,"UPDATE `history` SET `score`=$s, `level`=$sn, `right`=$r, date=NOW() WHERE email='$email' AND eid='$eid'")or die('Error123');

    }
    else {     //if the ans doesnt matched
        $q=mysqli_query($connection,"SELECT * FROM quiz WHERE eid='$eid'")or die('Error999');
            //
            while ($row=mysqli_fetch_array($q)) {
                $wrong=$row['wrong'];   //marks of negative answer, provided by the admin
            }

            if ($sn==1) {       //how many question from starting
                $q=mysqli_query($connection,"INSERT INTO history VALUES('$email','$eid','0','0','0','0',NOW())")or die('Error443');
            }

            $q=mysqli_query($connection,"SELECT * FROM history WHERE eid='$eid' AND email='$email'")or die('Error445');
            //if the ans is wrong, then fetch the wrong and score data.... for deduct
            while ($row=mysqli_fetch_array($q)) {
                
                $s=$row['score'];
                $w=$row['wrong'];   //how many wrong ans is attempted
            }
            $w++; //wrong ans incremented,
            $s=$s-$wrong;   //previous score - marks of each wrong question
    }
}


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
