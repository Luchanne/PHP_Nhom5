<?php
    if((!isset($id_kh)) or ($id_kh=="")){
        echo "<script> location.href='login_page.php'; </script>";
        exit;
    }

    if(!(isset($_SESSION["dathang"])) || !(is_array($_SESSION["dathang"]))){
        echo "<script> location.href='index.php?act=giohang'; </script>";
        exit;
    }
    $sql_kh = "SELECT * FROM khachhang WHERE id_kh='$id_kh'";
    $query_kh = mysqli_query($conn,$sql_kh);
    $row_kh = mysqli_fetch_array($query_kh);

?>

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Đặt hàng<span>.</span></h2>
                        <a href="index.php">Trang chủ</a>
                        <a class="active" href="">Đặt hàng</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Sản phẩm</th>
                            <th>Giá</th>
                            <th class="quan">Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <?php
                        $tonghd=0;
                        for($i=0;$i<sizeof($_SESSION['dathang']);$i++){
                            $tong = $_SESSION["dathang"][$i][3]*$_SESSION["dathang"][$i][4];
                            $tonghd+=$tong;
                    ?>
                    <tbody>
                        <tr>
                            <td class="product-col">
                                <img src="../dashboard/img_product/products/<?php echo $_SESSION["dathang"][$i][1]?>" alt="">
                                <div class="p-title">
                                    <h5><?php echo $_SESSION["dathang"][$i][2]?></h5>s
                                </div>
                            </td>
                            <td class="price-col"><?php echo $_SESSION["dathang"][$i][3]?></td>
                            <td class="quantity-col">
                                <div style="width: 100px;text-align: center;background: transparent;border: none;font-size: 18px;font-weight: 700;height: 100%;">
                                    <?php echo $_SESSION["dathang"][$i][4];?>
                                </div>
                            </td>
                            <td class="total"><?php echo $tong;?></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                    <tbody>
                        <tr>
                            <td class="product-col">    
                            </td>
                            <td class="price-col"></td>
                            <td class="quantity-col">
                                <div style="width: 200px;text-align: center;background: transparent;border: none;font-size: 18px;font-weight: 700;height: 100%;">
                                    Tổng hóa đơn:
                                </div>
                            </td>
                            <td class="total"><?php echo $tonghd;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container">
            <form action="index.php?act=donhang" class="checkout-form" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Thông tin của bạn</h3>
                    </div>
                    <div class="col-lg-10">
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
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <input type="hidden" name="tongtien" value="<?php echo $tonghd;?>">
                            <button type="submit" name="xndh">Xác nhận đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->