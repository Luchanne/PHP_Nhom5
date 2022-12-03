<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $tongdiem=0.0;
    $kq ="Pái pai";
    if (isset($_POST['submit'])){
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        $dc = $_POST['dc'];

        $tongdiem= ($toan + $ly + $hoa);
        if ($tongdiem >= $dc && $toan >0 && $ly >0 && $hoa >0) $kq="Đậu";
    }

?>
<form method= "post" action="">
        <table align="center" style="background-color: pink;">
            <tr>
                <td colspan="2" align="center">
                <h1 style="font-family:cursive;color:white;font-size:45px">Kết quả thi Đại học</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Toán</a>
                </td>
                <td>
                    <input type= "text" name= "toan" 
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['toan']
                        ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Lý</a>
                </td>
                <td>
                    <input type= "text" name= "ly" 
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['ly']
                        ?>" required>
                </td>
            </tr>

            <tr>
                <td>
                    <a>Hóa</a>
                </td>
                <td>
                    <input type= "text" name= "hoa" 
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['hoa']
                        ?>" required>
                </td>
            </tr>

            <tr>
                <td>
                    <a>Điểm chuẩn</a>
                </td>
                <td>
                    <input type= "text" name= "dc" 
                        value="<?php
                        if(isset($_POST['submit'])) echo $_POST['dc']
                        ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Tổng điểm</a>
                </td>
                <td>
                    <input type= "text" name= "tongdiem" 
                        value="<?php
                            if(isset($_POST['submit'])) echo $tongdiem
                        ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Kết quả</a>
                </td>
                <td>
                    <input type= "text" name= "kq" 
                        value="<?php
                            if(isset($_POST['submit'])) echo $kq
                        ?>" readonly>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Xem kết quả">
                </td>
            </tr>

        </table>
    </form>
</body>


</html>