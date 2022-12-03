<?php
    if((!isset($id_kh)) or ($id_kh=="")){
        echo "<script> location.href='login_page.php'; </script>";
        exit;
    }

?>

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Giỏ hàng<span>.</span></h2>
                        <a href="index.php">Trang chủ</a>
                        <a class="active" href="index.php?act=giohang">Giỏ hàng</a>
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
    <?php
        if(isset($_SESSION["thongbao"])&&($_SESSION["thongbao"]!="")){
        ?>
            <h5 style="text-align: center; color:red;"><?php echo $_SESSION["thongbao"];?></h5>
        <?php
            $_SESSION["thongbao"]="";
        }
        ?>
        <?php
            if($_SESSION["sl"]>0){
        ?>

    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
            <form action="index.php?act=chinhsua" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Sản phẩm</th>
                            <th>Giá</th>
                            <th class="quan">Số lượng</th>
                            <th>Tổng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        while($row_gh = mysqli_fetch_array($query_gh)){
                    ?>
                    <tbody>
                        <tr>
                            <td class="product-col">
                                <img src="../dashboard/img_product/products/<?php echo $row_gh['anh'] ?>" alt="">
                                <div class="p-title">
                                    <h5><?php echo $row_gh['ten']?></h5>
                                </div>
                            </td>
                            <td class="price-col"><?php echo $row_gh['gia']?></td>
                            <td class="quantity-col">
                                <div style="width: 100px;text-align: center;background: transparent;border: none;font-size: 18px;font-weight: 700;height: 100%;">
                                    <a href="index.php?act=chinhsua&update=giam&id=<?php echo $row_gh['id_sp']?>" <?php if($row_gh['sl']==1){?> onclick="return confirm('Are you sure?'); " <?php } ?>>
                                    <i class="fa fa-minus fa-style" style="margin-left: 8px;margin-right: 10px;color: #838383;cursor: pointer;font-size: 18px;font-weight: 700;padding: 16px 0;" aria-hidden="true"></i>
                                    </a>
                                    <?php echo $row_gh['sl'];?>
                                    <a href="index.php?act=chinhsua&update=tang&id=<?php echo $row_gh['id_sp']?>">
                                    <i class="fa fa-plus fa-style" style="margin-left: 10px;color: #838383;cursor: pointer;font-size: 18px;font-weight: 700;padding: 16px 0;" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="total"><?php echo $row_gh['gia']*$row_gh['sl']?></td>
                            <td class="product-close"><input type="checkbox" name="<?php echo $row_gh['id_sp'];?>"></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-8 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn update-btn"><input type="submit" name="dathang" style="border:none;background-color:transparent;font-size:20px;" value="Đặt hàng"></div>
                        <div class="site-btn update-btn"><input type="submit" name="xoa" style="border:none;background-color:transparent;font-size:20px;" value="Xóa sản phẩm"></div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php
        } else{
    ?>
    <div class="cart-page">
        <h3 style="text-align: center;"><?php echo "Giỏ hàng chưa có sản phẩm nào!!!" ?></h3>
    </div>
    <?php
        }
    ?>
    <!-- Cart Page Section End -->