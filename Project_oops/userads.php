<?php

    include "_dbconnect.php";

    class userads extends Database {


        public function ads($user_email){
            
        $sql = "SELECT * FROM `ads` where `user_email`='$user_email'";            
                           
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
                    <div class="btn-group">
                        <form method="POST" action="delete.php" enctype="multipart/form-data">
                            <div>
                                <button type="submit" class="delete btn btn-sm btn-outline-secondary" name="delete"
                                    value="'.$row[$i]['Sno'].'">Delete
                                </button>
                            </div>
                        </form>
                        <div>
                                <button type="button" class="edit btn btn-sm btn-outline-secondary" name="edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit
                                </button>
                            </div><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 <form method="POST" action="edit.php" enctype="multipart/form-data">
                                 <div class="row">
                                 <input type="hidden" name="user_email" value="'.$_SESSION['email'].'">
                                 
                                 <div>Title : </div>
                                     <input type="text" name="title1" placeholder="Enter Advertisement Title" maxlength="50" size="50"
                                       required>    
                                  </div>
                                  <div class="row">
                                   <div>Description : </div>
                                    <textarea name="description1" maxlength="150" placehoder="Enter Advertisement Description Here"
                                       cols="39" required>
                                    </textarea>
                                  </div>                                  
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" name="submit" class="btn btn-primary" value="'.$row[$i]['Sno'].'">Save changes</button>
                                 </div>
                                </form>
                                </div>                                
                              </div>
                            </div>
                        </div>   
                    </div>
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