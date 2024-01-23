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
$query = "drop table $fn";
$res=mysqli_query($conn,$query);
$query = "delete from queue where FN='$fn'";
$res=mysqli_query($conn,$query);
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
            
        </style>
          <style media="print">
    body {
      font-size: 60px;
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
                    <span>
                        <strong>Author:</strong>
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

        <!--------------Sucess Status --------->

        <div class="card" style="max-width: 28rem; margin:7%;">
        <div class="card-header">
        Status
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i>&nbsp;<strong>Deleted Sucessfully!</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
        </div>
        </li>
            <div class="d-flex align-items-center" style="margin:2%;">
            <strong role="status">Redirecting back in 2s</strong>
            <div class="spinner-border ms-auto text-success" aria-hidden="true"></div>
            </div>
            </ul>
        </div>
        <!--Ends success status-->

</body>
<script>
    setTimeout(function() {
      window.location.href = 'generate.php';
    }, 2000); 
  </script>
</html>