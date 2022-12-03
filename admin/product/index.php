<script>
  function xoaSP() {
    var conf = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
    return conf;
  }
</script>

<?php
  $conn = get_connection();
  $sql = "SELECT * FROM sanpham
            INNER JOIN loaisp ON sanpham.id_lsp = loaisp.id_lsp
            ORDER BY id_sp";
  $sanpham = mysqli_query($conn, $sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
          if(isset($_SESSION['sanpham'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['sanpham'];?></div>
        <?php
            unset($_SESSION['sanpham']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <div class="card-header py-3">
            <a href="master.php?act=page_add_sp">
                <h6 class="m-0 font-weight-bold text-primary">Thêm mới</h6>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width: auto">Tên sản phẩm</th>
                        <th style="width: auto">Giá</th>
                        <th style="width: auto">Số lượng</th>
                        <th style="width: auto">Mô tả</th>
                        <th style="width: auto">Ảnh</th>
                        <th style="width: auto">Loại sản phẩm</th>
                        <th style="width: auto">Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if( mysqli_num_rows ( $sanpham ) !=0){
                            while ( $row = mysqli_fetch_array($sanpham)) {
                    ?>
                                <tr>
                                    <td><?php echo $row['ten']?></td>
                                    <td><?php echo number_format($row['gia'])." VNĐ"?></td>
                                    <td><?php echo $row['sl']?></td>
                                    <td><?php echo $row['mota']?></td>
                                    <td align='center'>
                                        <img src="../dashboard/img_product/products/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="100px" height="100px">
                                    </td>
                                    <td><?php echo $row['ten_lsp']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <abbr title="Sửa dữ liệu">
                                        <a href="master.php?act=page_edit_sp&id_sp=<?php echo $row['id_sp']?>">
                                            <button type="button" class="btn btn-default btn-sm mr-2">
                                            <i class="nav-icon fas fa-edit"></i>
                                            </button>
                                        </a>
                                        </abbr>
                                        <abbr title="Xóa dữ liệu">
                                        <a onclick="return xoaSP();" href="product/delete.php?id_sp=<?php echo $row['id_sp']?>">
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