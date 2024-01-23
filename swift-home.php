<?php 
session_start();
if(isset($_POST['sub']))
{
  $_SESSION['user_name'] = $_POST['user_name'];
}
if(!isset($_SESSION['user_name']))
header( "location:index.php" );
?>
<!doctype html>
<html>
    <head>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">       
      <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
            *
            {
                font-family: Google Sans Display,Arial,Helvetica,sans-serif;
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
    </head>
    <body>
                <!-- Auto-open translucent toast container -->
                <div class="toast-container position-fixed bottom-0 end-0 p-3 ">
                <!-- Auto-open translucent toast element -->
                <div class="toast translucent-toast text-bg-primary " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">
                        <?php       
                         date_default_timezone_set('Asia/Kolkata');              
                         $currentTimestamp = time();
                         $currentDateTime = date("Y-m-d H:i:s", $currentTimestamp);
                         echo "Session Details: " . $currentDateTime."\n";?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">

                <?php
                    echo "Welcome, ".$_SESSION['user_name'];
                 ?>
                </div>
                </div>
                </div>



        <!------------------ Top Navigation Bar Starts-------------------------------------->

        <!-- Off-canvas menu -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="swift-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="library.php">Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generate.php">Generate Paper</a>
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
                            <a class="nav-link color active" href="swift-home.php"><span class="color">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="library.php"><span class="color">Library</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="generate.php"><span class="color">Generate Paper</span></a>
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
                    <span>
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

            <!-- Offcanvas for Small Screens -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Navigation Links for Small Screens -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link color active" href="swift-home.php"><span class="color">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="library.php"><span class="color">Library</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="generate.php"><span class="color">Generate Paper</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="color">Random Question Paper</span></a>
                        </li>
                    </ul>
                    <!-- End of Navigation Links for Small Screens -->
                </div>
            </div>
            <!-- End of Offcanvas for Small Screens -->

        <!-------------------Top Navigation Bar Ends------------------------------------->

        <!-------------------Previous crearted Papers starts------------------------------->
        <p style="margin:30px"> <strong> Previously Done Papers </strong></p>
        <?php 

        $history_cnt = 0;
        $tableName="";
        $subject = "";
        $created = "";
        $Year = "";
        for($j=10;$j>0;$j--)
        {
            $cnt = 0;
            $tableName = $fn."_".$j."_Q";
            $conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"history");
            $query = "SHOW TABLES LIKE '$tableName'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) 
            {
                
                $query = "select * from $tableName ";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $history_cnt++;
                    $subject = $row['Course'];
                    $created = $row['Session'];
                    $Year = $row['Year'];
                    echo '
                    <!-- Single Paper  -->
                    <div class="card border-success mb-3 shadow bg-body-tertiary rounded" style="margin:30px;">
                    <div class="card-header">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="p-2">Year & Branch: <strong>'; echo $Year; echo'</strong></div>
                    <div class="p-2">Subject:<strong> '; echo $subject; echo'</strong></div>
                    <div class="p-2">Created On: <strong>'; echo $created; echo'</strong></div>
                    </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>




                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="'; echo "#detail".$j; echo'">
                        <i class="bi bi-eye"></i> View
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="'; echo "detail".$j; echo'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Paper Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">';

                              $tableName = $fn."_".$j."_Q_D";
                              $single_que=0;
                              $cnt=1;
                              for($i=1;$i<6;$i++)
                              {
                              // <!--upper--> 
                              $query = "select  * from $tableName where U_ID='$i' && upper='1'  ";
                              
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
                                  <div class="p-2">UNIT -'; echo $i; echo'</div>
                                  </div>';
                                  $unit_cnt++;
                                  }
                                  // <!-----------------------ends-------------------------------------->
                      
                                  // <!----------------------Upper Part starts------------------------>
                                  echo '
                                  <div class="d-flex   ">
                                  <div class="p-2  border border-secondary ">'; echo $cnt; echo'</div>';
                                  echo '<div class="p-2 flex-grow-1  border border-secondary">';echo $row['Question']; echo'</div>';
                                  echo '<div class="p-2  border border-secondary font-weight-bold">&nbsp;'; echo $row['Marks']."M"; echo'&nbsp;</div>';
                                  echo '<div class="p-2  border border-secondary font-weight-bold ">&nbsp;';echo $row['CO']; echo'</div>';
                                  echo '<div class="p-2  border border-secondary font-weight-bold">';echo $row['BL']; echo'</div>';
                                  echo '<div class="p-2  border border-secondary font-weight-bold">'; echo $row['PI']; echo'</div>';
                                  echo '</div>';
                                  // <!-------------------Upper Part Ends--------------------------->
                                  $cnt++;
                              }
                                  $query = "select  * from $tableName where U_ID='$i' && upper='0'";
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
                                          <div class="p-2  border border-secondary ">'; echo $cnt; echo'</div>';
                                          echo '<div class="p-2 flex-grow-1  border border-secondary">';echo $row['Question']; echo'</div>';
                                          echo '<div class="p-2  border border-secondary font-weight-bold">&nbsp;'; echo $row['Marks']."M"; echo'&nbsp;</div>';
                                          echo '<div class="p-2  border border-secondary font-weight-bold ">&nbsp;';echo $row['CO']; echo'</div>';
                                          echo '<div class="p-2  border border-secondary font-weight-bold">';echo $row['BL']; echo'</div>';
                                          echo '<div class="p-2  border border-secondary font-weight-bold">'; echo $row['PI']; echo'</div>';
                                          echo '</div>';
                      
                                          // <!-------------------Lower Part Ends------------------------->
                                          $cnt++;
                                  }
                              }
                              
                                  // <!-----------------------------------------------------Each unit ends--------------------------------->
                              }









                            echo'
                            <br>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> <span class="badge badge-pill badge-danger">Delete</span> 
                            <span class="fw-lighter">button removes your saved paper entirely from the DataBase. You cannot
                            retreive it back once deleted.</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="delete_history.php" method="POST">
                                <input type="hidden" name="queue_details" value="'; echo $fn."_".$j."_Q"; echo'">
                                <input type="hidden" name="queue_paper_details" value="'; echo $fn."_".$j."_Q_D"; echo'">
                                <input type="submit" class="btn btn-danger" name="Delete_History" value="Delete">
                                </form>
                                </div>
                            </div>
                          </div>
                        </div>
                        







                    </div>
                    </div>
                    </div>';
                }
                
            } 
            else {
                continue;
            }
            
            
        }

        if($history_cnt==0)
        {
            echo '
            <div class="d-flex flex-row mb-3 justify-content-between">
            <div class="p-2"></div>
            <div class="p-2 ">

            <div class="card " style="max-width: 22rem; border:none;">
            <img src="assets/history.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center text-body-secondary text-decoration-underline"><strong>History is Empty</strong></p>
            </div>
            </div>
            
            
            </div>
            <div class="p-2"></div>
            </div>

            ';
        }


        ?>

        <!--Previously Created Papers Ends -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var toastElement = new bootstrap.Toast(document.querySelector('.translucent-toast'));
      setTimeout(function () {
        toastElement.show();
      }, 1000); 
    });
  </script>
  <script>
  // Initialize tooltips
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  });
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
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Create a Personalized Question Paper in Minutes.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Team Swift
        </figcaption>
        </figure>
    </footer>
</html>