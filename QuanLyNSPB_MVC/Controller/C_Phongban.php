<?php
    include("../Model/M_Phongban.php");
    class Controller_Phongban{
        public function invoke()
        {
            if(isset($_GET["modXemThongTinPB"])){
                $modelPhongban = new Model_Phongban();
                $phongbanList = $modelPhongban->getAllPhongBan();
                include_once("../View/PhongbanList.html");
            }
            if(isset($_GET["modThemNhanvien"])){
                $modelPhongban = new Model_Phongban();
                $phongbanList = $modelPhongban->getAllPhongBan();
                include_once("../View/ThemNhanvienForm.html");
            }
            if(isset($_GET["modThemPhongban"])){
                include_once("../View/ThemPhongbanForm.html");
            }
            if(isset($_POST["btn-themphongban"])){
                
                $IDPB= $_REQUEST['IDPB'];
                $Tenpb= $_REQUEST['Tenpb'];
                $Mota= $_REQUEST['Mota'];
                
                if( $IDPB=="" ||$Tenpb ==""||$Mota==""){
                    echo"khong hop le";
                    include_once("../View/ThemPhongbanForm.html");
                }else{
                    $modelPhongban = new Model_Phongban();
                    $modelPhongban->XulyThemPhongban($IDPB,$Tenpb,$Mota);
                    $phongbanList = $modelPhongban->getAllPhongBan();
                    include_once("../View/PhongbanList.html");
                }
            }
            if(isset($_GET["modCapnhatPhongban"])){
                $modelPhongban = new Model_Phongban();
                $phongbanList = $modelPhongban->getAllPhongBan();
                include_once("../View/CapnhatPhongbanTable.html");
            }
            if(isset($_GET["modCapnhatIDPB"])){
                $IDPB = $_REQUEST["modCapnhatIDPB"];
                $modelPhongban = new Model_Phongban();
                $phongban = $modelPhongban->getPhongbanByIDPB($IDPB);
                include_once("../View/FormCapnhatPhongban.html");
            }
            if(isset($_POST["btn-CapnhatPhongban"])){
                $Tenpb= $_REQUEST["Tenpb"];
                $Mota = $_REQUEST["Mota"];
                $IDPB =$_REQUEST["IDPB"];
                $modelPhongban = new Model_Phongban();
                $modelPhongban->CapnhatPhongban($IDPB,$Tenpb,$Mota);
                $phongbanList = $modelPhongban->getAllPhongBan();
                include_once("../View/PhongbanList.html");
            }
        }
    }
    $C_Phongban = new Controller_Phongban();
    $C_Phongban->invoke();
?>