<?php
  
  function count_id(){
    static $count = 1;
    return $count++;
  }

    session_start();
    include "../models/connection.php";

    include "../admin/page/header.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
    //         case 'contact':
    //             include "../admin/page/contact.php";
    //             break;

            case 'page_admin':
                include "page/home.php";
                break;

            case 'page_loaisp':
                include "productCate/index_lsp.php";
                break;
    
            case 'page_add_loaisp':
                include "productCate/add_lsp.php";
                break;
    
            case 'page_edit_loaisp':
                include "productCate/edit_lsp.php";
                break;

            case 'page_sp':
                include "product/index_sp.php";
                break;
            
            case 'page_add_sp':
                include "product/add_sp.php";
                 break;

            case 'page_edit_sp':
                include "product/edit_sp.php";
                break;

            case 'page_khachhang':
                include "customer/index_kh.php";
                break;

            case 'page_edit_kh':
                include "customer/edit_kh.php";
                break;

            case 'page_donhang':
                include "order/index_hd.php";
                break;
            
            case 'page_logout':
                include "login_admin.php";
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