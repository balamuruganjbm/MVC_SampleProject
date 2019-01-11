<?php
class Details extends Controller{
    public function getdetails(){
        require 'C:\xampp\htdocs\mvc_guvi_task\app\models/PDOconfig.php';
        $fname = htmlspecialchars($_POST['fname']);
        $lname= htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $cname= htmlspecialchars($_POST['cname']);
        $designation = htmlspecialchars($_POST['designation']);
        $salary = htmlspecialchars($_POST['salary']);
        $phno = htmlspecialchars($_POST['phno']);

        
            if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                header("Location: ../Users/getdetails");                 
            } 
            elseif(filter_var($salary,FILTER_VALIDATE_INT)===false){
                header("Location: ../Users/getdetails");                 
            }
            elseif(strlen($phno)!=10){
                header("Location: ../Users/getdetails");                 
            }    
            else{
            
                //PREPARED STATEMENTS USING NAMED PARAMS METHOD
                $sql = 'INSERT INTO userdetails(firstname,lastname,email,companyname,designation,salary,phno) VALUES (:firstname,:lastname,:email,:companyname,:designation,:salary,:phno)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['firstname'=>$fname,'lastname'=>$lname,'email'=>$email,'companyname'=>$cname,'designation'=>$designation,'salary'=>$salary,'phno'=>$phno]);
                
                //INSERT TO JSON FILE
                if(file_exists('../app/views/userdetails.json')){
                    $current_data = file_get_contents('../app/views/userdetails.json');
                    $array_data = json_decode($current_data,true);
                    $extra = array(
                        'firstname'=>$fname,
                        'lastname'=>$lname,
                        'email'=>$email,
                        'companyname'=>$cname,
                        'designation'=>$designation,
                        'salary'=>$salary,
                        'phno'=>$phno
                    );
                    $array_data[]=$extra;
                    $final_data = json_encode($array_data);
                    if(file_put_contents('../app/views/userdetails.json',$final_data));
                    {
                        header("Location: ../Users/showdetails");
                    }
                }
                else{
                    header("Location: ../Users/getdetails");
                }          
            }
        
    }
    }

?>