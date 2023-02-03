<?php
    include_once("E_Admin.php");
    class Model_Admin{
        public function XulyLogin($username, $password){
            $link=mysqli_connect('localhost','root','') or die("Couldn't connect to database'");
            $db_selected = mysqli_select_db($link,'dulieu');
            $query = 'select * from admin where username = "'.$username.'" and password = "'.$password.'"';
            $result = mysqli_query($link,$query); 
            // $admin = [];
            if(mysqli_fetch_row($result)){
                echo "co tai khoan";
                $row = mysqli_fetch_row($result);
                // $admin = new Entity_Admin($row["Id"],$row["username"],$row["password"]);
                return true;
            }
            
            mysqli_free_result($result);
            mysqli_close($link);
            return false;
        }
    }
    
?>