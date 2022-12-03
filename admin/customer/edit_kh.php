<?php

  $id_kh = $_GET['id_kh'];
  $conn = get_connection();

  $sql = "SELECT * FROM khachhang WHERE id_kh='$id_kh'";
  $query = mysqli_query ($conn, $sql);
  $row = mysqli_fetch_array($query);

  if(isset($_POST['capnhat'])){
    $ten_kh=$_POST['ten_kh'];
    $sdt=$_POST['sdt'];
    $diachi=$_POST['diachi'];
    $email=$_POST['email_kh'];
    $gioitinh=$_POST['gioitinh'];

    if($_FILES['anh']['name']==''){
      $anhkh=$_POST['anh'];
    }
    else{
      $anhkh=$_FILES['anh']['name'];
      $tmp_name=$_FILES['anh']['tmp_name'];
    }
    
    move_uploaded_file($tmp_name, '../dashboard/img_kh/'.$anhkh);
    $sql  = "UPDATE khachhang SET ten_kh='$ten_kh', sdt='$sdt',diachi='$diachi',email_kh='$email',gioitinh='$gioitinh', anh= '$anhkh'
    WHERE id_kh ='$id_kh'";
    $conn = get_connection();
    if (mysqli_query($conn, $sql)) {
?>
      <script>window.location.href = 'master.php?act=page_khachhang';</script>
<?php
        $_SESSION['id_kh'] = "Cập nhật khách hàng thành công";
    } else {
        $thongbao = "Cập nhật khách hàng thất bại";
    }
  }
?>


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Sửa thông tin khách hàng</h1>

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
                  <label>Ảnh</label>
                  <div class="form-group">
                <input type="file" name="anh" class="btn btn-default btn-file"/>
              </div>
              <div class="form-group">
                <input type="hidden" name="anh" value="<?php echo $anh['anh'];?>">
              </div>
                </div>
                <div class="form-group">
                  <label>Tên khách hàng</label>
                  <input type="text" name="ten_kh" class="form-control"  value="<?php if(isset($_POST['ten_kh'])) echo $_POST['ten_kh']; else echo $row['ten_kh']?>"  placeholder="Nhập tên khách hàng cần chỉnh sửa" required>
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" name="sdt" class="form-control"  value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt']; else echo $row['sdt']?>" placeholder="Nhập số điện thoại khách hàng cần chỉnh sửa" required>
                </div>
                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" name="diachi" class="form-control"  value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi']; else echo $row['diachi']?>" placeholder="Nhập địa chỉ khách hàng cần chỉnh sửa" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email_kh" class="form-control"  value="<?php if(isset($_POST['email_kh'])) echo $_POST['email_kh']; else echo $row['email_kh']?>" placeholder="Nhập email khách hàng cần chỉnh sửa" required>
                </div>
                <div class="form-group">
                  <label>Giới tính</label>
                  <select class="form-control" name="gioitinh">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
                <a href="master.php?act=page_khachhang">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
              </div>
            </form>
          </div>
    </div>

</div>
<!-- /.container-fluid -->