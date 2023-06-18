<?php 

include_once '../config/database.php';

include('header.php'); 

$db = new Database();


if(isset($_GET['deleteID'])){
    $did = $_GET['deleteID'];
    
    $isql = "select * from employee where id = '$did'";
    $iresult = $db->select($isql);
    
    if($iresult){
        while($row = mysqli_fetch_assoc($iresult)){
            $img = $row['photo'];
            unlink($img);
        }
    }
    
    
    $del_sql = "delete from employee where id = '$did'";
    
    $del = $db->delete($del_sql);
    
    if($del){
        header("location: manage_employee.php");
    }else{
        echo "<script>
        alert('Delete Failed!!');
        </script>";
    }
}




?>




<!-- Content div section -->

<div class="col-md-9">


    <h4 id="conH">Manage Employee</h4>

    <div class="card shadow">

        <a href="add_new_employee.php" class="btn btn-info">Add New Employee</a>

        <div class="card-header">

            <div class="row">
                <div class="col-md-6">
                    <h3>All Employees</h3>

                </div>

            </div>

        </div>



        <div class="card-body">


            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
                
                
                <?php
                
                $query = "select * from employee";
                $result = $db->select($query);
                
                
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                        
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['email'];?></td>
                    <td><?=$row['phone'];?></td>
                    <td><?=$row['address'];?></td>
                    <td><?=$row['position'];?></td>
                    
                    <td><img src="<?=$row['photo'];?>" style="width:100px;"></td>
                    
                    <td>
                        <a href="?deleteID=<?=$row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                    </td>
                    

                </tr>    
                        
                        
                        
                        
                        
                        
                    <?php    
                    }
                }
                
                
                
                ?>
                
                


            </table>

        </div>

    </div>


</div>










<?php include('footer.php'); ?>
