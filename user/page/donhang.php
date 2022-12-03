<?php
    if((!isset($id_kh)) or ($id_kh=="")){
        echo "<script> location.href='login_page.php'; </script>";
        exit;
    }
    if(isset($_POST['xndh'])){
        if(!(isset($_SESSION["dathang"])) || !(is_array($_SESSION["dathang"]))){
            echo "<script> location.href='index.php?act=giohang'; </script>";
            exit;
        }
        $tongtien = $_POST['tongtien'];
        $date = getdate();
        $nam = $date["year"];
        $thang = $date["mon"];
        $ngay = $date["mday"];
        $ngaytt="$nam-$thang-$ngay";
        $sql_hd = "INSERT into hoadon (id_kh, tongtien, ngaythanhtoan)
                        VALUES ('$id_kh', '$tongtien', '$ngaytt')";
        if(mysqli_query($conn,$sql_hd)){
            $sql_hdkh = "SELECT * FROM hoadon WHERE id_kh='$id_kh' ORDER BY id_hd DESC";
            $query_hdkh = mysqli_query($conn,$sql_hdkh);
            $row_hdkh = mysqli_fetch_array($query_hdkh);
            $id_hd = $row_hdkh["id_hd"];
            $dem = 0;
            for($i=0;$i<sizeof($_SESSION['dathang']);$i++){
                $id_sphd = $_SESSION["dathang"][$i][0];
                $don_gia = $_SESSION["dathang"][$i][3];
                $so_luong = $_SESSION["dathang"][$i][4];
                $sql_cthd = "INSERT into cthoadon (id_hd, id_sp, don_gia, so_luong)
                        VALUES ('$id_hd', '$id_sphd', '$don_gia', '$so_luong')";
                if(mysqli_query($conn,$sql_cthd)){
                    $dem++;
                    $sql_xgh = "DELETE FROM giohang WHERE id_sp='$id_sphd' AND id_kh='$id_kh'";
                    mysqli_query($conn,$sql_xgh);
                }
            }
            if($dem==sizeof($_SESSION['dathang']))
            {
                unset($_SESSION['dathang']);
                echo "Đặt hàng thành công";
                echo "<script> location.href='index.php?act=donhangdadat'; </script>";
                exit;
            }
        }
    }else{
        echo "<script> location.href='index.php?act=giohang'; </script>";
        exit;
    }

?>