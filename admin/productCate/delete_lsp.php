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
  $id_loaisp = $_GET['id_lsp'];
  $conn = get_connection();
  $sql = "DELETE FROM loaisp WHERE id_lsp='$id_loaisp'";
    if(mysqli_query ($conn, $sql)){
?>
      <script>window.location.href = '../master.php?act=page_loaisp';</script>
<?php
        $_SESSION['loaisp'] = "Xóa loại sản phẩm thành công";
    }
?>