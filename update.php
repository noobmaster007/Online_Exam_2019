<?php
include('dbcon.php');
session_start();
$email = $_SESSION['email'];

//start exam
//this update page is hidden from a user.
if (@$_GET['q']=='quiz' && @$_GET['step']==2) {
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
        $q=mysqli_query($connection,"SELECT * FROM exam WHERE eid='$eid'");

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

        $q=mysqli_query($connection,"UPDATE `history` SET `score`=$s, `quescount`=$sn, `right`=$r, date= NOW() WHERE email='$email' AND eid='$eid'")or die('Error123');

    }
    else {     //if the ans doesnt matched
        $q=mysqli_query($connection,"SELECT * FROM exam WHERE eid='$eid'")or die('Error999');
            //
            while ($row=mysqli_fetch_array($q)) {
                $wrong=$row['wrong'];   //marks of negative answer, provided by the admin
            }

            if ($sn==1) {       //how many question from starting
                $q=mysqli_query($connection,"INSERT INTO history VALUES('$email','$eid','0','0','0','0',NOW() )")or die('Error443');
            }

            $q=mysqli_query($connection,"SELECT * FROM history WHERE eid='$eid' AND email='$email'")or die('Error445');
            //if the ans is wrong, then fetch the wrong and score data.... for deduct
            while ($row=mysqli_fetch_array($q)) {
                
                $s=$row['score'];
                $w=$row['wrong'];   //how many wrong ans is attempted
            }
            $w++; //wrong ans incremented,
            $s=$s-$wrong;   //previous score - marks of each wrong question
            $q=mysqli_query($connection,"UPDATE `history` SET `score`=$s,`quescount`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');

    }
    if ($sn != $total) {
        $sn++;
        header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
    }
    else if ($_SESSION['key']!='gablu') {
        $q = mysqli_query($connection,"SELECT score FROM history WHERE eid='$eid' AND email='$email'")or die('Error156');
        while ($row=mysqli_fetch_array($q)) {
            $s = $row['score'];
        }
        $q = mysqli_query($connection,"SELECT * FROM rank WHERE email='$email'")or die('Error161');
        $rowcount=mysqli_num_rows($q);
        if ($rowcount==0) {
            $q2 = mysqli_query($connection,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');

        }
        else {
            while ($row=mysqli_fetch_array($q)) {
                $sun = $row['score'];
            }
            $sun=$s+$sun;
            $q=mysqli_query($connection,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');

        }
        header("location:account.php?q=result&eid=$eid");
    }
    else {
        header("location:account.php?q=result&eid=$eid");
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

// remove exam
if (@$_GET['q']=='rmquiz') { //get the value from url and matches
        
        $eid = @$_GET['eid']; //put it into variable, this eid from exam table, who create this exam
        //actually this eid gets generated when admin created those exam, questions. and this eid
        //saved into exam table.
        $result = mysqli_query($connection,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
        //according to eid, questions table has also unique qid, at that time when admin created those exam.
        while ($row=mysqli_fetch_array($result)) {  //fetch only qid
            $qid = $row['qid'];

            $result1 = mysqli_query($connection,"DELETE FROM options where qid='$qid' ") or die('Error');   //deletes the options along with the questions
            $result2 = mysqli_query($connection,"DELETE FROM answer where qid='$qid' ") or die('Error');  //also deletes the answers 
        }

        $result3 = mysqli_query($connection,"DELETE FROM questions where eid='$eid' ") or die('Error');   //deletes those questions who created this acc. to eid
        $result4 = mysqli_query($connection,"DELETE FROM exam where eid='$eid' ") or die('Error');    //also deletes the data acc to eid, who created that topic
        $result5 = mysqli_query($connection,"DELETE FROM history where eid='$eid' ") or die('Error'); //deletes from history table of that exam.

        header("location:dash.php?q=4"); //after executing all, the page redirect to remove section.
}

// ADD EXAM
if (@$_GET['q']== 'addquiz') {
    
    $name = $_POST['name']; //name or title of the exam
    $name = ucwords(strtolower($name)); //make a string lower case, then Uppercase the first char

    $total = $_POST['total']; //total no. of question
    $right = $_POST['right']; //marks of each question
    $wrong = $_POST['wrong']; //deduct 1 each question
    // there is no negative marking. if you left blank intentionally
    //then it will consider as a wrong ans.
    $time = $_POST['time'];
    $id = uniqid(); //this will generate a random unique id, with respect to time of ur machine.
    // this will considered as a eid.

    $q2 = mysqli_query($connection,"INSERT INTO exam VALUES ('$id','$name','$right','$wrong','$total','$time', NOW())");

    header("location:dash.php?q=3&step=2&eid=$id&n=$total");    //redirect to next page
}

// ADD QUESTIONS
if (@$_GET['q']=='addqns') {    //get the value from dash.php, when youre about to create some questions.
    
    $n = @$_GET['n'];   // total no. of question
    $eid = @$_GET['eid'];   // get the eid from the dash page
    $ch = @$_GET['ch']; //choices

    for ($i=1; $i < $n; $i++) { 
        
        $qid = uniqid();    //question id
        $qns = $_POST['qns'.$i];    //this is the questions along with the SN

        $q3 = mysqli_query($connection,"INSERT INTO questions VALUES ('$eid','$qid','$qns','$ch','$i')");
        $oaid=uniqid(); // opt a
        $obid=uniqid(); // opt b
        $ocid=uniqid(); // opt c
        $odid=uniqid(); // opt d
        
        //this is the options available for each question.
        $a = $_POST[$i.'1'];
        $b = $_POST[$i.'2'];
        $c = $_POST[$i.'3'];
        $d = $_POST[$i.'4'];
        // insert the options into the databse according to each questions.
        $qa = mysqli_query($connection,"INSERT INTO options VALUES ('$qid','$a','$oaid')")or die('Error11');
        $qb = mysqli_query($connection,"INSERT INTO options VALUES ('$qid','$b','$obid')")or die('Error12');
        $qc = mysqli_query($connection,"INSERT INTO options VALUES ('$qid','$c','$ocid')")or die('Error13');
        $qd = mysqli_query($connection,"INSERT INTO options VALUES ('$qid','$d','$odid')")or die('Error14');

        $e = $_POST['ans'.$i];  //correct ans for question no. 
        switch ($e) {
            case 'a':
                $ansid=$oaid;
                break;
            case 'b':
                $ansid=$obid;
                break;
            case 'c':
                $ansid=$ocid;
                break;
            case 'd':
                $ansid=$odid;
                break;
            default:
            $ansid=$oaid;
                break;
        }
        $quesans = mysqli_query($connection,"INSERT INTO answer VALUES ('$qid','$ansid')");
    }
    header("location:dash.php?q=0");    //this will redirect to home.
}


// DELETE USER
if (@$_GET['demail']) { //gets the email from url
    $demail = @$_GET['demail']; //user's email id
    //actually this email gets from the user table, in dash page. when admin is going to delete an user
    // it will fetch the email in demail, then deletes the user from several table. not just from user table
    // 
    $r1 = mysqli_query($connection,"DELETE FROM rank WHERE email='$demail'")or die('Error');
    $r2 = mysqli_query($connection,"DELETE FROM history WHERE email='$demail'")or die('Error');
    $r3 = mysqli_query($connection,"DELETE FROM user WHERE email='$demail'")or die('Error');

    header("location:dash.php?q=1");
}
?>
