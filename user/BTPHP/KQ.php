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
        if(isset($_POST['choose'])&&isset($_POST['num1'])&&isset($_POST['num2']))
        {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            if(isset($num1) and is_numeric($num1) and isset($num2) and is_numeric($num2))
            {
            switch($_POST['choose']){
                case "+":
                    $kq = $num1 + $num2;
                    $phep = "Cộng";
                    break;
                case "-":
                    $kq = $num1 - $num2;
                    $phep = "Trừ";
                    break;
                case "*":
                    $kq = $num1 * $num2;
                    $phep = "Nhân";
                    break;
                case "/":
                    if($num2!=0)
                    {
                    $kq = $num1 / $num2;
                    $phep = "Chia";
                    }
                    else header("Location: javascript://history.go(-1)");
                    break;
                default:
                    echo "Nhập sai rồi";
            }
            }else header("Location: javascript://history.go(-1)");
        }else header("Location: javascript://history.go(-1)");
    ?>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2" style="text-align:center;"><h2 style="color:blue;">PHÉP TÍNH TRÊN HAI SỐ</h2></td>
            </tr>
            <tr>
                <td style="color:#9c110c;"><b>Chọn phép tính:</b></td>
                <td style="color:#e00c04">
                    <?php
                        if(isset($phep)) echo "$phep"; else echo "";
                    ?>
                </td>
            </tr>
            <tr>
                <td style="color:blue;"><b>Số 1</b></td>
                <td><input style="width: 90%" type="text" value="<?php if (isset($num1)) echo $num1; else echo"";?>" name="end"></td>
            </tr>
            <tr>
                <td style="color:blue;"><b>Số 2</b></td>
                <td><input type="text" style="width: 90%" value="<?php if (isset($num2)) echo $num2; else echo"";?>" name="end"></td>
            </tr>
            <tr>
                <td style="color:blue;"><b>Kết quả:</b></td>
                <td><input type="text"  value="<?php if (isset($kq)) echo $kq; else echo "";?> " name="result" disabled style="width: 90%"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><a href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
            </tr>
        </table>
    </form>
</body>
</html>