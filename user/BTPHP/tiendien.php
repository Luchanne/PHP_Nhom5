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

if (isset($_POST['reset'])){
    $_POST['tch']="";
    $_POST['csc']="";
    $_POST['csm']="";
}
?>
    <form method="post">
        <table bgcolor="#ebddea" align="center">
            <tr>
                <td colspan="2" align="center" bgcolor="#de8b10"><h1>Thanh toán tiền điện</h1></td>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="tch" value="<?php if (isset($_POST['tch'])) echo $_POST['tch']?>" required >
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="text" name="csc" value="<?php 
                                                        if (isset($_POST['reset']))
                                                            $_POST['csc']="";
                                                        else if (isset($_POST['csc'])){
                                                            if (is_numeric($_POST['csc'])) 
                                                                echo $_POST['csc'];
                                                        }else echo "Nhập lại đi ku!";
                                                          ?>" required> (KW)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="text" name="csm" value="<?php 
                                                        if (isset($_POST['reset']))
                                                            $_POST['csm']="";
                                                        else if (isset($_POST['csm'])){
                                                            if (is_numeric($_POST['csm'])) 
                                                                echo $_POST['csm'];
                                                        }else echo "Nhập lại đi ku!"; 
                                                            ?>" required> (KW)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text" name="gia" value="20000" required> (VNĐ)
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input type="text" name="thanhtoan" readonly style="background-color:#f2aced" value="<?php if(((isset($_POST['csm']) and ($_POST['csc'])) 
                                                                                                                    and ($_POST['csm']) > ($_POST['csc']) 
                                                                                                                    and (is_numeric($_POST['csm'])and($_POST['csc']))))
                                                                                                                    echo $tien=(($_POST['csm']-$_POST['csc'])*20000);
                                                                                                                    ?>" required> (VNĐ)
                </td>
            </tr>
            <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính tiền">
                <input type="submit" name="reset" value="Clear">
            </td>
        </tr>
        </table>
    </form>
</body>
</html>