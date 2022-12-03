<script>
  function xoaKH() {
    var conf = confirm("Bạn có chắc chắn muốn xóa khách hàng này không?");
    return conf;
  }
</script>

<?php
  $conn = get_connection();
  $sql = "SELECT * FROM khachhang ORDER BY id_kh";
  $khachhang = mysqli_query($conn, $sql);

?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Khách hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
          if(isset($_SESSION['khachhang'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['khachhang'];?></div>
        <?php
            unset($_SESSION['khachhang']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>

        <div class="card-header py-3">
            <a href="master.php?act=page_add_kh">
                <h6 class="m-0 font-weight-bold text-primary">Thêm mới</h6>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr style="background-color:#b3d9ff; color:black">
                        <th style="width: 5%">STT</th>
                        <th style="width: auto">Ảnh đại diện</th>
                        <th style="width: auto">Tên khách hàng</th>
                        <th style="width: auto">Số điện thoại</th>
                        <th style="width: auto">Địa chỉ</th>
                        <th style="width: auto">Email</th>
                        <th style="width: auto">Giới tính</th>
                        <th style="width: auto">Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if( mysqli_num_rows ( $khachhang ) !=0){
                            while ( $row = mysqli_fetch_array($khachhang)) {
                    ?>
                                <tr>
                                <td><?php echo count_id()?></td>
                                <td align='center'>
                                        <img src="../dashboard/img_product/users/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="100px" height="100px">
                                    </td>
                                    <td><?php echo $row['ten_kh']?></td>
                                    <td><?php echo $row['sdt']?></td>
                                    <td><?php echo $row['diachi']?></td>
                                    <td><?php echo $row['email_kh']?></td>
                                    <td><?php echo $row['gioitinh']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <abbr title="Sửa dữ liệu">
                                        <a href="master.php?act=page_edit_kh&id_kh=<?php echo $row['id_kh']?>">
                                            <button type="button" class="btn btn-default btn-sm mr-2">
                                            <i class="nav-icon fas fa-edit"></i>
                                            </button>
                                        </a>
                                        </abbr>
                                        <abbr title="Xóa dữ liệu">
                                        <a onclick="return xoaKH();" href="customer/delete_kh.php?id_kh=<?php echo $row['id_kh']?>">
                                            <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </a>
                                        </abbr>
                                    </div>
                                    </td>
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