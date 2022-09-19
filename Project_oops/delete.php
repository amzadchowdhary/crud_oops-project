<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ads_id=$_POST['delete'];
    include '_dbconnect.php';
  class Delete extends Database {
    
    public function deleteUser($ads_id){   
        
      $sql =  "DELETE FROM `ads` WHERE `ads`.`Sno` = $ads_id";        
      $stmt=$this->getConnection()->query($sql); 
      $delete=true;
      header("location: welcome.php");
    }
}
$delete=new Delete();
$delete=$delete->deleteUser($ads_id);
}