<?php

function total_price($total){
    $sum = 0;
    $dongia = 0;
  
    foreach($total as $value ){
      $sum += $value['tongtien'];
      $dongia += $value['don_gia'];
    }
    return array($sum);
  }

$conn = get_connection();
$sql = "SELECT cthoadon.so_luong AS sl, cthoadon.don_gia AS gia, hoadon.tongtien AS tong, hoadon.ngaythanhtoan as ngaytt, khachhang.ten_kh as tenkh 
FROM `hoadon` 
JOIN cthoadon ON hoadon.id_hd = cthoadon.id_hd
JOIN khachhang ON hoadon.id_kh = khachhang.id_kh";
$hoadon = mysqli_query($conn, $sql);

$currentDate = new DateTime();
$currentDate->format('Y-m-d H:i:s');
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hóa đơn</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
          if(isset($_SESSION['hoadon'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['hoadon'];?></div>
        <?php
            unset($_SESSION['hoadon']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr style="background-color:#b3d9ff; color:black">
                        <th style="width: 5%">STT</th>
                        <th style="width: auto">Tên khách hàng</th>
                        <th style="width: auto">Số lượng</th>
                        <th style="width: auto">Đơn giá</th>
                        <th style="width: auto">Tổng tiền</th>
                        <th style="width: auto">Ngày đặt hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if( mysqli_num_rows ( $hoadon ) !=0){
                            while ( $row = mysqli_fetch_array($hoadon)) {
                    ?>
                                <tr>
                                    <td><?php echo count_id()?></td>
                                    <td><?php echo $row['tenkh']?></td>
                                    <td><?php echo $row['sl']?></td>
                                    <td><?php echo $row['gia']?></td>
                                    <td><?php echo $row['tong']?></td>
                                    <td><?php echo $row['ngaytt'] ?></td>                                 
                                </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->