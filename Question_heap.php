<?php
    session_start();
    if(isset($_POST['sub']))
    {
    $_SESSION['user_name'] = $_POST['user_name'];
    }
    if(!isset($_SESSION['user_name']))
    header( "location:index.php" );
    //finding FN number

    $user = $_SESSION['user_name'];
    $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");
    $query = "select * from profiles where faculty_name='$user'";
    $res=mysqli_query($conn,$query);
    $fn = 0;
    while($row=mysqli_fetch_assoc($res))
    {
        $fn =$row['faculty_no'];
    }

    //inserting data into queued user

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $subject = $_POST['subject'];
        $Q_ID = $_POST['Q_ID'];
        $U_ID = $_POST['U_ID'];
        $question =$_POST['question'];
        $marks =$_POST['marks'];
        $CO =$_POST['CO'];
        $BL =$_POST['BL'];
        $PI =$_POST['PI'];
        $tags =$_POST['tags'];

        $query = "select * from $fn where U_ID='$U_ID' && Q_ID='$Q_ID'";
        $res=mysqli_query($conn,$query);
        $cnt = 0;
        while($row=mysqli_fetch_assoc($res))
        {
            $cnt++;
            break;
        }
        if($cnt==0)
        {
        $c=0;
        if(isset($_POST['upper']))
            $c++;
        
        $query = "INSERT INTO $fn( FN, subject, U_ID, Q_ID, Question, Marks, CO, BL, PI, Tags, upper) 
        VALUES ('$fn','$subject','$U_ID','$Q_ID','$question','$marks','$CO','$BL','$PI','$tags','$c')";
        $res=mysqli_query($conn,$query);
        

    }
}
    header("Location:library.php");
?>