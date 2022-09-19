<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ads_id=$_POST['submit'];
    $title=$_POST['title1'];
    $description=$_POST['description1'];
    $user_email=$_POST['user_email'];
    
    include '_dbconnect.php';
  class Edit extends Database {
    

    public function editUser($title,$description,$ads_id){   
        
        $sql =  "UPDATE `ads` SET `Title` = '$title', `Description` = '$description' WHERE `ads`.`Sno` = $ads_id;";        
        $stmt=$this->getConnection()->query($sql);        
        header("location: welcome.php");
    }
}
$edit=new Edit();
$edit=$edit->editUser($title,$description,$ads_id );
}