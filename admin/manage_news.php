<?php 

include_once '../config/database.php';

include('header.php'); 

$db = new Database();


if(isset($_GET['deleteId'])){
    
    $did = $_GET['deleteId'];
    
    $isql = "select * from news where news_id = '$did'";
    $iresult = $db->select($isql);

    if($iresult){
        while($row = mysqli_fetch_assoc($iresult)){
            $img = $row['news_photo'];
            unlink($img);
        }
    }
    
    
    $del_sql = "delete from news where news_id = '$did'";
    $del = $db->delete($del_sql);
    
    if($del){
        header("location: manage_news.php");
    }else{
        echo "<script>
        alert('Delete Failed!!');
        </script>";
    }

}

?>








<!-- Content div section -->

<div class="col-md-9">


    <h4 id="conH">Manage News</h4>

    <div class="card shadow">

        <div class="card-header">

            <div class="row">
                <div class="col-md-6">
                    <h3>All News</h3>

                </div>

            </div>

        </div>



        <div class="card-body">


            <table class="table table-bordered">

                <tr>
                    <th>News ID</th>
                    <th>News Title</th>
                    <th>News Image</th>
                    <th>Posted On</th>
                    <th>Action</th>

                </tr>
                
                
                <?php
                
                $query = "select * from news order by news_id desc";
                $result = $db->select($query);
                
                
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        
                        $datetime = strtotime($row['news_date']);
                        
                        $date = date("d M, Y", $datetime);
                        
  
                    ?>
                     
                     
                     
                <tr>
                    <td><?=$row['news_id'];?></td>
                    <td><?=$row['news_title'];?></td>
                    <td><img src="<?=$row['news_photo'];?>" style="width:100px;"></td>
                    <td><?=$date;?></td>
                    <td>
                        <a href="#magicDiv<?=$row['news_id'];?>" class="fancybox btn btn-info ">View</a>
                        <a href="edit_news.php?id=<?=$row['news_id'];?>" class="btn btn-warning ">Edit</a>
                        <a href="?deleteId=<?=$row['news_id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger ">Delete</a>
                    </td>
                    

                </tr>
                      
                
                      
                            
                
                <div id="magicDiv<?=$row['news_id'];?>"  style="display:none; width:600px;">
                   
                   <h3><?=$row['news_title'];?></h3>
                   <h5><?=$date;?></h5>
                   
                   <img src="<?=$row['news_photo'];?>" width="400px">
                   
                   <p><?=$row['news_description'];?></p>
                    
                </div>      
                        
                        
                        
                        
                        
                    <?php    
                    }
                }
                
                
                
                ?>

                
                
                


            </table>

        </div>

    </div>


</div>










<?php include('footer.php'); ?>
