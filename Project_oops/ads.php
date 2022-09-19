<?php

    include "_dbconnect.php";

    class Ads extends Database {
        public function userAds(){
        $sql = "SELECT * FROM `ads` ";            
                           
        $result =$this->getConnection()->query($sql);
        
        $i=0;                                                                 
        if($result->num_rows>0){ 
            $row=$result->fetch_all(MYSQLI_ASSOC);   
            $length=count($row);    
        while($i<$length){       
   echo'<div class="col">
        <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="'.$row[$i]['URL'].'" />
            <rect width="100%" height="100%" fill="#55595c" />
            <text x="50%" y="50%" fill="#eceeef" dy=".3em"><strong>'.$row[$i]['Title'].'</strong></text>
            <div class="card-body">
                <p class="card-text" name="'.$row[$i]['Description'].'">'.$row[$i]['Description'].'</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">';
                        if(isset($_SESSION['email'])){
                        echo '<form method="POST" action="delete.php" enctype="multipart/form-data">
                            <div>
                                <button type="button" class="delete btn btn-sm btn-outline-secondary" name="delete"
                                    id="'.$row[$i]['Sno'].'">Delete
                                </button>
                            </div>
                            </form>
                            <form method="POST" action="edit.php" enctype="multipart/form-data">
                            <div>
                                <button type="button" class="edit btn btn-sm btn-outline-secondary" name="edit"
                                    id="'.$row[$i]['Sno'].'">Edit</button>
                            </div>
                            </from>';}
                
              echo '</div>
                    <small class="text-muted">'.$row[$i]['Time'].'</small>
                </div>
            </div>
        </div>
        </div>';            
            $i=$i+1;
        }
        }else{
            echo'<section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Album of Ads </h1>
                        <p class="lead text-muted">Be the first...! Help us to feature your Ads in our page..!</p>
                    </div>
                </div>
                </section>';
        }
          mysqli_close($this->conn);
        
        }
    }

?>