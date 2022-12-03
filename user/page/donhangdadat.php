<?php
    if((!isset($id_kh)) or ($id_kh=="")){
        echo "<script> location.href='login_page.php'; </script>";
        exit;
    }

    $sql_slhd= "SELECT * FROM hoadon WHERE hoadon.id_kh='$id_kh'";
    $query_slhd = mysqli_query($conn,$sql_slhd);
    $row_slhd = mysqli_num_rows($query_slhd);


?>

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Đơn hàng<span>.</span></h2>
                        <a href="index.php">Trang chủ</a>
                        <a class="active" href="index.php?act=donhangdadat">Đơn hàng</a>
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
            if($row_slhd>0){
        ?>

    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
            <form action="index.php?act=chinhsua" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th style="padding-left: 100px;">Tổng tiền</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        while($row_hd = mysqli_fetch_array($query_slhd)){
                    ?>
                    <tbody>
                        <tr>
                            <td class="product-col">
                                <div class="p-title">
                                    <h5><?php echo $row_hd['id_hd']?></h5>
                                </div>
                            </td>
                            <td class="price-col"><?php echo $row_hd['ngaythanhtoan']?></td>
                            <td class="quantity-col">
                                <div style="margin-left: 80px; width: 100px;text-align: center;background: transparent;border: none;font-size: 18px;font-weight: 700;height: 100%;">
                                    <?php echo $row_hd['tongtien'];?>
                                </div>
                            </td>
                            <td class="total"></td>
                            <td ><a href="index.php?act=chitietdonhang&id_hd=<?php echo $row_hd['id_hd']?>" style="background: rgb(68, 68, 68); border-radius:7px; border: none; box-sizing: inherit; color: white; display: inline-block; font-family: &quot;Hammersmith One&quot;, Tahoma, Arial; font-size: 15px; margin: 0px 0.3em 10px 0px; outline: 0px; padding: 0.4em 1.6em; text-decoration-line: none; text-transform: uppercase; transition: all 0.3s ease;">Chi tiết đơn hàng</a></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn update-btn"><a href="javascript:window.history.back(-1);" style="border:none;background-color:transparent;font-size:20px;">Quay về</a></div>
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
        <h3 style="text-align: center;"><?php echo "Hiện chưa có đơn hàng nào!!!" ?></h3>
    </div>
    <?php
        }
    ?>
    <!-- Cart Page Section End -->