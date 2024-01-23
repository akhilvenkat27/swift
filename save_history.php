<?php
session_start();
if(isset($_POST['sub']))
{
  $_SESSION['user_name'] = $_POST['user_name'];
}
if(!isset($_SESSION['user_name']))
header( "location:index.php" );
$user = $_SESSION['user_name'];
$conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");
$query = "select * from profiles where faculty_name='$user'";
$res=mysqli_query($conn,$query);
$fn = 0;
while($row=mysqli_fetch_assoc($res))
{
    $fn =$row['faculty_no'];
}
$tableName="";
for($i=1;$i<10000;$i++)
{
    $cnt = 0;
    $tableName = $fn."_".$i."_Q";
    $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"history");
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");

    if ($result->num_rows <= 0) {
        break;
    } 
    
}
$conn2 = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"history");

//inserting Queue details

$query = "CREATE TABLE $tableName (
    Session TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FN VARCHAR(255),
    Academic_Year VARCHAR(255),
    Year VARCHAR(2555),
    Semester VARCHAR(255),
    Code VARCHAR(255),
    Course VARCHAR(255),
    Date VARCHAR(255),
    Time VARCHAR(255),
    Exam VARCHAR(255),
    Max_Marks VARCHAR(255)
)";
$res = mysqli_query($conn2, $query);
$query = "INSERT into history.$tableName select * from swift.queue where FN='$fn'";
$res = mysqli_query($conn2, $query);



//inserting Question Details


$tableName = $tableName."_D"; 
$query = "CREATE TABLE $tableName (
    session TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FN VARCHAR(255),
    subject VARCHAR(255),
    U_ID VARCHAR(255),
    Q_ID VARCHAR(255),
    Question VARCHAR(2555),
    Marks VARCHAR(255),
    CO VARCHAR(255),
    BL VARCHAR(255),
    PI VARCHAR(255),
    Tags VARCHAR(255),
    upper INT DEFAULT 0
)";

$res = mysqli_query($conn2, $query);
$query = "INSERT into history.$tableName select * from swift.$fn";
$res = mysqli_query($conn2, $query);




header("Location:saved_success.php");
?>