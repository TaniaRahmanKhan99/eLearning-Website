<?php 

include_once '../config/database.php';

include('header.php'); 

$db = new Database();




if($_SERVER['REQUEST_METHOD'] == "POST"){

   $o_pass = $_POST['o_pass'];
   $n_pass = $_POST['n_pass'];
   $r_pass = $_POST['r_pass'];


   $query = "select * from admin where  id = '$id'";
   $result = $db->select($query);

   if($result){
      while($row = mysqli_fetch_assoc($result)){

         if($row['password'] != $o_pass){

            echo "<script>
            alert('Old PAssword is wrong. Process Failed!!');
            </script>";

         }else{
            
            if($n_pass != $r_pass){

               echo "<script>
               alert('Type your password correctly. Process Failed!!');
               </script>";

            }else{

               $sql = "update admin set password = '$n_pass' where id = '$id'";

               $res = $db->update($sql);


               if($res){

                  echo "<script>
                  alert('Password changed Successfully.')
                  </script>";

                  header("Refresh:0");

               }else{
                  echo "<script>
                  alert('Process Failed.')
                  </script>";
               }

            }


         }

      }
   }






}


?>




<!-- Content div section -->



<div class="col-md-9">
   
   <h4 id="conH">Edit your Paassword</h4>
   
   <form class="form-horizontal" action="change_password.php" method="post" style="width:80%;">
      
      <div class="form-group">
         <label class="control-label col-sm-3">Old Password: </label>
         <div class="col-sm-9">
            <input type="password" class="form-control" name="o_pass" id="o_pass" placeholder="Enter your old password">
             
         </div>
          
      </div>
      
      <div class="form-group">
         <label class="control-label col-sm-3">Type New Password: </label>
         <div class="col-sm-9">
            <input type="password" class="form-control" name="n_pass" id="n_pass" placeholder="Enter your new password">
             
         </div>
          
      </div>
      
      
      <div class="form-group">
         <label class="control-label col-sm-3">Confirm New Password: </label>
         <div class="col-sm-9">
            <input type="password" class="form-control" name="r_pass" id="r_pass" placeholder="Enter your new password again">
             
         </div>
          
      </div>
      
      <div class="form-group">
         
         <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-default"  value="U P D A T E">
             
         </div>
          
      </div>
       
   </form>
    
</div>












<?php include('footer.php'); ?>