<?php
  $id_sp = $_GET['id_sp'];
  $conn = get_connection();

  $sqlLoai = "SELECT * FROM loaisp";
  $queryLoai = mysqli_query ($conn , $sqlLoai );

  $sql = "SELECT * FROM sanpham WHERE id_sp='$id_sp'";
  $query = mysqli_query ($conn, $sql);
  $row = mysqli_fetch_array($query);

  if(isset($_POST['capnhat'])){
    $tensp=$_POST['sp'];
    $gia=$_POST['gia'];
    $soluong=$_POST['soluong'];
    $mota=$_POST['mota'];

    if($_FILES['anhsp']['name']==''){
      $anhsp=$_POST['anhsp'];
    }
    else{
      $anhsp=$_FILES['anhsp']['name'];
      $tmp_name=$_FILES['anhsp']['tmp_name'];
    }

    $id_loaisp=$_POST['id_loaisp'];

    if(isset($gia)&&isset($anhsp)&&isset($id_loaisp))
    {
      if(is_numeric($gia)){
        move_uploaded_file($tmp_name, '../dashboard/img_product/'.$anhsp);
        $sql = "UPDATE sanpham 
        SET ten='$tensp', gia='$gia', sl='$soluong', mota='$mota', anh='$anhsp', id_lsp='$id_loaisp'
        WHERE id_sp = $id_sp";
        $conn = get_connection();
        if (mysqli_query($conn, $sql)) {
?>
          <script>window.location.href = 'master.php?act=page_sp';</script>
<?php
            $_SESSION['sanpham'] = "Cập nhật sản phẩm thành công";
        } else {
            $thongbao = "Cập nhật sản phẩm thất bại";
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
                  <input type="text" name="sp" class="form-control"  value="<?php if(isset($_POST['sp'])) echo $_POST['sp']; else echo $row['ten']?>" placeholder="Enter ProductType" required>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" name="gia" class="form-control" value="<?php if(isset($_POST['gia'])) echo $_POST['gia']; else echo $row['gia']?>" placeholder="Enter Salary" required>
                </div>
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="number" name="soluong" value="<?php if(isset($_POST['soluong'])) echo $_POST['soluong']; else echo $row['sl']?>" class="form-control" placeholder="Enter Cases" required>
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <div>
                    <textarea name="mota" cols="120" rows="3" require><?php if(isset($_POST['mota'])) echo $_POST['mota']; else echo $row['mota']?></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input style="margin-bottom:10px" type="file" name="anhsp" class="form-control-file">
                    <input type="hidden" name="anhsp" value="<?php echo $row['anh']?>">
                    <img src="../dashboard/img_product/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="100px" height="100px">
                </div>
                <div class="form-group">
                  <label>Loại sản phẩm</label>
                  <div>
                    <select name='id_loaisp' required>
                      <?php
                        while ( $rowLoai = mysqli_fetch_array($queryLoai)) {
                      ?> 
                      <option
                        <?php
                          if($row['id_lsp'] == $rowLoai['id_lsp'])
                            echo 'selected="selected"'
                        ?>
                        value="<?php echo $rowLoai['id_lsp'] ?>"><?php echo $rowLoai['ten_lsp'] ?>
                      </option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
                <a href="master.php?act=page_sp">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
              </div>
            </form>
          </div>
    </div>

</div>
<!-- /.container-fluid -->