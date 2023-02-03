<?php
    include_once("E_Nhanvien.php");
    class Model_Nhanvien{
        public function __construct()
        {
            
        }
        public function getAllNhanvien(){
            $link = mysqli_connect('localhost', 'root', '') or die('could not connewct to database');
            $db_selected = mysqli_select_db($link, 'dulieu');
            $sql = 'select * from nhanvien';
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $nhanvien[$i] = new Entity_Nhanvien($row['IDNV'],$row['Hoten'],$row['IDPB'],$row['Diachi']);
                $i ++;
            }
           
            mysqli_free_result($result);
            mysqli_close($link);
            return $nhanvien;
        }
        public function getNVbyIDPB($IDPB){
            $link = mysqli_connect('localhost', 'root', '');
            $db_selected = mysqli_select_db($link, 'dulieu');
            $query = 'select * from nhanvien where IDPB = "'.$IDPB.'"';
            $result = mysqli_query($link, $query);
            $i=0;
            while ($row = mysqli_fetch_array($result)) {
                $NVPBList[$i] = new Entity_Nhanvien($row['IDNV'],$row['Hoten'],$row['IDPB'],$row['Diachi']);
                $i ++;
            }            
            mysqli_free_result($result);
            mysqli_close($link);
            return $NVPBList;
        }

        public function searchNhanvien($type,$txt){ 
            $link = mysqli_connect('localhost', 'root', '') or die('could not connewct to database');
            $db_selected = mysqli_select_db($link, 'dulieu');
            if($type=="IDNV"){
                $query = 'select * from nhanvien where IDNV = "'.$txt.'"';
            }
            else{
                $query = 'select * from nhanvien where '.$type.' like "'.$txt.'"';
            }
            $result = mysqli_query($link, $query);
            $nhanvien = [];
            if ($result) {
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                $nhanvien[$i] = new Entity_Nhanvien($row['IDNV'],$row['Hoten'],$row['IDPB'],$row['Diachi']);
                $i ++;
                }
                mysqli_free_result($result);
            }
            
           
           
            mysqli_close($link);
            return $nhanvien;
        }
        public function XulyThemNhanvien($IDNV,$Hoten,$IDPB,$Diachi){
            $link=mysqli_connect('localhost','root','') or die("Couldn't connect to database'");
            $db_selected = mysqli_select_db($link,'dulieu');
           
            $sql = 'select * from nhanvien where IDNV = "'.$IDNV.'"';
            $result= mysqli_query($link, $sql);
            if($row = mysqli_fetch_row($result)){
                echo "Da co nhan vien nay!";
                mysqli_free_result($result);
            }
            else {
                $sql="INSERT INTO nhanvien (IDNV, Hoten, IDPB, Diachi) VALUES ('$IDNV', '$Hoten', '$IDPB', '$Diachi')";
                $result = mysqli_query($link,$sql); 
            }
            mysqli_close($link);
        }
        public function XoaNhanvien($IDNV){
            $link=mysqli_connect('localhost','root','') or die("Couldn't connect to database'");
            $db_selected = mysqli_select_db($link,'dulieu');
            $sql="DELETE FROM nhanvien WHERE IDNV = '$IDNV'";
            $result = mysqli_query($link,$sql); 
            mysqli_close($link);
        }
        public function XoaTatca(){
            
        }
    }
?>