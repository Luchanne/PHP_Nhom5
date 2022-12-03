<?php
    session_start();
    include "./models/connection.php";

    include "../user/page/header.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {

            case 'timkiem':
                include "page/timkiem.php";
                break;
    
            case 'theloai':
                include "page/theloai.php";
                break;
    
            case 'taikhoan':
                include "page/taikhoan.php";
                break;

            case 'chitiet':
                include "page/chitiet.php";
                break;

            case 'giohang':
                include "page/giohang.php";
                break;
            
            case 'themgiohang':
                include "page/addtocart.php";
                break;

            case 'chinhsua':
                include "page/updatecart.php";
                break;
            
            case 'sua':
                include "page/suakh.php";
                break;

            case 'thongtin':
                include "page/thongtin.php";
                break;

            case 'baitap':
                include "page/baitap.php";
                break;

            case 'dathang':
                include "page/dathang.php";
                break;

            case 'donhang':
                include "page/donhang.php";
                break;
            
            case 'donhangdadat':
                include "page/donhangdadat.php";
                break;

            case 'chitietdonhang':
                include "page/chitietdonhang.php";
                break;

            default:
                include "../user/page/home.php";
                break;
        }
    }else {
        include "../user/page/home.php";
    }

    include "../user/page/footer.php";
?>