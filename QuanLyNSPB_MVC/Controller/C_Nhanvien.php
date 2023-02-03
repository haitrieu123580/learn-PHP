<?php
    include_once("../Model/M_Nhanvien.php");
    class Controller_Nhanvien{
        public function invoke(){
            if(isset($_GET["modXemThongTinNV"])){
                // echo "chon chuc nang xem thong tin nhan vien";
                $modelNhanvien = new Model_Nhanvien();
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                include_once("../View/NhanvienList.html");
            }
            if(isset($_GET["modXemThongTinNVPB"])){
                $IDPB = $_GET["modXemThongTinNVPB"];
                $modelNhanvien = new Model_Nhanvien();
                $NVPBList = $modelNhanvien->getNVbyIDPB($IDPB);
                include_once("../View/NhanvienPhongban.html");
            }
            if(isset($_GET["modTimkiemNhanvien"])){
                include_once("../View/Timkiem.html");
            }
            if(isset($_REQUEST["btn-Timkiem"])){
                $type = $_REQUEST['type'];
                $txt = $_REQUEST["txt-input"];
                $modelNhanvien = new Model_Nhanvien();
                $resultList = $modelNhanvien->searchNhanvien($type,$txt);
                include_once("../View/KetquaTimkiem.html");
            }
            if(isset($_REQUEST["btn-themnhanvien"])){ 
                $IDNV= $_REQUEST['IDNV'];
                $Hoten= $_REQUEST['Hoten'];
                $Diachi= $_REQUEST['Diachi'];
                $IDPB= $_REQUEST['IDPB'];
                if( $IDNV=="" ||  $Hoten ==""||$Diachi==""|| $IDPB==""){
                   echo "khong hop le";
                }else{
                $modelNhanvien = new Model_Nhanvien();
                $modelNhanvien->XulyThemNhanvien($IDNV,$Hoten,$IDPB,$Diachi);
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                include_once("../View/NhanvienList.html");
                }
            }
            if(isset($_REQUEST["modXoaNhanvien"])){
                $modelNhanvien = new Model_Nhanvien();
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                include_once("../View/TableXoaNhanvien.html");
            }
            if(isset($_REQUEST["XoaIDNV"])){
                $IDNV = $_REQUEST["XoaIDNV"];
                $modelNhanvien = new Model_Nhanvien();
                $modelNhanvien->XoaNhanVien($IDNV);
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                include_once("../View/TableXoaNhanvien.html");
            }
            if(isset($_REQUEST["modXoaAllNhanvien"])){
                $modelNhanvien = new Model_Nhanvien();
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                include_once("../View/TableXoaAllNhanvien.html");
            }
            if(isset($_POST["btn-xoatatca"])){
                $modelNhanvien = new Model_Nhanvien();
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                $i=0;
                while($i<sizeof($nhanvienList)){
                    if(isset($_REQUEST[$nhanvienList[$i]->IDNV])){
                            $IDNV = $_REQUEST[$nhanvienList[$i]->IDNV];
                            $modelNhanvien->XoaNhanvien($IDNV);
                    }
                    $i++;
                }
                $nhanvienList = $modelNhanvien->getAllNhanvien();
                include_once("../View/NhanvienList.html");
            }
        }
    }
    $C_Nhanvien = new Controller_Nhanvien();
    $C_Nhanvien->invoke();
?>