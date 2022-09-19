<?php
session_start();
session_destroy();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email=$_POST['email'];
    $password=$_POST['password']; 

    
  include '_dbconnect.php';
  class SignIn extends Database {
    

    public function signinUser($email,$password){   
        
        $sql = "SELECT * FROM `ads_users` WHERE  `email`='$email'";        
        $stmt=$this->getConnection()->query($sql); 
        
        if($stmt->num_rows==0){            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> User account not registered with us, please register!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          return false;
        }
        
        $passwordHash=$stmt->fetch_all(MYSQLI_ASSOC);
        $checkpassword=password_verify($password,$passwordHash[0]["password"]);
        
        if(!$checkpassword){            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Wrong!</strong> password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          return false;
        }else{
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;
            // $id = $this->getLoggedInUserId();
            // $_SESSION['user_id'] = $id;            
            header("location: welcome.php");
        }
    }
}
$signin=new Signin();
$result=$signin->signinUser($email,$password);

}
include "signin.php";
?>