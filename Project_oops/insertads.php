<?php
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $file=$_FILES['banner_image'];
    $user_email=$_POST['user_email'];
 
    include '_dbconnect.php';
    class Insert extends Database{

   public function insertAds($title,$description,$file,$user_email){

    $fileName=$file['name'];
    $tempname=$file['tmp_name'];
    $fileSize=$file['size'];
    $fileError=$file['error'];
    $fileType=$file['type'];
    $folder=explode('.',$fileName);
    $folderActualExt=strtolower(end($folder));
    $allowed=array('jpg','jpeg', 'png','gif'); 

    $userId = $_SESSION['user_id'];
    
    if(in_array($folderActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<1000000){
                $fileNameNew=uniqid('',true).".".$folderActualExt;
                $fileDestination='uploads/'.$fileNameNew;
                move_uploaded_file($tempname,$fileDestination);
                $sql="INSERT INTO `ads` (`Title`, `Description`,`URL` ,`user_email` ) VALUES ( '$title', '$description','$fileDestination','$user_email');";
                
                $resultads=$this->getConnection();                
                $resultads=$resultads->query($sql);                
                session_start();
                $_SESSION['ads']=true;
                header("location: welcome.php");
            }else{
                echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>Error!</strong> Your File is too big!!
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>';
            }
        }else{
            echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Error!</strong> There was an Error uploading your file!
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
        }
    }else{
        echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> You cannot upload files of this type!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    
  }
}


$insert=new Insert();
$insert->insertAds($title,$description,$file,$user_email);
}
include 'advertise.php';?>