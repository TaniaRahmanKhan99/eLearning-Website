<?php 


include_once '../config/database.php';

include('header.php'); 

$db = new Database();


if($_SERVER['REQUEST_METHOD'] == "POST"){

   $v_name = $_POST['v_name'];
   $code = $_POST['code'];
    
    
    date_default_timezone_set("Asia/Dhaka");
    $datetime = date("Y-m-d h:i:sa");



   if(empty($v_name) || empty($code)){
      echo "<script>
         alert('Every field must be fullfilled.')
         </script>";
   }else{

      $sql = "insert into videos(video_title, video_code, date) values ('$v_name', '$code', '$datetime')";

      $result = $db->insert($sql);


      if($result){
         echo "<script>
         alert('Inserted Successfully.');

         window.location.href = 'add_videos.php';

         </script>";

      }else{
         echo "<script>
         alert('Insertion Failed!!')
         </script>";
      }


   }


}




?>




<!-- Content div section -->



<div class="col-md-9">
   
   <h4 id="conH">Add New Videos</h4>
   
   <form class="form-horizontal" action="" method="post" style="width:80%;">
      
      <div class="form-group">
         <label class="control-label col-sm-3">Video Title: </label>
         <div class="col-sm-9">
            <input type="text" class="form-control" name="v_name" id="v_name" placeholder="Enter video title">
             
         </div>
          
      </div>
      
      <div class="form-group">
         <label class="control-label col-sm-3">Video Embed Code: </label>
         <div class="col-sm-9">
            <input type="text" class="form-control" name="code" id="code" placeholder="Enter video emded code">
             
         </div>
          
      </div>
      
      
      <div class="form-group">
         
         <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-default"  value="Add Videos">
             
         </div>
          
      </div>
       
   </form>
    
</div>












<?php include('footer.php'); ?>