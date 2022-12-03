<?php
  if(isset($_POST['themmoi']))
  {
    $tensp=$_POST['sp'];
    $gia=$_POST['gia'];
    $soluong=$_POST['soluong'];
    $mota=$_POST['mota'];
    
    if($_FILES['anhsp']['name']==''){
      $error_anhsp="<span style='color: red;'>(*)</span>";
    }
    else{
      $anhsp=$_FILES['anhsp']['name'];
      $tmp_name=$_FILES['anhsp']['tmp_name'];
    }

    if($_POST['id_loaisp'] == 'unselect'){
      $error_id_loaisp="<span style='color: red;'>(*)</span>";
    }
    else{
      $id_loaisp=$_POST['id_loaisp'];
    }

    if(isset($gia)&&isset($anhsp)&&isset($id_loaisp))
    {
      if(is_numeric($gia)){
        move_uploaded_file($tmp_name, '../dashboard/img_product/products/'.$anhsp);
        $sql = "INSERT into sanpham (ten, gia, sl, mota, anh, id_lsp)
                VALUES ('$tensp', '$gia', '$soluong', '$mota', '$anhsp', '$id_loaisp')";
        $conn = get_connection();
        if (mysqli_query($conn, $sql)) {
?>
        <script>window.location.href = 'master.php?act=page_sp';</script>
<?php
            $_SESSION['sanpham'] = "Thêm sản phẩm thành công";
        } else{
                $thongbao = "Thêm sản phẩm thất bại";
        }
      } else{
          $thongbao = "Giá không hợp lệ";
      }
    } else{
        $thongbao = "Vui lòng điền đầy đủ thông tin";
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
                  <label>Tên sản phẩm</label>
                  <input type="text" name="sp" class="form-control" placeholder="Enter ProductName" required>
                </div>
                <div class="form-group">
                  <label>Giá</label>
                  <input type="text" name="gia" class="form-control" placeholder="Enter Price" required>
                </div>
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="number" name="soluong" value="0" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <div>
                    <textarea name="mota" cols="120" rows="3" require></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" name="anhsp" class="form-control-file">
                </div>
                <div class="form-group">
                  <label>Loại sản phẩm</label>
                  <div>
                    <select name='id_loaisp'>
                      <option value='unselect' selected>Chọn loại sản phẩm</option>
                      <?php
                        $conn = get_connection();
                        $sqlDm = "SELECT * FROM loaisp";
                        $queryDm = mysqli_query ($conn , $sqlDm );
                        while ( $rowDm = mysqli_fetch_array($queryDm)) {
                      ?> 
                      <option value="<?php echo $rowDm['id_lsp'] ?>"><?php echo $rowDm['ten_lsp'] ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" name="themmoi" class="btn btn-primary">Thêm</button>
                <a href="master.php?act=page_sp">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
              </div>
            </form>
          </div>
    </div>

</div>
<!-- /.container-fluid -->