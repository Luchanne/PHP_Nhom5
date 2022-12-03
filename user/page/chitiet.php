<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else 
    {   echo "<script> history.go(-1) </script>";
        exit;
    }
    $sql_chitiet = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND sanpham.id_sp='$id'";
	$query_chitiet = mysqli_query($conn,$sql_chitiet);
    $query_loai = mysqli_query($conn,$sql_chitiet);
    $row_loai = mysqli_fetch_array($query_loai);
    $sql_lq = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$row_loai[id_lsp]'";
    $query_lq = mysqli_query($conn,$sql_lq);
?>

    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2><?php echo $row_loai['ten_lsp'];?><span>.</span></h2>
                        <a href="index.php">Trang chủ</a>
                        <a href="index.php?act=theloai&id_loai=<?php echo $row_loai['id_lsp'];?>"><?php echo $row_loai['ten_lsp'];?></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Product Page Section Beign -->
    <section class="product-page">
        <div class="container">
            <?php
                while($row_chitiet= mysqli_fetch_array($query_chitiet)){
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider owl-carousel">
                        <div class="product-img">
                            <figure>
                                <img src="../dashboard/img_product/products/<?php echo $row_chitiet['anh'] ?>" alt="">
                                <div class="p-status">Mới</div>
                            </figure>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <form action="index.php?act=themgiohang" method="POST">
                        <h2><?php echo $row_chitiet['ten']?></h2>
                        <input type="hidden" name="id_sp" value="<?php echo $row_chitiet['id_sp']?>">
                        <div class="pc-meta">
                            <h5><?php echo number_format($row_chitiet['gia'],0,',','.').'VNĐ' ?></h5>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <p><?php echo $row_chitiet['mota'] ?></p>
                        <ul class="tags">
                            <li><span>Tags :</span> <?php echo $row_chitiet['ten_lsp'] ?> </li>
                        </ul>
                        <div class="product-quantity">
                            <div class="pro-qty">
                                <input type="text" name="sl" value="1">
                            </div>
                        </div>
                        <input class="primary-btn pc-btn" type="submit" name="giohang" value="Thêm giỏ hàng">
                    </form>
                    </div>
                </div>
            </div>
            <?php
				} 
			?>
        </div>
    </section>
    <!-- Product Page Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $i=0;
					while(($row_lq = mysqli_fetch_array($query_lq))&&($i<4)){ 
				?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-product-item">
                        <figure>
                            <a href="index.php?act=chitiet&id=<?php echo $row_lq['id_sp'] ?>"><img src="../dashboard/img_product/products/<?php echo $row_lq['anh'] ?>" alt=""></a>
                            <div class="p-status">new</div>
                        </figure>
                        <div class="product-text">
                            <a href="index.php?act=chitiet&id=<?php echo $row_lq['id_sp'] ?>"><h6><?php echo $row_lq['ten'] ?></h6></a>
                            <p><?php echo number_format($row_lq['gia'],0,',','.').'VNĐ' ?></p>
                        </div>
                    </div>
                </div>
                <?php
                    $i++;
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->