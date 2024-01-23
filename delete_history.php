<?php
    session_start();
    if(isset($_POST['sub']))
    {
    $_SESSION['user_name'] = $_POST['user_name'];
    }
    if(!isset($_SESSION['user_name']))
header( "location:index.php" );
    //delete paper from history

    if (isset($_POST['Delete_History'])){
        $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"history");
        $table_name_queue = $_POST['queue_details'];
        $table_name_queue_details = $_POST['queue_paper_details'];
        echo  $table_name_queue_details  ;
        $query = "drop table $table_name_queue";
        $res=mysqli_query($conn,$query);
        $query = "drop table $table_name_queue_details";
        $res=mysqli_query($conn,$query);       
        header("Location:swift-home.php");
    }
    
?>