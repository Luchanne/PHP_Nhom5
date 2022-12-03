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
  $id_kh = $_GET['id_kh'];
  $conn = get_connection();
  $sql = "DELETE FROM khachhang WHERE id_kh='$id_kh'";
    if(mysqli_query ($conn, $sql)){
?>
      <script>window.location.href = '../master.php?act=page_khachhang';</script>
<?php
        $_SESSION['khachang'] = "Xóa thành công";
    }
?>