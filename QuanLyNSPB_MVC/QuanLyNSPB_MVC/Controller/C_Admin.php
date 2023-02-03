<?php
    include_once("../Model/M_Admin.php");
    class Controller_Admin{
        public function invoke(){
            if(isset($_GET["modLogin"])){
                include_once("../View/loginForm.html");
            }
            if(isset($_POST["btn-login"])){
                $username =  $_REQUEST["username"];
                $password =  $_REQUEST["userpw"];
                $modelAdmin = new Model_Admin();
                $result = $modelAdmin->XulyLogin($username,$password);
               
                if($result){
                    header("Location:../View/index_Admin.html");
                }
                else{
                    header("Location:../View/loginForm.html");
                }
            }
        }
    }
    $C_Admin = new Controller_Admin();
    $C_Admin->invoke();
?>