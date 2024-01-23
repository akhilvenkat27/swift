<?php 
session_start();
if(isset($_POST['sub']))
{
  $_SESSION['user_name'] = $_POST['user_name'];
}
if(!isset($_SESSION['user_name']))
header( "location:index.php" );
unset($_POST['edit']);
?>
<!doctype html>
<html>
    
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <style>
            *
            {
                font-family: Google Sans Display,Arial,Helvetica,sans-serif;
                /* font-size:10px; */
            }
            a
            {
                color:black;
            }
            .header{
                background-color: whitesmoke;
            }
            .color
            {
                color: black;
            }
            @media (max-width: 992px) {
            .d-lg-flex {
                display: none !important;
            }
            .d-lg-none {
                order: 3;
            }
            .text-end {
                order: 2;
            }
            /* .hamburger-icon {
                color: white;
            } */

        }
        @media (min-width: 993px) {
            .d-lg-none {
                display: none !important;
            }
        }
        .circle-btn {
      width: 10px;
      height: 20px;
      border-radius: 50%;
      margin-left: 40%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
    }
            
        </style>
          <style media="print">
    body {
      font-size: 12px;
    }

    /* Add any additional styling for printing here */

    /* Optional: Hide elements not meant for printing */
    .no-print {
      display: none;
    }

  </style>
    </head>
    <body>


        <!------------------ Top Navigation Bar Starts-------------------------------------->

        <!-- Off-canvas menu -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Swift</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="swift-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="library.php">Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="generate.php">Generate Paper</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Random Question Paper</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Top Navigation Bar -->
        <div class="d-flex flex-row header sticky-top justify-content-between align-items-center">
                <div class="p-2">
                    <img src="assets/anits-logo.png" height="70px" width="120px">
                </div>

                <!-- Navigation Links - Shown for Larger Screens -->
                <div class="d-none d-lg-flex flex-grow-1 justify-content-center">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="swift-home.php"><span class="color">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="library.php"><span class="color">Library</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color active" href="generate.php"><span class="color">Generate Paper</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="color">Random Question Paper</span></a>
                        </li>
                    </ul>
                </div>

        <!-- Hamburger Icon for Small Screens -->
        <div class="p-2 d-lg-none" style="color:white;">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample" >
                <i class="bi bi-list" style="font-size: 1rem;"></i>
            </button>
        </div>

                <!-- User Info and Logout - Shown on the Right -->
                <div class="p-2 text-end">
                <?php
                                  $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");
                                  $user = $_SESSION['user_name'];
                                  $query = "select * from profiles where faculty_name='$user'";
                                  $res=mysqli_query($conn,$query);
                                  $fn = 0;
                                  while($row=mysqli_fetch_assoc($res))
                                  {
                                      $fn =$row['faculty_no'];
                                  }
                      ?>     
                    <button type="button" class="btn btn-light circle-btn" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-html="true" title="Profile" data-bs-content="
                    <?php 
                    echo "<strong>Faculty Name:</strong> ".$_SESSION['user_name']."<br>"; 
                    echo "<strong>Faculty No: </strong>".$fn."<br>";
                    echo "Designed By: ";
                    echo "<a href='https://createwithpi.netlify.app/' style='text-decoration: none; color:black '><span style='font-size:36px'><strong>Pi</strong><span style='color:#CE1212'>.</span ></span></a>";
                    ?>">
                   <i class="bi bi-person-circle"></i></button> 
                   <strong> Author:</strong>
                        <?php
                        if (isset($_SESSION['user_name'])) {
                            echo $_SESSION['user_name'];
                        } else {
                            echo "<span style='color:red'>Login Failed</span>";
                        }
                        ?>
                        <a href="logout.php">
                            <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Logout">
                                <i class="bi bi-box-arrow-right" style="font-size:15px"></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>
            <!-- End of Top Navigation Bar -->



        <!-------------------Top Navigation Bar Ends------------------------------------->


        <!---checking for queue request-->
        <?php
        $user = $_SESSION['user_name'];
        $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");
        $query = "select * from profiles where faculty_name='$user'";
        $res=mysqli_query($conn,$query);
        $fn = 0;
        while($row=mysqli_fetch_assoc($res))
        {
            $fn = $row['faculty_no'];
        }
        $query = "select * from queue where FN='$fn'";
        $res=mysqli_query($conn,$query);
        $c=0;
        while($row=mysqli_fetch_assoc($res))
        {
            $c++;
        }        
        
        if($c==0)
        {
        echo'
         <!-----------------Paper Generation Form ---------------------------------------->
        <div class="d-flex flex-row mb-3 justify-content-between text-center flex-wrap" style="margin-top:5%">
        <div class="p-2">
            <div class="card border-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Guidelines</div>
            <div class="card-body">
                <h5 class="card-title">Warning card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
            </div>
            </div>
        </div>
        <div class="p-2">

        <div class="card " style="width: 35rem;">
        <div class="card-header">
            <strong> New Paper Generation Request </strong>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">

            <form action="queue_check.php" method="POST">
            <div class="col-12">
                <div class="input-group">
                <div class="input-group-text">FN - </div>
                <input type="text" class="form-control" name ="FN" placeholder="Faculty Number" required>
                </div>
            </div>
            <br>

            <div class="d-flex justify-content-between">
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control"  list ="AY" placeholder="Academic Year" name="academic_year" required>
                <datalist id="AY">
                <option value="2023-24">
                <option value="2024-25">
                <option value="2025-26">
                <option value="2027-28">
                <option value="2028-29">
                </datalist>
                </div>
            </div>
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control"  list="year" placeholder="Year" name="year" required>
                <datalist id="year">
                <option value="1/1 CSE">
                <option value="2/2 CSE">
                <option value="3/3 CSE">
                <option value="4/4 CSE">
                </datalist>
                </div>
            </div>
            <div class="p-2">
                <div class="mb-3">
                <input type="email" class="form-control " aria-label="Disabled input example" disabled id="exampleFormControlInput1" placeholder="Program : B.Tech">
                </div>
            </div>
            </div>
            <div class="d-flex justify-content-between">
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control" list="semester" placeholder="Semester" name="semester" required>
                <datalist id="semester">
                <option value="I">
                <option value="II">
                </datalist>
                </div>
            </div>
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control" list="code" placeholder="Code" name="code" required>
                <datalist id="code">
                <option value="CSE111">
                <option value="CSE112">
                <option value="CSE211">
                <option value="CSE212">
                <option value="CSE311">
                <option value="CSE312">
                <option value="CSE411">
                <option value="CSE412">
                </datalist>
                </div>
            </div>
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control " list="course"  name="course" placeholder="Course" required>
                <datalist id="course">
                <option value="Data Analytics">
                <option value="Machine Learning">
                <option value="Web Technologies">
                <option value="Computer Vision">
                <option value="Neural Networks & Deep Learning">
                </datalist>
                </div>
            </div>
            </div>
            <div class="d-flex justify-content-between">
            <div class="p-2">
                <div class="mb-3">
                <input type="date" class="form-control"  placeholder="Date" name="date" required>
                </div>
            </div>
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control" list="time" placeholder="Time" name="time" required>
                <datalist id="time">
                <option value="09:30AM - 11:30AM">
                <option value="09:00AM - 11:00AM">
                <option value="10:00AM - 1:00PM">
                <option value="1:30PM - 3:30PM">
                <option value="1:00PM - 3:00PM ">
                </datalist>
                </div>
            </div>
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control " list="exam"  name="exam" placeholder="Exam" required>
                <datalist id="exam">
                <option value="MID-I">
                <option value="MID-II">
                <option value="Semester">
                </datalist>
                </div>
            </div>
            </div>

            <div class="d-flex justify-content-between">
            <div class="p-2">
                <div class="mb-3">
                <input type="text" class="form-control" list="marks" placeholder="Max Marks" name="max_marks" required>
                <datalist id="marks">
                <option value="40">
                <option value="60">
                </datalist>
                </div>
            </div>

            <div class="p-2">
            <div class="col-12">
                <input class="btn btn-primary" value="Create Paper" type="submit" name="queue_submit"></input>
            </div>
            </div>
            </div>
            </form>
    </div>
            </li>
        </ul>

        </div>
        <div class="p-2">
            <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Instructions</div>
            <div class="card-body text-success">
                <h5 class="card-title">Success card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
            </div>
            </div>
        </div>
        </div>

         <!-----------------Paper Generation Form Ends ---------------------------------------->';

    }
    else
    {
        $user = $_SESSION['user_name'];
        $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");
        $query = "select * from profiles where faculty_name='$user'";
        $res=mysqli_query($conn,$query);
        $fn = 0;
        while($row=mysqli_fetch_assoc($res))
        {
            $fn =$row['faculty_no'];
        }
        echo '
        
        <br>
        <div class="d-flex justify-content-between">
        <div class="p-2"></div>
        <div class="p-2">
        
        <div class="card " style="max-width: 60rem;">
        <div class="card-header text-center">
          Paper Schema
        </div>
        <div class="card-body">';
                $single_que=0;
                $cnt=1;
                for($i=1;$i<6;$i++)
                {
                // <!--upper--> 
                $query = "select  * from $fn where U_ID='$i' && upper='1'  ";
                
                $res = $res=mysqli_query($conn,$query);
                $unit_cnt=0;
                while($row=mysqli_fetch_assoc($res))
                {
                    $single_que++;
                    $Q_ID = $row['Q_ID'];
                    $subject = $row['subject'];
                    $Question = $row['Question'];
                    $U_ID = $i;
                    $CO = $row['CO'];
                    $BL = $row['BL'];
                    $PI = $row['PI'];
                    $Marks = $row['Marks'];
                    
                    if($unit_cnt==0)
                    {
                        echo '<div class="d-flex p-2 justify-content-center border"><strong>UNIT - ';echo $i; echo'</strong></div>';
                        $unit_cnt++;
                    }
                    echo '
                    <div class="d-flex p-2 border">
                        ';
                            
                        echo  $cnt.". ".$row['Question']."<br>"."<hr>";
                        echo '<br><div class="d-flex justify-content-between">
                        <div class="p-2">';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['Marks']." Marks ".'</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['CO']." ".'</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['BL']." ". '</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['PI']." ".'</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['Tags']." ".'</span>'.'&nbsp;';

                        $conn_ai_check = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"library");
                        $subject_ai_check = $row['subject'];
                        $Q_ID_ai_check = $row["Q_ID"];
                        $ai_ai_check = 0;
                        $query_ai_check = "select  * from $subject_ai_check where Q_ID='$Q_ID_ai_check'  ";
                        $res_ai_check = mysqli_query($conn_ai_check,$query_ai_check);
                        while($row=mysqli_fetch_assoc($res_ai_check))
                        {
                            if($row['AI']==1)
                            $ai_ai_check++;
                        }
                        if($ai_ai_check>0)
                        {
                                echo '<span class="badge rounded-pill text-bg-primary">AI Powered</span>';
                        }

                    echo '
                        </div>
                        <div class="p-2">

                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#'; echo "edit".$cnt; echo'">
                        ✎
                        </button>



                        <!-- Modal -->
                        <div class="modal fade" id="';echo "edit".$cnt; echo'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Question</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="edit_question.php" method="POST">
                            <input type="hidden" name="subject" value='; echo $subject; echo'>
                            <input type="hidden" name="U_ID" value='; echo $U_ID; echo'>
                            <input type="hidden" name="Q_ID" value='; echo $Q_ID; echo'>

                            <label for="question" class="form-label">Question</label>
                            <input class="form-control" list="'; echo "edit".$cnt."Q"; echo'"  name="Question" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."Q"; echo'">
                            <option value="'; echo $Question; echo'">
                            </datalist>
        
                            <div class="d-flex flex-row mb-3 justify-content-between">
                            <div class="p-2">
                            <label for="Marks" class="form-label">Marks</label>
                            <input class="form-control" list="'; echo "edit".$cnt."M"; echo'"  name="Marks" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."M"; echo'">
                            <option value="'; echo $Marks; echo'">
        
                            </datalist>
                            </div>
                            <div class="p-2">
                            <label for="CO" class="form-label">CO</label>
                            <input class="form-control" list="'; echo "edit".$cnt."CO"; echo'"  name="CO" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."CO"; echo'">
                            <option value="'; echo $CO; echo'">
        
                            </datalist>
                            </div>
                            <div class="p-2">
                            <label for="BL" class="form-label">BL</label>
                            <input class="form-control" list="'; echo "edit".$cnt."BL"; echo'"  name="BL" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."BL"; echo'">
                            <option value="'; echo $BL; echo'">
        
                            </datalist>
                            </div>
                            <div class="p-2">
                            <label for="PI" class="form-label">PI</label>
                            <input class="form-control" list="'; echo "edit".$cnt."PI"; echo'" name="PI" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."PI"; echo'">
                            <option value="'; echo $PI; echo'">
        
                            </datalist>
                            </div>
                            </div>

                            

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="edit_submit" value="Save Changes">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>


                        
                        </div>
                        <div class="p-2">

                        <form action="delete_question.php" method="POST">
                        <input type="hidden" name="subject" value="';echo $subject; echo'">
                        <input type="hidden" name="U_ID" value="'; echo $i; echo '">
                        <input type="hidden" name="Q_ID" value="'; echo $Q_ID; echo'">
                        <input type="submit" name="Delete" value="-" class="btn btn-dark">
                        </form>

                        </div>
                        </div>
                    </div>';
                    $cnt++;
                }

                $query = "select DISTINCT * from $fn where U_ID='$i' && upper='0'";
                $res = $res=mysqli_query($conn,$query);
                if($res)
                {

                $or_cnt=0;
                // <!--lower-->
                while($row=mysqli_fetch_assoc($res))
                {
                    $Q_ID = $row['Q_ID'];
                    $subject = $row['subject'];
                    $Question = $row['Question'];
                    $U_ID = $i;
                    $CO = $row['CO'];
                    $BL = $row['BL'];
                    $PI = $row['PI'];
                    $Marks = $row['Marks'];
                    $single_que++;
                    if($or_cnt==0&&$unit_cnt>0)
                    {
                        echo '<div class="d-flex p-2 justify-content-center border">OR</div>';
                        $or_cnt++;
                    }
                    if($unit_cnt==0)
                    {
                        echo '<div class="d-flex p-2 justify-content-center border">UNIT - ';echo $i; echo'</div>';
                        $unit_cnt++;
                    }
                    $Q_ID = $row['Q_ID'];
                    $subject = $row['subject'];
                    echo '
                    <div class="d-flex p-2 border">
                        ';
                            
                        echo  $cnt.". ".$row['Question']."<br>"."<hr>";
                        echo '<br><div class="d-flex justify-content-center">
                        <div class="p-2 justify-content-center">';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['Marks']." Marks ".'</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['CO']." ".'</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['BL']." ". '</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['PI']." ".'</span>'.'&nbsp;';
                        echo '<span class="badge rounded-pill text-bg-light fw-light">'.$row['Tags']." ".'</span>'.'&nbsp;';
                        $conn_ai_check = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"library");
                        $subject_ai_check = $row['subject'];
                        $Q_ID_ai_check = $row["Q_ID"];
                        $ai_ai_check = 0;
                        $query_ai_check = "select  * from $subject_ai_check where Q_ID='$Q_ID_ai_check'  ";
                        $res_ai_check = mysqli_query($conn_ai_check,$query_ai_check);
                        while($row=mysqli_fetch_assoc($res_ai_check))
                        {
                            if($row['AI']==1)
                            $ai_ai_check++;
                        }
                        if($ai_ai_check>0)
                        {
                                echo '<span class="badge rounded-pill text-bg-primary">AI Powered</span>';
                        }

                    echo '
                        </div>
                        <div class="p-2">
                        
                         <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#'; echo "edit".$cnt; echo'">
                        ✎
                        </button>



                        <!-- Modal -->
                        <div class="modal fade" id="';echo "edit".$cnt; echo'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Question</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="edit_question.php" method="POST">
                            <input type="hidden" name="subject" value='; echo $subject; echo'>
                            <input type="hidden" name="U_ID" value='; echo $U_ID; echo'>
                            <input type="hidden" name="Q_ID" value='; echo $Q_ID; echo'>

                            <label for="question" class="form-label">Question</label>
                            <input class="form-control" list="'; echo "edit".$cnt."Q"; echo'"  name="Question" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."Q"; echo'">
                            <option value="'; echo $Question; echo'">
                            </datalist>
        
                            <div class="d-flex flex-row mb-3 justify-content-between">
                            <div class="p-2">
                            <label for="Marks" class="form-label">Marks</label>
                            <input class="form-control" list="'; echo "edit".$cnt."M"; echo'"  name="Marks" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."M"; echo'">
                            <option value="'; echo $Marks; echo'">
        
                            </datalist>
                            </div>
                            <div class="p-2">
                            <label for="CO" class="form-label">CO</label>
                            <input class="form-control" list="'; echo "edit".$cnt."CO"; echo'"  name="CO" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."CO"; echo'">
                            <option value="'; echo $CO; echo'">
        
                            </datalist>
                            </div>
                            <div class="p-2">
                            <label for="BL" class="form-label">BL</label>
                            <input class="form-control" list="'; echo "edit".$cnt."BL"; echo'"  name="BL" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."BL"; echo'">
                            <option value="'; echo $BL; echo'">
        
                            </datalist>
                            </div>
                            <div class="p-2">
                            <label for="PI" class="form-label">PI</label>
                            <input class="form-control" list="'; echo "edit".$cnt."PI"; echo'" name="PI" placeholder="Type to search..." required>
                            <datalist id="'; echo "edit".$cnt."PI"; echo'">
                            <option value="'; echo $PI; echo'">
        
                            </datalist>
                            </div>
                            </div>
                            

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="edit_submit" value="Save Changes">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                           
                        
                        
                        </div>
                        <div class="p-2">
                        <form action="delete_question.php" method="POST">
                        <input type="hidden" name="subject" value="';echo $subject; echo'">
                        <input type="hidden" name="U_ID" value="'; echo $i; echo '">
                        <input type="hidden" name="Q_ID" value="'; echo $Q_ID; echo'">
                        <input type="submit" name="Delete" value="-" class="btn btn-dark">
                        </form>
                        </div>
                        </div>
                    </div>';
                    $cnt++;
                }
                }
            }
            if($single_que==0)
            {
                echo'
                <div class="card " style="max-width: 27rem ; border:none;">
                <img src="assets/no_data.jpg" class="card-img-top" alt="...">
                <div class="alert alert-primary alert-dismissible fade show"role="alert">
                <i class="bi bi-info-circle-fill"></i> No Questions! in the Queue.Pick from <strong><a href="http://localhost/CQPL/library.php" style="color:#052c65;">Library</a></strong>.
              </div>
                </div>
                
                
                ';
            }

    echo'
        </div>

        <div class="card-footer text-body-secondary text-center">';
    $query = "select * from queue where FN='$fn'";
    $res=mysqli_query($conn,$query);    
    while($row=mysqli_fetch_assoc($res))
    {
        echo '<span class="badge text-bg-primary">Created On : '; echo $row['Session']; echo'</span>';
    }
    echo'
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success badge badge-pill badge-danger" data-bs-toggle="modal" data-bs-target="#preview_paper">
    <i class="bi bi-eye"></i> Preview Paper
    </button>

      </div>
      </div>
        </div>
        <div class="p-2"></div>
        </div>

  
       <!-- Modal -->
       <div class="modal fade" id="preview_paper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Paper to be Printed</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
              

             <!----------------------Paper starts---------------------------------------------->

             <div id="printableContent">
             <!----------------------------------- Paper Layout starts ----------------------------->
 
             <!------- Exam Header starts -------->
             <div class="d-flex text-center " style="">
             <div class="p-2 flex-shrink-1 border border-secondary"><img src="assets/anits-logo.png" height=80px width=125px style="margin-top:32%" ></div>
             <div class="p-2 w-100 border border-secondary" style="">
             <h4><strong>Anil Neerukonda Institute Of Technology & Sciences (Autonomous) </strong></h4>
             <p>(Permant Affiliation by Andhra University & Approved by AICTE <br> Accredited by NBA (ECE,EEE,CSE,IT,Mech,Civil & Chemical) & NAAC) <br> 
             <span style="font-size:12px">Sangivalasa-531 162, Bheemunipatnam Mandal, Visakhapatnam District <br>
             Phone: 08933-225-83/84/87 &nbsp;&nbsp;&nbsp; Fax:226395 <br>
             Website : www.anits.edu.in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email: Principal@anits.edu.in</span>
             </p>
             </div>
             </div>
             <!---- Exam header ends ----------->
 
             <!-----------------Exam Details starts------------------------->
             <div class="d-flex mb-3">
             <div class="p-2">
                 <p>';
                 $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");
                 $query = 'select * from queue';
                 $res=mysqli_query($conn,$query);
                 $AY = "";
                 $Y = "";
                 $course = "";
                 $Date = "";
                 $exam = "";
                 $sem = "";
                 $code = "";
                 $time = "";
                 $marks = "";    
                 while($row=mysqli_fetch_assoc($res))
                 {
                     $AY = $row['Academic_Year'];
                     $Y = $row['Year'];
                     $course = $row['Course'];
                     $Date = $row['Date'];
                     $exam = $row['Exam'];
                     $sem = $row['Semester'];
                     $code = $row['Code'];
                     $time = $row['Time'];
                     $marks = $row['Max_Marks']; 
                 }
 
                     echo 'Academic Year :'; echo $AY; echo'<br>';
                     echo 'Year :'; echo $Y; echo'<br>';
                     echo 'Course : <strong>'; echo $course; echo'</strong> <br>';
                     echo 'Date :'; echo $Date; echo'<br>';
                     echo '<strong>'; echo $exam; echo'</strong>
                 </p>
             </div>
             <div class="ms-auto p-2 text-end">
                 <p>';
                 echo 'Program : B.Tech <br>';
                 echo 'Semester :'; echo $sem; echo'<br>';
                 echo 'Code :'; echo $code; echo'<br>';
                 echo 'Time : <strong>'; echo $time; echo'</strong> <br>';
                 echo 'Max Marks : <strong>'; echo $marks; echo'</strong>';
 
     echo'        </p>
             </div>
             </div>
 
 
             <div class="card text-center">
             <div class="card-body">
             <strong>NOTE : </strong> Answer ONE Question from each Unit    <br>
                                     All Questions Carry Equal Marks   <br>
                                 All parts of the questions must be answered at one place only.
             </div>
             </div>
             <!-----------Exam Details Section  Ends--------------->
 
 
         <br>
             <div class="d-flex  text-center  ">
             <div class="p-2  border border-secondary text-center"><b>S.<br>No</b></div>
             <div class="p-2 flex-grow-1  border border-secondary "><b>Questions</b></div>
             <div class="p-2  border border-secondary"><b>M<br>a<br>r<br>k<br>s</b></div>
             <div class="p-2  border border-secondary ">
 
                 <div class="d-flex flex-column font-weight-bold" style="margin:-2%">
                 <div class="p-2 border-secondary border-bottom text-center" style="margin:-4%">For Faculty Use</div>
                     <div class="p-2 ">
                     <div class="d-flex flex-row ">
                     <div class="p-2  ">CO</div>
                     <div class="p-2 ">BL</div>
                     <div class="p-2">PI</div>
                     </div>
                 </div>
                 </div>
             </div>
             </div>
         <br>';
         $single_que=0;
         $cnt=1;
         for($i=1;$i<6;$i++)
         {
         // <!--upper--> 
         $query = "select  * from $fn where U_ID='$i' && upper='1'  ";
         
         $res=mysqli_query($conn,$query);
         $unit_cnt=0;
         while($row=mysqli_fetch_assoc($res))
         {
             $single_que++;
             $Q_ID = $row['Q_ID'];
             $subject = $row['subject'];
 
             // <!------------------------------------Each Unit-------------------------------------------------->
 
             if($unit_cnt==0)
             {
             echo'
              <!----------------------unit no starts--------------------------->
             <div class="d-flex justify-content-center font-weight-bold">
             <div class="p-2"><strong>UNIT -'; echo $i; echo'</strong></div>
             </div>';
             $unit_cnt++;
             }
             // <!-----------------------ends-------------------------------------->
 
             // <!----------------------Upper Part starts------------------------>
             echo '
             <div class="d-flex   ">
             <div class="p-2  border border-secondary "><strong>'; echo $cnt; echo'</strong></div>';
             echo '<div class="p-2 flex-grow-1  border border-start-0   border-secondary" >';echo $row['Question']; echo'</div>';
             echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold">&nbsp;<strong>'; echo $row['Marks']."M"; echo'&nbsp;</strong></div>';
             echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold ">&nbsp;<strong>';echo $row['CO']; echo'</strong></div>';
             echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold"><strong>';echo $row['BL']; echo'</strong></div>';
             echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold"><strong>'; echo $row['PI']; echo'</strong></div>';
             echo '</div>';
             // <!-------------------Upper Part Ends--------------------------->
             $cnt++;
         }
             $query = "select DISTINCT * from $fn where U_ID='$i' && upper='0'";
             $res=mysqli_query($conn,$query);
             if($res)
             {
             $or_cnt=0;
             
             while($row=mysqli_fetch_assoc($res))
             {
                 $single_que++;
                 if($or_cnt==0&&$unit_cnt>0)
                 {
                     // <!--check if lower existed or not -->
                     echo'
                     <div class="d-flex justify-content-center border border-secondary">
                     <div class="p-2 font-weight-bold">OR</div>
                     </div>';
                     $or_cnt++;
                 }
                 if($unit_cnt==0)
                 {
                 echo'
                 <!----------------------unit no starts--------------------------->
                 <div class="d-flex justify-content-center font-weight-bold">
                 <div class="p-2">UNIT -'; echo $i; echo'</div>
                 </div>';
                 $unit_cnt++;
                 }
 
                     // <!-------------------Lower Part starts------------------------>
 
                     echo '
                     <div class="d-flex   ">
                     <div class="p-2  border border-secondary "><strong>'; echo $cnt; echo'</strong></div>';
                     echo '<div class="p-2 flex-grow-1  border border-start-0   border-secondary ">';echo $row['Question']; echo'</div>';
                     echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold">&nbsp;<strong>'; echo $row['Marks']."M"; echo'&nbsp;</strong></div>';
                     echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold ">&nbsp;<strong>';echo $row['CO']; echo'</strong></div>';
                     echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold"><strong>';echo $row['BL']; echo'</strong></div>';
                     echo '<div class="p-2  border border-start-0   border-secondary font-weight-bold"><strong>'; echo $row['PI']; echo'</strong></div>';
                     echo '</div>';
 
                     // <!-------------------Lower Part Ends------------------------->
                     $cnt++;
             }
         }
         
             // <!-----------------------------------------------------Each unit ends--------------------------------->
         }
 
      echo'   </div>

                <!----------------------Paper Ends---------------------------------------------->

             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
           </div>
         </div>
       </div>





    <br>
    <div class="d-flex flex-row mb-3 justify-content-between flex-wrap">
    <div class="p-2">
            <div class="card text-bg-light mb-3 border-danger " style="max-width: 18rem;">
            <div class="card-header"><i class="bi bi-trash3"></i></div>
                <div class="card-body">
                    <h5 class="card-title">Delete Queue</h5>
                    <p class="card-text">Deletes the present queue request ,deletes the present paper above and allows user to create new paper. Before deleting queue request save the paper in DataBase for further purposes. </p>
                </div>
                <!-- Button to trigger the modal -->
                
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#delete" style="margin:15px">
                Delete Queue
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Instructions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete the queue?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="delete_queue.php"><button type="button"  class="btn btn-primary">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
                
            </div>

    </div>
    <div class="p-2">
            <div class="card text-bg-light mb-3 border-info" style="max-width: 18rem;">
            <div class="card-header"><i class="bi bi-floppy"></i></div>
            <div class="card-body">
                <h5 class="card-title"> Save to DataBase</h5>
                <p class="card-text">Save the paper for accessing the same paper in later purposes even after deleting the queue. Saved papers are listed on the home page. </p>
            </div>
                                <!-- Button to trigger the modal -->
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#save" style="margin:15px">
                                Save
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Instructions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to save the paper to the database?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="save_history.php"><button type="button" class="btn btn-primary">Save</button></a>
                                    </div>
                                    </div>
                                </div>
                                </div>
            </div>
    </div>
    <div class="p-2">
            <div class="card text-bg-light mb-3 border-success" style="max-width: 18rem;">
            <div class="card-header"><i class="bi bi-printer"></i> </div>
            <div class="card-body">
                <h5 class="card-title">Print Paper</h5>
                <p class="card-text">Print the paper here for saving the file locally & also used for production. Also please verify the questions for the smooth experience without hassale.</p>                  
            </div>
            <button type="button" class="btn btn-primary " onclick="printDiv(\'printableContent\')" style="margin:15px">Print</button>
            </div>
    </div>
    </div>
        ';
    }



    ?>

        

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  function printDiv(divId) {
    var contentToPrint = document.getElementById(divId);
    var newWin = window.open('', '_blank');
    newWin.document.write('<html><head><title>Powered By Pi</title><style>*{font-size:12px;}</style></head><body>');
    newWin.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">');
    newWin.document.write(contentToPrint.innerHTML);
    newWin.document.write('</head><body>');
    newWin.document.write('</body></html>');
    newWin.document.close();
    newWin.print();
  }
</script>
<script>
    // Initialize popover
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl);
    });
  </script>
</body>
    <footer>
    </footer>
</html>