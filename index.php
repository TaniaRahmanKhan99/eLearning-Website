<?php 


include_once 'config/database.php';


$db = new Database();


//$_SERVER['REQUEST_METHOD'] == "POST"


if(isset($_POST['submit'])){

   $email = $_POST['email'];


   if(empty($email)){
      echo "<script>
         alert('Email field must be fullfilled.')
         </script>";
   }else{

      $sql = "insert into subscriber(s_email) values ('$email')";

      $result = $db->insert($sql);

       
       //window.location.href = 'index.php';

      if($result){
         echo "<script>
         alert('Subscribed Successfully.');

         

         </script>";

      }else{
         echo "<script>
         alert('Process Failed!!')
         </script>";
      }


   }


}




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





    <link rel="stylesheet" href="style.css">
</head>

<body id="myPage">

    <!-- Logo section -->
    <div class="container text-center">
        <p></p>
        <img src="images/logo-full-final.png" width="300px">
        <h5><b>Boost your skills and build the world</b></h5>

    </div>



    <!-- navbar section -->

    <nav class="navbar navbar-inverse navbar-sticky-top">
        <div class="container-fluid">


            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>eShikhon.com</b></a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>

            </div>



            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav">
                    <li><a href="users/news.php">News</a></li>
                    <li><a href="users/videos.php">Videos</a></li>
                    <li><a href="users/about.php">About</a></li>
                    <li><a href="users/contact.php">Contact</a></li>

                </ul>



                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                </ul>

            </div>

        </div>




    </nav>






    <!-- Slider section -->
    <div id="myCoursel" class="carousel slide" data-ride="carousel" style="margin-top: -50px;">

        <ol class="carousel-indicators">
            <li data-target="#myCoursel" data-slide-to="0" class="active"></li>
            <li data-target="#myCoursel" data-slide-to="1"></li>
            <li data-target="#myCoursel" data-slide-to="2"></li>
            <li data-target="#myCoursel" data-slide-to="3"></li>

        </ol>

        <div class="carousel-inner">

            <div class="item active">
                <img src="images/p1.jpg" alt="p1" style="width: 100%;">

            </div>
            <div class="item">
                <img src="images/p2.jpg" alt="p2" style="width: 100%;">

            </div>
            <div class="item">
                <img src="images/p3.jpg" alt="p3" style="width: 100%;">

            </div>
            <div class="item">
                <img src="images/p4.jpg" alt="p4" style="width: 100%;">

            </div>

        </div>


        <a class="left carousel-control" href="#myCoursel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#myCoursel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>


    </div>




    <!-- Recent Notice Section -->

    <div class="container-fluid">

        <div class="row text-center">
            <p id="recentNews">R E C E N T &nbsp;&nbsp;&nbsp; N O T I C E S</p>

        </div>


        <div class="row" style="background-color: #e6ffe6; margin-top: -10px; padding: 10px;">
            <div class="container">
                <div class="row list-group">
                    
                    <?php
                    
                    
                    $query = "select * from news order by news_id desc limit 4";
                    
                    $result = $db->select($query);
                    
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                    
                    ?>
                            
                        <a href="users/newsView.php?id=<?=$row['news_id']?>" class="list-group-item"><?=$row['news_title']?></a>   
                        
                            
                    <?php        
                        }
                    }
                    

                    ?>
                    
                    
                    

                </div>


                <div class="row">
                    <div class="col-sm-3 pull-right text-right">
                        
                        <a href="users/news.php" class="btn btn-default">Show More <span class="glyphicon glyphicon-forward"></span></a>

                    </div>
                </div>


            </div>

        </div>

    </div>



    <!-- Popular course section -->

    <div class="container text-center">
        <h1><b>POPULAR COURSES</b></h1>

        <div class="row">

            <div class="col-md-4 text-justify">


                <div class="thumbnail">
                    <img src="images/wd.jpg" alt="" style="width: 100%;">

                    <div class="caption">
                        <p>বর্তমানে জনপ্রিয় একটি পেশা হল ওয়েব ডেভেলপমেন্ট। ওয়েব ডেভেলপমেন্ট মূলত ইন্টারনেট এর জন্য যেসব ওয়েবসাইট, ওয়েব অ্যাপ্লিকেশন তৈরি করা হয় সেগুলো বিভিন্ন স্ক্রিপ্টিং এবং প্রোগামিং ল্যাঙ্গুয়েজ ব্যবহার করে তৈরী করার প্রক্রিয়াকে বলা হয় ওয়েব ডেভেলপমেন্ট। </p>

                    </div>
                </div>


            </div>

            <div class="col-md-4 text-justify">


                <div class="thumbnail">
                    <img src="images/ad.jpg" alt="" style="width: 100%;">

                    <div class="caption">
                        <p>বর্তমানে জনপ্রিয় একটি পেশা হল ওয়েব ডেভেলপমেন্ট। ওয়েব ডেভেলপমেন্ট মূলত ইন্টারনেট এর জন্য যেসব ওয়েবসাইট, ওয়েব অ্যাপ্লিকেশন তৈরি করা হয় সেগুলো বিভিন্ন স্ক্রিপ্টিং এবং প্রোগামিং ল্যাঙ্গুয়েজ ব্যবহার করে তৈরী করার প্রক্রিয়াকে বলা হয় ওয়েব ডেভেলপমেন্ট। </p>

                    </div>
                </div>


            </div>

            <div class="col-md-4 text-justify">


                <div class="thumbnail">
                    <img src="images/dm.jpg" alt="" style="width: 100%;">

                    <div class="caption">
                        <p>বর্তমানে জনপ্রিয় একটি পেশা হল ওয়েব ডেভেলপমেন্ট। ওয়েব ডেভেলপমেন্ট মূলত ইন্টারনেট এর জন্য যেসব ওয়েবসাইট, ওয়েব অ্যাপ্লিকেশন তৈরি করা হয় সেগুলো বিভিন্ন স্ক্রিপ্টিং এবং প্রোগামিং ল্যাঙ্গুয়েজ ব্যবহার করে তৈরী করার প্রক্রিয়াকে বলা হয় ওয়েব ডেভেলপমেন্ট। </p>

                    </div>
                </div>


            </div>


            <div class="col-md-4 text-justify">


                <div class="thumbnail">
                    <img src="images/ad.jpg" alt="" style="width: 100%;">

                    <div class="caption">
                        <p>বর্তমানে জনপ্রিয় একটি পেশা হল ওয়েব ডেভেলপমেন্ট। ওয়েব ডেভেলপমেন্ট মূলত ইন্টারনেট এর জন্য যেসব ওয়েবসাইট, ওয়েব অ্যাপ্লিকেশন তৈরি করা হয় সেগুলো বিভিন্ন স্ক্রিপ্টিং এবং প্রোগামিং ল্যাঙ্গুয়েজ ব্যবহার করে তৈরী করার প্রক্রিয়াকে বলা হয় ওয়েব ডেভেলপমেন্ট। </p>

                    </div>
                </div>


            </div>

            <div class="col-md-4 text-justify">


                <div class="thumbnail">
                    <img src="images/dm.jpg" alt="" style="width: 100%;">

                    <div class="caption">
                        <p>বর্তমানে জনপ্রিয় একটি পেশা হল ওয়েব ডেভেলপমেন্ট। ওয়েব ডেভেলপমেন্ট মূলত ইন্টারনেট এর জন্য যেসব ওয়েবসাইট, ওয়েব অ্যাপ্লিকেশন তৈরি করা হয় সেগুলো বিভিন্ন স্ক্রিপ্টিং এবং প্রোগামিং ল্যাঙ্গুয়েজ ব্যবহার করে তৈরী করার প্রক্রিয়াকে বলা হয় ওয়েব ডেভেলপমেন্ট। </p>

                    </div>
                </div>


            </div>

            <div class="col-md-4 text-justify">


                <div class="thumbnail">
                    <img src="images/wd.jpg" alt="" style="width: 100%;">

                    <div class="caption">
                        <p>বর্তমানে জনপ্রিয় একটি পেশা হল ওয়েব ডেভেলপমেন্ট। ওয়েব ডেভেলপমেন্ট মূলত ইন্টারনেট এর জন্য যেসব ওয়েবসাইট, ওয়েব অ্যাপ্লিকেশন তৈরি করা হয় সেগুলো বিভিন্ন স্ক্রিপ্টিং এবং প্রোগামিং ল্যাঙ্গুয়েজ ব্যবহার করে তৈরী করার প্রক্রিয়াকে বলা হয় ওয়েব ডেভেলপমেন্ট। </p>

                    </div>
                </div>


            </div>

        </div>

    </div>






    <!-- Team heads section -->


    <div class="container-fluid" id="teamDiv">

        <div class="container">
            <div class="row text-center">
                <h2>OUR RESPECTED HEADS</h2>
                <br><br>
            </div>

            <div class="row">
                <div class="col-sm-4 text-center">
                    <img src="images/team/ceo.jpg" class="img-circle" width="70%">
                    <h2>Henry William</h2>
                    <p><b>CEO, Founder</b></p>

                </div>

                <div class="col-sm-4 text-center">
                    <img src="images/team/1.jpg" class="img-circle" width="70%">
                    <h2>Jacob Alexander</h2>
                    <p><b>Managing Director</b></p>

                </div>

                <div class="col-sm-4 text-center">
                    <img src="images/team/2.jpg" class="img-circle" width="70%">
                    <h2>Thomas Williams</h2>
                    <p><b>General Manager</b></p>

                </div>

            </div>

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
                        <img src="images/logo-full-final.png" width="40%">
                        <br><br><br>
                    </div>

                    <form class="form-horizontal" action="" method="post">

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">

                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary" name="submit">Subscribe <span class="glyphicon glyphicon-thumbs-up"></span></button>

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
