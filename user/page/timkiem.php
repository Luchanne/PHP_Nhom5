<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*8)-8;
    }
    if(isset($_POST['tukhoa'])){
        $tukhoa = $_POST['tukhoa'];
    }else $tukhoa = $_GET['tukhoa'];
    
    if($tukhoa==""){
		echo "<script> history.go(-1) </script>";
        exit;
	}
    $sql_tk = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND ((sanpham.ten LIKE '%$tukhoa%') 
                                            OR (loaisp.ten_lsp LIKE '%$tukhoa%')) 
                                            ORDER BY sanpham.id_sp DESC LIMIT $begin,8";
    $sql_sp = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND ((sanpham.ten LIKE '%$tukhoa%') 
                                            OR (loaisp.ten_lsp LIKE '%$tukhoa%')) 
                                            ORDER BY sanpham.id_sp DESC";
	$query_sp = mysqli_query($conn,$sql_tk);
    $query_sl = mysqli_query($conn,$sql_sp);
    $query_trang = mysqli_query($conn,$sql_sp);
    $row_count = mysqli_num_rows($query_trang);  
	$trang = ceil($row_count/8);

?>

    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Kết quả<br>"<?php echo $tukhoa;?>"</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Categories Page Section Begin -->
    <section class="categories-page spad">
        <div class="container">
            <div class="categories-controls">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="categories-filter">
                            <div class="cf-right">
                                <span><?php $rows_sl = mysqli_num_rows ( $query_sl ); echo $rows_sl ?> Sản phẩm</span>
                                <?php
					                for($i=1;$i<=$trang;$i++){ 
					            ?>
                                <a href="./index.php?act=timkiem&tukhoa=<?php echo $tukhoa?>&trang=<?php echo $i?>" class="<?php if($i==$page){echo 'active';}else{ echo '';}?>"><?php echo $i ?></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    while($row = mysqli_fetch_array($query_sp)){ 
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product-item">
                        <figure>
                            <img src="../dashboard/img_product/products/<?php echo $row['anh'] ?>" alt="">
                            <div class="p-status">Mới</div>
                            <div class="hover-icon">
                                <a href="../dashboard/img_product/products/<?php echo $row['anh'] ?>" class="pop-up"><img src="img/icons/zoom-plus.png"
                                        alt=""></a>
                            </div>
                        </figure>
                        <div class="product-text">
                            <a href="index.php?act=chitiet&id=<?php echo $row['id_sp'] ?>">
                                <h6><?php echo $row['ten'] ?></h6>
                            </a>
                            <p><?php echo number_format($row['gia'],0,',','.').'VNĐ'?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>