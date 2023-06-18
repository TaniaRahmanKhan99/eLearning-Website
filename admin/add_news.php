<?php 


include_once '../config/database.php';

include('header.php'); 

$db = new Database();



if($_SERVER['REQUEST_METHOD'] == "POST"){

   $n_title = $_POST['newsT'];
   $n_description = $_POST['newsD'];
    
    date_default_timezone_set("Asia/Dhaka");
    $datetime = date("Y-m-d h:i:sa");
    
    
    $permited = array('jpg', 'jpeg', 'png');
    
    $photo_name = $_FILES['newsI']['name'];
    $photo_size = $_FILES['newsI']['size'];
    $photo_temp = $_FILES['newsI']['tmp_name'];
    
    
    $div = explode('.', $photo_name);  
    
    $file_extension = strtolower(end($div));
    
    
    $unique_name = substr(md5(time()), 0, 10). '.' . $file_extension;
    
    $upload_photo =  "upload/news/". $unique_name;
    
    
    
    
    if($photo_size > 1048576){
        echo "<script>
         alert('File size must be less than 1 MB.')
         </script>";
    }elseif(in_array($file_extension, $permited) == false){
        echo "<script>
         alert('You can upload only jpg, jpeg, png format image');
         </script>";
    }else{
        
        move_uploaded_file($photo_temp, $upload_photo);
        
        $sql = "insert into news(news_title, news_description, news_photo, news_date) values ('$n_title', '$n_description', '$upload_photo', '$datetime')";
        
        $result = $db->insert($sql);
        
        if($result){
            echo "<script>
             alert('Insert Successfully');
             window.location.href = 'manage_news.php';
             </script>";
        }else{
            echo "<script>
             alert('Insertion Failed!!');
             </script>";
        }
        
    }
    



}




?>





<!-- Content div section -->



<div class="col-md-9">
   
   <h4 id="conH">Add News</h4>
   
   <form class="form-horizontal" action="" method="post" style="width:80%;" enctype="multipart/form-data">
      
      <div class="form-group">
         <label class="col-sm-4">News Title: </label>
      </div>
      
      <div class="form-group">
         <div class="col-sm-12">
            <input type="text" class="form-control" name="newsT" id="newsT" placeholder="Enter News Title">
             
         </div>
      </div>
      
      
      <div class="form-group">
         <label class="col-sm-4">News Discription: </label>
      </div>
      
      <div class="form-group">
         <div class="col-sm-12">
            <textarea class="form-control" name="newsD" id="newsD" rows="10" cols="30" placeholder="Enter News Discription"></textarea>
            
            <script>
                
                CKEDITOR.replace('newsD');
                
             </script>
            
         </div>
      </div>
      
      
      <div class="form-group">
         <label class="col-sm-4">News Image: </label>
      </div>
      
      <div class="form-group">
         <div class="col-sm-12">
            <input type="file" class="form-control" name="newsI" id="newsI">
             
         </div>
      </div>
      
      <div class="form-group">
         
         <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-default"  value="ADD NEWS">
             
         </div>
          
      </div>
       
   </form>
    
</div>












<?php include('footer.php'); ?>