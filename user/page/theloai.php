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
    if(isset($_GET['id_loai'])){
        $id_loai = $_GET['id_loai'];
    }
    else{
        $id_loai=$_GET["id_loai"];
    }
    if($id_loai=='All'){
        if(isset($_POST['sapxep'])){
            $SX=$_POST['sx'];
            switch($SX){
                case "N":
                    $sql_sl = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT $begin,8";
                    break;
                 case "G":
                    $sql_sl = "SELECT * FROM sanpham ORDER BY gia DESC LIMIT $begin,8";
                    break;
                 case "T":
                    $sql_sl = "SELECT * FROM sanpham ORDER BY gia LIMIT $begin,8";
                    break;
                 default:
                    $sql_sl = "SELECT * FROM sanpham ORDER BY id_sp LIMIT $begin,8";
             }
        }else   $sql_sl = "SELECT * FROM sanpham ORDER BY id_sp LIMIT $begin,8";
        $sql_sp = "SELECT * FROM sanpham";
    }else{
        if(isset($_POST['sapxep'])){
            $SX=$_POST['sx'];
            switch($SX){
                case "N":
                    $sql_sl = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$id_loai' ORDER BY sanpham.id_sp DESC LIMIT $begin,8";
                    break;
                 case "G":
                    $sql_sl = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$id_loai' ORDER BY sanpham.gia DESC LIMIT $begin,8";
                    break;
                 case "T":
                    $sql_sl = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$id_loai' ORDER BY sanpham.gia LIMIT $begin,8";
                    break;
                 default:
                    $sql_sl = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$id_loai' ORDER BY sanpham.id_sp LIMIT $begin,8";
             }
        }else $sql_sl = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$id_loai' LIMIT $begin,8";
        $sql_sp = "SELECT * FROM sanpham,loaisp WHERE sanpham.id_lsp=loaisp.id_lsp AND loaisp.id_lsp='$id_loai'";
        $sql_loai = "SELECT * FROM loaisp WHERE loaisp.id_lsp='$id_loai'";
        $query_loai = mysqli_query($conn,$sql_loai);
        $row_loai = mysqli_fetch_array($query_loai);
    }

    $query_sl = mysqli_query($conn,$sql_sp);
    $query_sp = mysqli_query($conn,$sql_sl);
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
                        <h2><?php if($id_loai=='All') echo "All"; else echo $row_loai['ten_lsp'];?><span>.</span></h2>
                        <a href="index.php">Trang chủ</a>
                        <a href="index.php?act=theloai&id_loai=<?php if($id_loai=='All') echo "All"; else echo $row_loai['id_lsp'];?>"><?php if($id_loai=='All') echo "All"; else echo $row_loai['ten_lsp'];?></a>
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
                            <div class="cf-left">
                                <form action="index.php?act=theloai&id_loai=<?php echo $id_loai;?>" method="post">
                                    <select class="sort" name="sx">
                                        <option value="O">Cũ nhất</option>
                                        <option value="N" <?php if(isset($SX) && $SX=="N") echo "selected='selected'";?>>Mới nhất</option>
                                        <option value="G" <?php if(isset($SX) && $SX=="G") echo "selected='selected'";?>>Giá từ cao đến thấp</option>
                                        <option value="T" <?php if(isset($SX) && $SX=="T") echo "selected='selected'";?>>Giá từ thấp đến cao</option>
                                    </select>
                                    <input type="submit" name="sapxep" style="margin-left:10px;top: 10px; position: relative; font-size:14px; background-color: transparent;" value="Áp dụng">
                                </form>
                            </div>
                            <div class="cf-right">
                                <span><?php $rows_sl = mysqli_num_rows ( $query_sl ); echo $rows_sl ?> Sản phẩm</span>
                                <?php
					                for($i=1;$i<=$trang;$i++){ 
					            ?>
                                
                                <a href="index.php?act=theloai&id_loai=<?php echo $id_loai;?>&trang=<?php echo $i;?>" class="<?php if($i==$page){echo 'active';}else{ echo ''; }  ?>"><?php echo $i ?></a>
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
    <!-- Categories Page Section End -->
