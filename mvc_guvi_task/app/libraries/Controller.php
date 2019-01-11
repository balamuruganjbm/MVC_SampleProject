<?php
    class Controller{
        public function view($view){
            
            if($view=='main'){
                require_once '../app/views/'.$view.'.js';
            }
            else{
            if(file_exists('../app/views/'.$view.'.html')){
                require_once '../app/views/'.$view.'.html';
            }
            else{
                die("file does not exist");
            }
            }
        }
    }
?>