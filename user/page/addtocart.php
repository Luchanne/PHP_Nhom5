<?php
    
        if(!isset($_SESSION['id_kh']) || $_SESSION['id_kh'] == "")
        {
            echo "<script> location.href='login_page.php'; </script>";
            exit;
        }else{
            if(isset($_POST['giohang'])){
                $sl=$_POST['sl'];
                $id_sp=$_POST['id_sp'];
            }
            $id_kh=$_SESSION['id_kh'];
            $sql_kt= "SELECT * FROM giohang WHERE id_sp='$id_sp' AND id_kh='$id_kh'";
            $query_kt = mysqli_query($conn,$sql_kt);
            $row_kt = mysqli_num_rows($query_kt);
            if($row_kt>0){
                $sql = "UPDATE giohang SET sl=sl+'$sl' WHERE id_sp='$id_sp' AND id_kh='$id_kh'";
            }
            else $sql = "INSERT into giohang (id_kh, id_sp, sl)
                    VALUES ('$id_kh', '$id_sp', '$sl')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['thongbao'] = "Thêm sản phẩm thành công";
                echo "<script> location.href='index.php?act=giohang'; </script>";
                exit;
            } else{
                $_SESSION['thongbao'] = "Thêm sản phẩm thất bại";
                echo "<script> history.go(-1) </script>";
                exit;
            }
        }
?>