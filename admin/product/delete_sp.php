<?php
    function get_connection(){
        $servename = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'quanlyshop';
        $conn = mysqli_connect($servename, $username, $password, $dbname);
    
        return $conn;
    }
?>

<?php
  $id_sp = $_GET['id_sp'];
  $conn = get_connection();
  $sql = "DELETE FROM sanpham WHERE id_sp='$id_sp'";
    if(mysqli_query ($conn, $sql)){
?>
      <script>window.location.href = '../master.php?act=page_sp';</script>
<?php
        $_SESSION['sanpham'] = "Xóa sản phẩm thành công";
    }
?>