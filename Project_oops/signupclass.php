<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        
        include "_dbconnect.php";
        class SignUp extends Database {
            private $name;
            private $email;
            private $password;
            private $cpassword;
        
            public function __construct($name,$email,$password, $cpassword){
                $this->name=$name;
                $this->email=$email;
                $this->password=$password;
                $this->cpassword=$cpassword;           
            }
        
        
            public function signupUser(){
                if($this->emptyInput()){echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Please fill All fields..!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    return false;
                }
        
                if(!$this->validatename()){echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Invalid name please use enter only characters with space..!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    return false;
                }
        
        
                if(!$this->validatemail()){
                    echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Invalid email address..!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    return false;
                }
        
                if(!$this->passwordMatch()){echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Password do not match..!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    return false;
                }
                
                                   
                $this->insertUser($this->name,$this->email,$this->password);
                
                
                
        
        
            }
        
            private function emptyInput(){
                $result;
                if(empty($this->name)||empty($this->email)||empty($this->password)||empty($this->cpassword)){           
                    $result=true;            
                }
                else{
                   $this->name=$this->test_input($this->name);
                   $this->email=$this->test_input($this->email);
                   $this->password=$this->test_input($this->password);
                   $this->cpassword=$this->test_input($this->cpassword);
                    $result=false;            
                }
                return $result;
            }
        
            private function validatename(){
                $result;
                if(!preg_match("/^[a-zA-Z ]*$/", $this->name)){
                    $result =false;            
                }
                else {
                    $result = true;
                }
                return $result;
            }
        
            private function validatemail(){
                $result;
                if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                    $result=false;            
                }
                else{
                    $result=true;
                }
                return $result;
            }
        
            private function passwordMatch(){
                $result;
                if($this->password !== $this->cpassword){
                    $result=false;            
                }
                else{
                    $result=true;
                }
                return $result;
            }
        
            private function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        
            private function insertUser($name,$email,$password){   
                $hash=password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `ads_users` ( `name`, `email`, `password`) VALUES ( '$name', '$email', '$hash')";
                
                if($this->getConnection()->query($sql)==true){                              
                  header("location: signin.php");                
                }
                else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> User not registered pleace try with other email address Or Try to login you may already have created account with us!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                  }
            }
        
        
        }
        
        $signup=new Signup($name,$email,$password,$cpassword);
        $signup=$signup->signupUser();
        
         
    }
    include "signup.php";
?>