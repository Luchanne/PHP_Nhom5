<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phép tính</title>
</head>
<body>
    <form action="./KQ.php" method="post">
        <table align="center">
            <tr>
                <td colspan="9" style="text-align:center;"><h2 style="color:blue;">PHÉP TÍNH TRÊN HAI SỐ</h2></td>
            </tr>
            <tr>
                <td style="color:#9c110c;"><b>Chọn phép tính:</b></td>
                <td style="color:#e00c04">
                    <input type="radio" name="choose" value="+">Cộng
                    <input type="radio" name="choose" value="-">Trừ
                    <input type="radio" name="choose" value="*">Nhân
                    <input type="radio" name="choose" value="/">Chia
                </td>
            </tr>
            <tr>
                <td style="color:blue;"><b>Số thứ nhất: </b></td>
                <td><input style="width: 90%" type="text" name="num1"></td>
            </tr>
            <tr>
                <td style="color:blue;"><b>Số thứ nhì: </b></td>
                <td><input type="text" style="width: 90%" name="num2"></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>