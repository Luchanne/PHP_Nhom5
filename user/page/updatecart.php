<?php
        if(!isset($_SESSION['id_kh']) || $_SESSION['id_kh'] == "")
        {
            echo "<script> location.href='login_page.php'; </script>";
            exit;
        }else{
            $id_kh=$_SESSION['id_kh'];
            if(isset($_POST['dathang'])){
                $sql_kt= "SELECT * FROM giohang WHERE id_kh='$id_kh'";
                $query_kt = mysqli_query($conn,$sql_kt);
                $i=0;
                if(isset($_SESSION['dathang']))  unset($_SESSION['dathang']);
                $_SESSION['dathang']=[];
                while($row_kt=mysqli_fetch_array($query_kt)){
                    $check=$row_kt['id_sp'];
                    if(isset($_POST["$check"]))
                    {
                        $sql_dh = "SELECT giohang.id_sp, sanpham.anh, sanpham.ten, sanpham.gia, giohang.sl FROM giohang, sanpham WHERE sanpham.id_sp=giohang.id_sp AND giohang.id_sp='$check' AND giohang.id_kh='$id_kh'";
                        $query_dh = mysqli_query($conn,$sql_dh);
                        $row_dh = mysqli_fetch_array($query_dh);
                        $id_sp = $row_dh["id_sp"];
                        $anh = $row_dh["anh"];
                        $ten_sp = $row_dh["ten"];
                        $gia = $row_dh["gia"];
                        $sl = $row_dh["sl"];
                        $sp = [$id_sp,$anh,$ten_sp,$gia,$sl];
                        $_SESSION['dathang'][]=$sp;
                        $i++;
                    }
                }
                if($i==0){
                    $_SESSION['thongbao'] = "Không có sản phẩm được chọn";
                    echo "<script> location.href='index.php?act=giohang'; </script>";
                    exit;
                }
                echo "<script> location.href='index.php?act=dathang'; </script>";
                exit;
             }else{
                if(isset($_POST['xoa'])){
                    $sql_kt= "SELECT * FROM giohang WHERE id_kh='$id_kh'";
                    $query_kt = mysqli_query($conn,$sql_kt);
                    $i=0;
                    while($row_kt=mysqli_fetch_array($query_kt)){
                        $check=$row_kt['id_sp'];
                        if(isset($_POST["$check"]))
                        {
                            $sql="DELETE FROM giohang WHERE id_sp='$check' AND id_kh='$id_kh'";
                            if (mysqli_query($conn, $sql)) {
                                $_SESSION['thongbao'] = "Xóa sản phẩm thành công";
                                $i++;
                            }
                        }
                    }
                    if($i==0){
                        $_SESSION['thongbao'] = "Không có sản phẩm được chọn";
                    }
                    echo "<script> location.href='index.php?act=giohang'; </script>";
                    exit;
                }else{
                    $id_sp=$_GET['id'];
                    $sql_kt= "SELECT * FROM giohang WHERE id_sp='$id_sp' AND id_kh='$id_kh'";
                    $query_kt = mysqli_query($conn,$sql_kt);
                    $row_sp= mysqli_fetch_array($query_kt);
                    if($_GET['update']=="giam"){
                        if($row_sp['sl']==1)
                        {
                            $sql="DELETE FROM giohang WHERE id_sp='$id_sp' AND id_kh='$id_kh'";
                            if (mysqli_query($conn, $sql)) {
                                $_SESSION['thongbao'] = "Xóa sản phẩm thành công";
                                echo "<script> location.href='index.php?act=giohang'; </script>";
                                exit;
                            }
                        }
                        else{
                            $sql = "UPDATE giohang SET sl=sl-1 WHERE id_sp='$id_sp' AND id_kh='$id_kh'";
                            if (mysqli_query($conn, $sql)) {
                                //$_SESSION['thongbao'] = "";
                                echo "<script> location.href='index.php?act=giohang'; </script>";
                                exit;
                            }
                        }
                    }
                    else{
                        if($_GET['update']=='tang'){
                            $sql = "UPDATE giohang SET sl=sl+1 WHERE id_sp='$id_sp' AND id_kh='$id_kh'";
                            if (mysqli_query($conn, $sql)) {
                                //$_SESSION['thongbao'] = "";
                                echo "<script> location.href='index.php?act=giohang'; </script>";
                                exit;
                            }
                        }
                        else{
                            echo "<script> location.href='index.php?act=giohang'; </script>";
                            exit;
                        }
                    }
                }
            }
        }
?>