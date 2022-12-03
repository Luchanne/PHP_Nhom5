<?php
    $id_kh=$_SESSION["id_kh"];
    $sql_kh = "SELECT * FROM khachhang WHERE id_kh='$id_kh'";
    $query_kh = mysqli_query($conn,$sql_kh);
    $row_kh = mysqli_fetch_array($query_kh);
    if(isset($_POST['SuaTT'])){
        $ten_kh=$_SESSION["ten_kh"];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $email=$_POST['email'];
        $gioitinh=$_POST['gioitinh'];

        if($_FILES['anh']['name']==""){
            $anh=$_POST['anh'];
        }
        else{
            $anh=$_FILES['anh']['name'];
            $tmp_name=$_FILES['anh']['tmp_name'];
        }
        if(isset($tmp_name)){
            move_uploaded_file($tmp_name, '../dashboard/img_product/users/'.$anh);
        }
        $sql = "UPDATE khachhang
                SET sdt='$sdt', diachi='$diachi', email_kh='$email', gioitinh='$gioitinh', anh='$anh'
                WHERE id_kh = $id_kh";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['thongbao']="Cập nhật thông tin thành công";
                echo "<script> location.href='index.php?act=taikhoan'; </script>";
                exit;
        }
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
            <form action="" class="checkout-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Nhập thông tin cần sửa</h3>
                    </div>
                    <div class="col-lg-8" style="margin-top:30px">
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name" style="padding-top:18px;">Tên đăng nhập</p>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="ten_kh" value="<?php echo $row_kh['ten_kh'];?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name" style="padding-top:18px;">Số điện thoại</p>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="sdt" value="<?php echo $row_kh['sdt'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name" style="padding-top:18px;">Địa chỉ</p>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="diachi" value="<?php echo $row_kh['diachi'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" style="padding-top:18px;">
                                <p class="in-name">Email</p>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="email" value="<?php echo $row_kh['email_kh'];?>">
                            </div>
                        </div>
                        <div style="font-size: 16px; color: red">
                                <?php
                                    if (isset($err)) echo $err; else echo "";
                                ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="in-name">Giới tính</p>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="male" <?php if($row_kh['gioitinh']=='Nam') echo 'checked';?> value="Nam">
                                    <label class="form-check-label" for="male">
                                    Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="female" <?php if($row_kh['gioitinh']=='Nữ') echo 'checked';?> value="Nữ">
                                    <label class="form-check-label" for="female">
                                    Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-table">
                            <figure>
                                <img src="../dashboard/img_product/users/<?php echo $row_kh['anh'] ?>" alt="">
                            </figure>
                            <input type="file" name="anh">
                            <input type="hidden" name="anh" value="<?php echo $row_kh['anh']?>">
                        </div>
                        <div style="font-size: 16px; color: red">
                                <?php
                                    if (isset($err1)) echo $err1; else echo "";
                                ?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="text-align: center;margin-top:50px">
                        <input type="submit" name="SuaTT" value="Cập nhật" style="background: rgb(68, 68, 68); border-radius:7px; border: none; box-sizing: inherit; color: white; display: inline-block; font-family: &quot;Hammersmith One&quot;, Tahoma, Arial; font-size: 1.125rem; margin: 0px 0.3em 10px 0px; outline: 0px; padding: 0.4em 1.6em; text-decoration-line: none; text-transform: uppercase; transition: all 0.3s ease;">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
