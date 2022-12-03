<?php
  $id_loaisp = $_GET['id_lsp'];
  $conn = get_connection();

  $sql = "SELECT * FROM loaisp WHERE id_lsp='$id_loaisp'";
  $query = mysqli_query ($conn, $sql);
  $row = mysqli_fetch_array($query);

  if(isset($_POST['capnhat'])){
    $tenloai=$_POST['loaisp'];
    
    $sql = "UPDATE loaisp SET ten_lsp='$tenloai' WHERE id_lsp='$id_loaisp'";
    $conn = get_connection();
    if (mysqli_query($conn, $sql)) {
?>
      <script>window.location.href = 'master.php?act=page_loaisp';</script>
<?php
        $_SESSION['loaisp'] = "Cập nhật loại sản phẩm thành công";
    } else {
        $thongbao = "Cập nhật loại sản phẩm thất bại";
    }
  }
?>


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Sửa loại sản phẩm</h1>

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
                  <input type="text" name="loaisp" class="form-control"  value="<?php if(isset($_POST['loaisp'])) echo $_POST['loaisp']; else echo $row['ten_lsp']?>" placeholder="Nhập loại sản phẩm cần sửa" required>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
                <a href="master.php?act=page_loaisp">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
              </div>
            </form>
          </div>
    </div>

</div>
<!-- /.container-fluid -->