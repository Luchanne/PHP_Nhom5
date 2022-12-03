<?php
    if((!isset($id_kh)) or ($id_kh=="")){
        echo "<script> location.href='login_page.php'; </script>";
        exit;
    }

    if(!isset($_GET['id_hd'])){
        echo "<script> location.href='index.php?act=donhangdadat'; </script>";
        exit;
    }

    $id_hd = $_GET['id_hd'];
    $sql_slct= "SELECT * FROM cthoadon, sanpham WHERE cthoadon.id_hd='$id_hd' AND cthoadon.id_sp=sanpham.id_sp";
    $query_slct = mysqli_query($conn,$sql_slct);
    $row_slct = mysqli_num_rows($query_slct);

?>

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Chi tiết<span>.</span></h2>
                        <a href="index.php">Trang chủ</a>
                        <a class="active" href="index.php?act=giohang">Chi tiết</a>
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
        if($row_slct>0){
    ?>

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
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        $tonghd=0;
                        while($row_cthd = mysqli_fetch_array($query_slct)){
                            $tonghd+=$row_cthd['don_gia']*$row_cthd['so_luong'];
                    ?>
                    <tbody>
                        <tr>
                            <td class="product-col">
                                <img src="../dashboard/img_product/products/<?php echo $row_cthd['anh'] ?>" alt="">
                                <div class="p-title">
                                    <h5><?php echo $row_cthd['ten']?></h5>
                                </div>
                            </td>
                            <td class="price-col"><?php echo $row_cthd['don_gia']?></td>
                            <td class="quantity-col">
                                <div style="width: 100px;text-align: center;background: transparent;border: none;font-size: 18px;font-weight: 700;height: 100%;">                                  
                                    <?php echo $row_cthd['so_luong'];?>
                                </div>
                            </td>
                            <td class="total"><?php echo $row_cthd['don_gia']*$row_cthd['so_luong']?></td>
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
                                <div style="width: 200px; text-align: center; background: transparent;border: none;font-size: 18px;font-weight: 700;height: 100%;">
                                    Tổng hóa đơn:
                                </div>
                            </td>
                            <td class="total"><?php echo $tonghd;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn update-btn"><a href="javascript:window.history.back(-1);" style="border:none;background-color:transparent;font-size:20px;">Quay về</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        } else{
    ?>
    <div class="cart-page">
        <h3 style="text-align: center;"><?php echo "Đơn hàng không có sản phẩm nào!!!" ?></h3>
    </div>
    <?php
        }
    ?>
    <!-- Cart Page Section End -->