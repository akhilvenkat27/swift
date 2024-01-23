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

    //delete question from queued user
    if (isset($_POST['Delete'])){
        $subject = $_POST['subject'];
        $Q_ID = $_POST['Q_ID'];
        $U_ID = $_POST['U_ID'];
        $query = "delete from $fn where U_ID='$U_ID' && Q_ID='$Q_ID' && subject='$subject' ";
        $res=mysqli_query($conn,$query);
        header("Location:generate.php");
    }
    
?>