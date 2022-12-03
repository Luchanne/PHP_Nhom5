<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bạn đã nhập thông tin thành công
    <br>
<?php
    echo "Tên: ";
    echo $_POST['ten']."<br>";
    echo "Địa chỉ: ";
    echo $_POST['dc']."<br>";
    echo "Số điện thoại: ";
    echo $_POST['sdt']."<br>";
    echo "Giới tính: ";
    echo $_POST['gt']."<br>";
    echo "Quốc gia: ";
    echo $_POST['quocgia']."<br>";
    echo "Note: ";
    echo $_POST['note'];

?>
</body>
</html>