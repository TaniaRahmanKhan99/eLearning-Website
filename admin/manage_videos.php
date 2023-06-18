<?php 

include_once '../config/database.php';

include('header.php'); 

$db = new Database();




if(isset($_GET['deleteID'])){

    $dId = $_GET['deleteID'];

    $del_sql = "delete from videos where video_id = '$dId'";
    $del = $db->delete($del_sql);
    
    
    if($del){
        header("location: manage_videos.php");
    }else{

        echo "<script>
            alert('Delete Failed!!');
            </script>";
    }

}






?>




<!-- Content div section -->

<div class="col-md-9">


    <h4 id="conH">Manage Videos</h4>

    <div class="card shadow">


        <div class="card-header">

            <div class="row">
                <div class="col-md-6">
                    <h3>Video List</h3>

                </div>

            </div>

        </div>



        <div class="card-body">


            <table class="table table-bordered">

                <tr>
                    <th>Video ID</th>
                    <th>Video Title</th>
                    <th>Posted On</th>
                    <th>Action</th>

                </tr>
                
                <?php
                
                $query = "select * from videos order by video_id desc";
                $result = $db->select($query);


                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        
                    $datetime = strtotime($row['date']);
                    $date = date("d M, Y", $datetime);
                    
                        
                ?>    
                        
                <tr>
                    <td><?=$row['video_id']?></td>
                    <td><?=$row['video_title']?></td>
                    <td><?=$date?></td>
                    <td><a href="?deleteID=<?=$row['video_id']?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
                
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
