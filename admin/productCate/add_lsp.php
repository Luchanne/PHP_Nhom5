<?php
  if(isset($_POST['themmoi']))
  {
    $tenloai=$_POST['loaisp'];

    $sql = "INSERT into loaisp (ten_lsp) VALUES ('$tenloai')";
    $conn = get_connection();
    if (mysqli_query($conn, $sql)) {
?>
        <script>window.location.href = 'master.php?act=page_loaisp';</script>
<?php
        $_SESSION['loaisp'] = "Thêm loại sản phẩm thành công";
    } else {
            $thongbao = "Thêm loại sản phẩm thất bại";
    }
  }
?>


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm mới</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
            if(isset($thongbao))
              echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <div class="card card-primary mb-0">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Loại sản phẩm</label>
                  <input type="text" name="loaisp" class="form-control" placeholder="Nhập loại sản phẩm cần thêm" required>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" name="themmoi" class="btn btn-primary">Thêm</button>
                <a href="master.php?act=page_loaisp">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
              </div>
            </form>
          </div>
    </div>

</div>
<!-- /.container-fluid -->