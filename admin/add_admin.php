<?php 


include_once '../config/database.php';

include('header.php'); 

$db = new Database();


if($_SERVER['REQUEST_METHOD'] == "POST"){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $password = $_POST['password'];


   if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($password)){
      echo "<script>
         alert('Every field must be fullfilled.')
         </script>";
   }else{

      $sql = "insert into admin(name, email, phone, address, password) values ('$name', '$email', '$phone', '$address', '$password')";

      $result = $db->insert($sql);


      if($result){
         echo "<script>
         alert('Inserted Successfully.');

         window.location.href = 'manage_admin.php';

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
   
   <h4 id="conH">Add New Admin</h4>
   
   
   <form class="form-horizontal" action="add_admin.php" method="post" style="width: 80%;">
      
      <div class="form-group">
         <label class="control-label col-sm-2">Name: </label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Admin Name">
             
         </div>
          
      </div>
      
      <div class="form-group">
         <label class="control-label col-sm-2">E-mail: </label>
         <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Admin E-mail">
             
         </div>
          
      </div>
      
      
      <div class="form-group">
         <label class="control-label col-sm-2">Phone: </label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Admin phone">
             
         </div>
          
      </div>
      
      <div class="form-group">
         <label class="control-label col-sm-2">Address: </label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Admin Address">
             
         </div>
          
      </div>
      
      <div class="form-group">
         <label class="control-label col-sm-2">Pssword: </label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="password" placeholder="Enter Sample Password">
             
         </div>
          
      </div>
      
      
      <div class="form-group">
         
         <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default"  value="A D D">
             
         </div>
          
      </div>
       
   </form>
    
</div>














<?php include('footer.php'); ?>

