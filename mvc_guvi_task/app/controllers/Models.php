<?php
    class Models extends Controller{
        public function PDOregister(){
        require 'C:\xampp\htdocs\mvc_guvi_task\app\models/PDOconfig.php';
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        if(!empty($username)&&!empty($password)&&!empty($email)){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                header("Location: ../Users/register");                 
            }    
            else{
                //PREPARED STATEMENTS USING NAMED PARAMS METHOD
                $sql = 'INSERT INTO userdata(username,email,password) VALUES (:username,:email,:password)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['username'=>$username,'email'=>$email,'password'=>$password]);
        
                header("Location: ../Users/login"); 
            }
        }
        else{
            header("Location: ../Users/register");
        }
        }
        public function PDOlogin(){
            require 'C:\xampp\htdocs\mvc_guvi_task\app\models/PDOconfig.php';
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            if(!empty($email)&&!empty($password)){    
            //PREPARED STATEMENTS USING NAMED PARAMS METHOD
            $sql = 'SELECT * FROM userdata where email=:email && password=:password';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email'=>$email,'password'=>$password]);
            $row = $stmt->fetchAll();
            if($stmt->rowCount()>0)
            {
                //SESSION STARTS
                session_start();
                $_SESSION['name']=$row[0]->username;
                $_SESSION['email']=$row[0]->email;
                header("Location: ../Users/getdetails");
            }
            else{
                header("Location: ../Users/login");
            }
        }
        else{
            header("Location: ../Users/login");
        }
    }
    public function PDOgetdetails(){
        
    }
}
?>