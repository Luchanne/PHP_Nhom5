<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chu vi & Diện tích</title>
</head>
<body>
<?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $cd=$_POST['cd'];
    $cr=$_POST['cr'];
    if (isset($cd) and is_numeric($cd) and $cd>0 and isset($cr) and is_numeric($cr) and $cr>0 ){
        $s=$cd*$cr;
    }
}

?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1 style="font-family:cursive;color:red;font-size:45px">Diện tích hình chữ nhật</h1></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">Chiều dài:</td>
            <td> <input type="text" name="cd" value="<?php if (isset($cd)) echo $cd;?>"></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">Chiều rộng:</td>
            <td> <input type="text" name="cr" value="<?php if (isset($cr)) echo $cr;?>"></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">Diện tích</td>
            <td> <input type="text" name="area" style="background-color: lightpink; width: 150px" readonly
                        value="<?php if (isset($s)) echo $s; else echo "";?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính" style="font-family:cursive;">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
