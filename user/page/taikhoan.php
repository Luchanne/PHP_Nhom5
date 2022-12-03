<?php
    if(isset($_POST['Logout'])){
        $_SESSION["id_kh"]="";
        $_SESSION["ten_kh"]="";
        echo "<script> location.href='index.php'; </script>";
        exit;
    }else{
        if(isset($_POST['Sua'])){
            echo "<script> location.href='index.php?act=sua'; </script>";
            exit;
        }
        $id_kh=$_SESSION["id_kh"];
        if((!isset($id_kh)) or ($id_kh=="")){
            echo "<script> location.href='login_page.php'; </script>";
            exit;
        }
        $sql_kh = "SELECT * FROM khachhang WHERE id_kh='$id_kh'";
        $query_kh = mysqli_query($conn,$sql_kh);
        $row_kh = mysqli_fetch_array($query_kh);
    }
?>
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Tài khoản<span>.</span></h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container">
            <form action="" class="checkout-form" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Thông tin tài khoản của bạn</h3>
                    </div>
                    <?php 
                        if(isset($_SESSION["thongbao"])&&($_SESSION["thongbao"]!="")){
                    ?>
                    <div class="col-lg-12">
                            <h5 style="text-align: center; color:red;"><?php echo $_SESSION["thongbao"];?></h5>
                    </div> 
                        <?php
                            $_SESSION["thongbao"]="";
                        }
                        ?>

                    <div class="col-lg-8" style="margin-top:30px">
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name">Tên đăng nhập</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $row_kh['ten_kh'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name">Số điện thoại</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $row_kh['sdt'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name">Địa chỉ</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $row_kh['diachi'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name">Email</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $row_kh['email_kh'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name">Giới tính</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $row_kh['gioitinh'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-table">
                            <figure>
                                <img src="../dashboard/img_product/users/<?php echo $row_kh['anh'] ?>" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-12" style="text-align: center;margin-top:50px">
                        <input type="submit" name="Sua" value="Cập nhật thông tin" style="background: rgb(68, 68, 68); border-radius:7px; border: none; box-sizing: inherit; color: white; display: inline-block; font-family: &quot;Hammersmith One&quot;, Tahoma, Arial; font-size: 1.125rem; margin: 0px 0.3em 10px 0px; outline: 0px; padding: 0.4em 1.6em; text-decoration-line: none; text-transform: uppercase; transition: all 0.3s ease;">
                        <input type="submit" name="Logout" value="Đăng xuất" style="background: rgb(68, 68, 68); border-radius:7px; border: none; box-sizing: inherit; color: white; display: inline-block; font-family: &quot;Hammersmith One&quot;, Tahoma, Arial; font-size: 1.125rem; margin: 0px 0.3em 10px 0px; outline: 0px; padding: 0.4em 1.6em; text-decoration-line: none; text-transform: uppercase; transition: all 0.3s ease;">
                        <a href="index.php?act=donhangdadat" style="background: rgb(68, 68, 68); border-radius:7px; border: none; box-sizing: inherit; color: white; display: inline-block; font-family: &quot;Hammersmith One&quot;, Tahoma, Arial; font-size: 1.125rem; margin: 0px 0.3em 10px 0px; outline: 0px; padding: 0.4em 1.6em; text-decoration-line: none; text-transform: uppercase; transition: all 0.3s ease;"> Đơn hàng đã đặt</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
