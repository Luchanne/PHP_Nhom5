<?php
    session_start();
    include "../models/connection.php";

    include "../admin/page/header.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {

            case 'page_loaisp':
                include "productCate/index.php";
                break;
    
            case 'page_add_loaisp':
                include "productCate/add.php";
                break;
    
            case 'page_edit_loaisp':
                include "productCate/edit.php";
                break;

            case 'page_sp':
                include "product/index.php";
                break;

            case 'page_add_sp':
                include "product/add.php";
                break;

            case 'page_edit_sp':
                include "product/edit.php";
                break;

            default:
                include "../admin/page/home.php";
                break;
        }
    }else {
        include "../admin/page/home.php";
    }
    include "../admin/page/footer.php";
?>