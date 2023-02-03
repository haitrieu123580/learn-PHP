<?php
    include_once("../Model/E_Phongban.php");
    class Model_Phongban{
        public function getAllPhongBan(){
            $link = mysqli_connect('localhost', 'root', '');
            $db_selected = mysqli_select_db($link, 'dulieu');
            $query = 'select * from phongban';
            $result = mysqli_query($link, $query);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $phongban[$i] = new Entity_Phongban($row['IDPB'],$row['Tenpb'],$row['Mota']);
                $i++;
            }
          
            mysqli_free_result($result);
            mysqli_close($link);
            return $phongban;
        }
        public function XulyThemPhongban($IDPB,$Tenpb,$Mota){
            
            $link=mysqli_connect('localhost','root','') or die("Couldn't connect to database'");
            $db_selected = mysqli_select_db($link,'dulieu');
            $sql = 'select * from phongban where IDPB = "'.$IDPB.'"';
            $result= mysqli_query($link, $sql);
           
            if($row = mysqli_fetch_row($result)) {
                echo 'Da co phong ban nay!';
                mysqli_free_result($result);
            }
            else {
                $sql="INSERT INTO phongban (IDPB, Tenpb, Mota) VALUES ('$IDPB', '$Tenpb', '$Mota')";
                $result = mysqli_query($link,$sql); 
            }   
            mysqli_close($link);
        }
        public function getPhongbanByIDPB($IDPB){
            $link = mysqli_connect('localhost', 'root', '');
            $db_selected = mysqli_select_db($link, 'dulieu');
            $query = 'select * from phongban where IDPB = "'.$IDPB.'"';
            $result = mysqli_query($link, $query);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $phongban[$i] = new Entity_Phongban($row['IDPB'],$row['Tenpb'],$row['Mota']);
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($link);
            return $phongban;
        }
        public function CapnhatPhongban($IDPB,$Tenpb,$Mota){
            $link = mysqli_connect('localhost', 'root', '');
            $db_selected = mysqli_select_db($link, 'dulieu');
            $query =' update phongban
                    set Tenpb ="'. $Tenpb.'" ,  Mota = "'.$Mota.'"
                    where IDPB ="'.$IDPB.'"' ;
            $result = mysqli_query($link, $query);
            mysqli_close($link);
        }
      
    }
?>