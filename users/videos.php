<?php

include_once '../config/database.php';


$db = new Database();







?>






<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eShikhon</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>






    <link rel="stylesheet" href="../style.css">
</head>

<body id="myPage">

    <!-- Logo section -->
    <div class="container text-center">
        <p></p>
        <img src="../images/logo-full-final.png" width="300px">
        <h5><b>Boost your skills and build the world</b></h5>

    </div>



    <!-- navbar section -->

    <nav class="navbar navbar-inverse navbar-sticky-top">
        <div class="container-fluid">


            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php"><b>eShikhon.com</b></a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>

            </div>



            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav">
                    <li><a href="news.php">News</a></li>
                    <li><a href="videos.php">Videos</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>



                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                </ul>

            </div>

        </div>




    </nav>




    <!-- videos division -->


    <div class="container-fluid">
        <div class="container">

            <div class="row">
                
                
                
                <?php
                
                $query = "select * from videos";
                
                $result = $db->select($query);
                
                
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                
                        
                ?>
                
                <div class="col-md-6">
                    <div class="thumbnail" style="width: 90%;">

                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?=$row['video_code']?>" allowfullscreen>

                        </iframe>

                        <h4><?=$row['video_title']?></h4>

                    </div>

                </div>
                  
                
                        
                        
                <?php        
                    }
                }
                
  
                ?>
                
                


            </div>
            <br>


        </div>

    </div>










    <!-- Footer section -->


    <footer class="container-fluid" id="myFooter">

        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <h4>Address</h4>
                    <p><span class="glyphicon glyphicon-globe"></span> eShikhon.com.bd<br><span class="glyphicon glyphicon-map-marker"></span> Office: 151/7, Goodluck Center(4th Floor)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Panthapath Signal, Green Road<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dhaka-1205<br><span class="glyphicon glyphicon-phone-alt"></span> Helpline: 09639 399 399 (10 am - 11 pm)</p>
                    <br>

                </div>

                <div class="col-sm-8">
                    <div>
                        <img src="../images/logo-full-final.png" width="40%">
                        <br><br><br>
                    </div>

                    <form class="form-horizontal" action="#">

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">

                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Subscribe <span class="glyphicon glyphicon-thumbs-up"></span></button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </footer>





    <!-- Copyright footer section -->

    <div class="container-fluid" id="copyFooter">
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#myPage"><span class="glyphicon glyphicon-chevron-up"></span></a>

            </div>

            <div class="col-sm-12 text-center">
                <p>&copy; Copyright 2023 eShikhon.com</p>

            </div>

        </div>

    </div>










    <script src=""></script>
</body>

</html>
