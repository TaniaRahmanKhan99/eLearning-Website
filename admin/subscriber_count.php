<?php 


include_once '../config/database.php';

include('header.php');


$db = new Database();



?>


<!-- Content div section -->


<div class="col-md-9">

    <div class="card shadow">

        <div class="card-header">

            <div class="row">
                <div class="col-md-6">

                    <h3>Total Subscriber</h3>

                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-sm-12">

                    <?php
                    
                    $sql = "select count(*) as totalSubs from subscriber";
                    
                    $result = $db->select($sql);
                    
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            
                        echo "<p id='count'>". $row['totalSubs']."</p>";   
                            
                        }
                    }
                    
                    
                    ?>

                    

                </div>

            </div>

        </div>





    </div>



</div>










<?php 

include('footer.php');

?>
