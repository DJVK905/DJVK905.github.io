<?php
    // error_reporting(0);
    session_start();
    if(!isset($_SESSION['user_email'])){
        header('Location: login.php');
    }
    // db connection
    include "./include/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Certificates</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- main container -->
    <div class="container-fluid ">
        <!-- First Child Heading -->
        <div class="heading text-center">
            <div>
                <h1>E-Certificate Services</h1>
                <p>Select to apply for the e-certificates from below:</p>
            </div>
            <div><a href="./email_login/logout.php" class="btn btn-danger my-2">logout</a></div>
        </div>

        <!--Second Child Navigation menus -->
        <ul class="nav justify-content-center bg-primary">
                <?php

                // fetching all categories
                $select_cat_query = "select * from `cert_categories`";
                $exec_cat_query = mysqli_query($conn, $select_cat_query);
                while($row=mysqli_fetch_array($exec_cat_query)){
                    $cert_cat_id = $row['cert_cat_id'];
                    $cert_categories = $row['cert_categories'];
                    echo "<li class='nav-item btn btn-primary m-2 fw-bold'><a href='index.php?$cert_cat_id' class='nav-link text-white'>$cert_categories</a></li>";
                }                
                ?>

            </ul>

            <!-- Fourth Child display Certificates as per get variable PHP -->
            <div class=" container-fluid m-3">
                <?php
                    if(isset($_GET['1'])){include 'user_requirements/residence_requirement.php';}
                    if(isset($_GET['2'])){include 'user_requirements/character_requirements.php';}
                    if(isset($_GET['3'])){include 'user_requirements/income_requirements.php';}
                    if(isset($_GET['4'])){include 'user_requirements/noc_requirements.php';}
                    if(isset($_GET['5'])){include 'birth.php';}
                    if(isset($_GET['6'])){include 'user_requirements/divergence_requirements.php';}
                    

                    if(isset($_GET['residence'])){ include 'residence.php';}
                    if(isset($_GET['character'])){ include 'character.php';}
                    if(isset($_GET['noc'])){ include 'noc.php';}
                    if(isset($_GET['income'])){ include 'income.php';}
                    if(isset($_GET['divergence'])){ include 'divergence.php';}

                ?>
            </div>
            
    </div>


    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>
</html>