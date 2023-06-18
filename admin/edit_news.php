
<?php


include_once '../config/database.php';

include('header.php'); 

$db = new Database();



if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
}



if($_SERVER['REQUEST_METHOD'] == "POST"){

   $n_title = $_POST['newsT'];
   $n_description = $_POST['newsD'];
    
    
    $permited = array('jpg', 'jpeg', 'png');
    
    $photo_name = $_FILES['newsI']['name'];
    $photo_size = $_FILES['newsI']['size'];
    $photo_temp = $_FILES['newsI']['tmp_name'];
    
    
    $div = explode('.', $photo_name);  
    
    $file_extension = strtolower(end($div));
    
    
    $unique_name = substr(md5(time()), 0, 10). '.' . $file_extension;
    
    $upload_photo =  "upload/news/". $unique_name;
    
    
    
    if(!empty($photo_name)){
        
        if($photo_size > 1048576){
            echo "<script>
             alert('File size must be less than 1 MB.')
             </script>";
        }elseif(in_array($file_extension, $permited) == false){
            echo "<script>
             alert('You can upload only jpg, jpeg, png format image');
             </script>";
            
        }else{
            
            
            $isql = "select * from news where news_id = '$id'";
            $iresult = $db->select($isql);
            
            if($iresult){
                while($row = mysqli_fetch_assoc($iresult)){
                    $img = $row['news_photo'];
                    unlink($img);
                }
            }
            
            

            move_uploaded_file($photo_temp, $upload_photo);

            $sql = "update news set news_title = '$n_title', news_description = '$n_description', news_photo = '$upload_photo' where news_id = '$id'";

            $result = $db->update($sql);

            if($result){
                echo "<script>
                 alert('Updated Successfully!');
                 window.location.href = 'manage_news.php';
                 </script>";
            }else{
                echo "<script>
                 alert('Update Failed!!');
                 </script>";
            }

        }
        
    }else{
        
        $sql = "update news set news_title = '$n_title', news_description = '$n_description' where news_id = '$id'";

        $result = $db->update($sql);

        if($result){
            echo "<script>
             alert('Updated Successfully!');
             window.location.href = 'manage_news.php';
             </script>";
        }else{
            echo "<script>
             alert('Update Failed!!');
             </script>";
        }
        
        
    }
    


}











?>



<!-- Content div section -->



<div class="col-md-9">
   
   <h4 id="conH">Edit News</h4>
   
   
   
   
   <?php
    
    $query = "select * from news where news_id = '$id'";
    
    $result = $db->select($query);
    
    
    if($result){
        while($row = mysqli_fetch_assoc($result)){
        ?>    
    
    
   <form class="form-horizontal" action="" method="post" style="width:80%;" enctype="multipart/form-data">
      
      <div class="form-group">
         <label class="col-sm-4">News Title: </label>
      </div>
      
      <div class="form-group">
         <div class="col-sm-12">
            <input type="text" class="form-control" name="newsT" id="newsT" value="<?=$row['news_title'];?>">
             
         </div>
      </div>
      
      
      <div class="form-group">
         <label class="col-sm-4">News Discription: </label>
      </div>
      
      <div class="form-group">
         <div class="col-sm-12">
            <textarea class="form-control" name="newsD" id="newsD" rows="10" cols="30" ><?=$row['news_description'];?></textarea>
            
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
      
      <div>
          <img src="<?=$row['news_photo'];?>" width="150px">
      </div>
      
      <div class="form-group">
         
         <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-default"  value="UPDATE NEWS">
             
         </div>
          
      </div>
       
   </form>
            
        
        
        <?php    
        }
    }
    

    ?>
   
   
   
    
</div>












<?php include('footer.php'); ?>