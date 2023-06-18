
<?php

session_start();

if($_SESSION['name'] != "admin"){


    header("location: login.php");

}



$id = $_SESSION['id'];



?>










<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    
    
    <!--CKeditor Link -->
    <script type="text/javascript" src="../tools/ckeditor/ckeditor.js"></script>
    
    
    <!-- Fancybox Link -->
    <script type="text/javascript" src="fancyBox/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="fancyBox/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="fancyBox/jquery.fancybox.css" media="screen">
    
    
    <script type="text/javascript">
        
        $(document).ready(
            function() {
                $('.fancybox').fancybox();
            }
        );
        
    </script>
    


    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Header Div -->

    <div class="container-fluid text-center" id="hDiv" style="height:100px;">

        <h1><b>A D M I N &nbsp;&nbsp; P A N E L</b></h1>

    </div>



    <!-- body main container section -->

    <div class="container-fluid" style="height:80%; padding:0;">

        <div class="row" style="height:100%;">

            <!-- Navigation div section -->
            <div class="col-md-3" id="navDiv">

                <h4 id="title">CONTROLS</h4>

                <ul id="navList">
                    <li><a href="home.php">Admin home</a></li>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="manage_admin.php">Manage Admin</a></li>
                    <li><a href="manage_employee.php">Manage Employee</a></li>
                    <li><a href="add_news.php">Add News</a></li>
                    <li><a href="manage_news.php">Manage News</a></li>
                    <li><a href="add_videos.php">Add Videos</a></li>
                    <li><a href="manage_videos.php">Manage Videos</a></li>
                    <li><a href="show_feedbacks.php">Show Feedbacks</a></li>
                    <li><a href="subscriber_count.php">Total Subscribers</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>

            </div>