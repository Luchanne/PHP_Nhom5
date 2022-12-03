<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rabbit Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="template/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="template/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="template/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/style.css" type="text/css">
</head>

<body>

<?php
    $conn = get_connection();
    $sql = "SELECT * FROM loaisp";
    $query = mysqli_query($conn,$sql);
    if(isset($_SESSION["id_kh"]))
    {
        $id_kh=$_SESSION["id_kh"];
        $sql_gh= "SELECT * FROM sanpham,giohang WHERE sanpham.id_sp=giohang.id_sp AND giohang.id_kh='$id_kh'";
        $query_gh = mysqli_query($conn,$sql_gh);
        $row_sl = mysqli_num_rows($query_gh);
        $_SESSION["sl"]=$row_sl;
    }else{
        $_SESSION["sl"]=0;
        $_SESSION["slhd"]=0;
    }
?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form" action="./index.php?act=timkiem" method="POST">
				<input type="text" id="search-input" name="tukhoa" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.php"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="img/icons/search.png" alt="" class="search-trigger">
                    <a href="index.php?act=taikhoan"><img src="img/icons/man.png" alt=""></a>
                    <a href="index.php?act=giohang" style="margin-left:15px;">
                        <img src="img/icons/bag.png" alt="">
                        <span><?php echo $_SESSION["sl"] ?></span>
                    </a>
                </div>
                <div class="user-access">
                    <?php if(isset($_SESSION["ten_kh"]) and ($_SESSION["ten_kh"]!="")){ ?>
                    <a href="index.php?act=taikhoan">Xin chào <?php echo $_SESSION['ten_kh'] ?></a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="registration.php">Đăng ký</a>
                        <a href="login_page.php" class="in">Đăng nhập</a>
                    <?php
                        }
                    ?>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="./index.php">Trang chủ</a></li>
                        <li><a href="index.php?act=theloai&id_loai=All">Cửa hàng</a>
                            <ul class="sub-menu">
                            <?php
					            while($row_lsp = mysqli_fetch_array($query)){ 
				            ?>
                                <li><a href="index.php?act=theloai&id_loai=<?php echo $row_lsp['id_lsp']?>"><?php echo $row_lsp['ten_lsp']?></a></li>
                            <?php
                                }
                            ?>
                            </ul>
                        </li>
                        <li><a href="index.php?act=thongtin">Giới thiệu</a></li>
                        <li><a href="index.php?act=baitap">Bài tập</a></li>
                        <li><a href="./login_admin.php">Admin</a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p>Free ship hóa đơn trên 300.000 VND</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p>Giảm 20% cho học sinh</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                    <img src="img/icons/sales.png" alt="">
                    <p>Giảm 30% tất cả mặc hàng là váy</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->
