<?php
    class Users extends Controller{
        public function register(){
            $this->view('register');
        }
        public function login(){
            $this->view('login');
        }
        public function getdetails(){
            $this->view('getdetails');
        }
        public function showdetails(){
            $this->view('showdetails');
        }
        public function header(){
            $this->view('header');
        }
        public function main(){
            $this->view('main');
        }
    }
?>