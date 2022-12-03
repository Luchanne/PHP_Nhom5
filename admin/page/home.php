
<?php

$conn = get_connection();
  $sql_kh = "SELECT count(*) as total_kh FROM khachhang ORDER BY id_kh";
  $khachhang = mysqli_query($conn, $sql_kh);
  $data_kh=mysqli_fetch_assoc($khachhang);
    $c_khachhang = $data_kh['total_kh'];

  $sql_sp = "SELECT count(*) as total_sp FROM sanpham ORDER BY id_sp";
  $sanpham = mysqli_query($conn, $sql_sp);
  $data_sp=mysqli_fetch_assoc($sanpham);
    $c_sanpham = $data_sp['total_sp'];

    $sql_lsp = "SELECT count(*) as total_lsp FROM loaisp ORDER BY id_lsp";
    $loaisp = mysqli_query($conn, $sql_lsp);
    $data_lsp=mysqli_fetch_assoc($loaisp);
      $c_lsp = $data_lsp['total_lsp'];
  
    $sql_hd = "SELECT count(*) as total_hd FROM cthoadon ORDER BY id_cthd";
    $hoadon = mysqli_query($conn, $sql_hd);
    $data_hd=mysqli_fetch_assoc($hoadon);
      $c_hoadon = $data_hd['total_hd'];

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="master.php?act=page_khachhang" style="color:black;" >
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Khách hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h1><?php echo $c_khachhang?></h1></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="master.php?act=page_sp" style="color:black;" >
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Sản phẩm</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h1><?php echo $c_sanpham?></h1></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="master.php?act=page_loaisp" style="color:black;" >
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Loại sản phẩm
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><h1><?php echo $c_lsp?></h1></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="master.php?act=page_donhang" style="color:black;" >
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Hóa đơn</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h1><?php echo $c_hoadon?></h1></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>