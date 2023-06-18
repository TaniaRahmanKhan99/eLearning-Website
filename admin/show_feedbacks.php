<?php 

include_once '../config/database.php';

include('header.php'); 

$db = new Database();




if(isset($_GET['deleteID'])){

    $dId = $_GET['deleteID'];

    $del_sql = "delete from feedback where f_id = '$dId'";
    $del = $db->delete($del_sql);
    
    
    if($del){
        header("location: show_feedbacks.php");
    }else{

        echo "<script>
            alert('Delete Failed!!');
            </script>";
    }

}






?>





<!-- Content div section -->

<div class="col-md-9">


    <h4 id="conH">Feedbacks</h4>

    <div class="card shadow">


        <div class="card-body">


            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Website</th>
                    <th>Message</th>
                    <th>Action</th>

                </tr>
                
                
                
                <?php
                
                $sql = "select * from feedback order by f_id desc";
                $result = $db->select($sql);
                
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                ?>    
                
                        
                <tr>
                    <td><?=$row['f_id']?></td>
                    <td><?=$row['f_name']?></td>
                    <td><?=$row['f_email']?></td>
                    <td><?=$row['f_website']?></td>
                    <td><?=$row['f_message']?></td>
                    <td>
                        <a href="?deleteID=<?=$row['f_id']?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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
