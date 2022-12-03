<script>
  function xoaLoaiSP() {
    var conf = confirm("Bạn có chắc chắn muốn xóa loại sản phẩm này không?");
    return conf;
  }
</script>

<?php
  $conn = get_connection();
  $sql = "SELECT * FROM loaisp ORDER BY id_lsp";
  $loaisp = mysqli_query($conn, $sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Loại sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
          if(isset($_SESSION['loaisp'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['loaisp'];?></div>
        <?php
            unset($_SESSION['loaisp']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <div class="card-header py-3">
            <a href="master.php?act=page_add_loaisp">
                <h6 class="m-0 font-weight-bold text-primary">Thêm mới</h6>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr style="background-color:#b3d9ff; color:black">
                        <th style="width: 5%">STT</th>
                        <th style="width: auto">Tên loại</th>
                        <th style="width: auto">Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if( mysqli_num_rows ( $loaisp ) !=0){
                            while ( $row = mysqli_fetch_array($loaisp)) {
                    ?>
                                <tr>
                                    <td><?php echo count_id()?></td>
                                    <td><?php echo $row['ten_lsp']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <abbr title="Sửa dữ liệu">
                                        <a href="master.php?act=page_edit_loaisp&id_lsp=<?php echo $row['id_lsp']?>">
                                            <button type="button" class="btn btn-default btn-sm mr-2">
                                            <i class="nav-icon fas fa-edit"></i>
                                            </button>
                                        </a>
                                        </abbr>
                                        <abbr title="Xóa dữ liệu">
                                        <a onclick="return xoaLoaiSP();" href="productCate/delete_lsp.php?id_lsp=<?php echo $row['id_lsp']?>">
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