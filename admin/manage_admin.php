<?php 

include_once '../config/database.php';

include('header.php'); 

$db = new Database();




if(isset($_GET['deleteID'])){

    $dId = $_GET['deleteID'];

    $del_sql = "delete from admin where id = '$dId'";
    $del = $db->delete($del_sql);
    
    
    if($del){
        header("location: manage_admin.php");
    }else{

        echo "<script>
            alert('Delete Failed!!');
            </script>";
    }

}






?>




<!-- Content div section -->

<div class="col-md-9">


    <h4 id="conH">Manage Admin</h4>

    <div class="card shadow">

        <a href="add_admin.php" class="btn btn-info">Add New Admin</a>

        <div class="card-header">

            <div class="row">
                <div class="col-md-6">
                    <h3>All Admin</h3>

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
                    <th>Action</th>

                </tr>


                <?php
                
                $query = "select * from admin";
                $result = $db->select($query);


                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>

                    <?php
                    
                    if($row['id'] == 1){
                    ?>

                        <td><a href="" class="btn btn-danger disabled">Delete</a></td>

                    <?php

                    }else{

                    ?>

                        <td><a href="?deleteID=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>

                    <?php

                    }
                    
                    
                    ?>


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
