<?php
if(!isset($_SESSION)) 
{ 
    session_start();
    $loguser = $_SESSION['name'];
    $logmail = $_SESSION['email'];
    
}
?>