<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trangketqua.php</title>
</head>
<body>

<style>
    .title{
    color: cornflowerblue;
    text-align: center;
    text-transform: uppercase;
}
.second-left{
    color: #ff0a07 ;
    font-weight: bold;
    text-align: right;
}
.second-right{
    color: #ff0a07 ;
}
.third-four-left{
    color: blue;
    text-align: right;
}
</style>



<?php
$pheptinh=$so1=$so2=$ketqua="";
if(isset($_POST["submit"])&& isset($_POST["phep_tinh"]))
{
    $so1=$_POST["n1st"];
    $so2=$_POST["n2nd"];
    switch ($_POST["phep_tinh"]) {
        case "Cong": {$pheptinh="Cộng";$ketqua=$so1+$so2;break;}
        case "Tru": {$pheptinh="Trừ";$ketqua=$so1-$so2;break;}
        case "Nhan": {$pheptinh="Nhân";$ketqua=$so1*$so2;break;}
        case "Chia": {$pheptinh="Chia";$ketqua=$so1/$so2;break;}
        case "Phan_Tram": {
            $pheptinh="Phần Trăm";
            if ($so2==0) $ketqua="Không cho phép chia cho 0";
            else $ketqua=$so1%$so2;
            break;
        }
        default: echo "Sai phép toán, mời nhập lại!";
    };
}
?>


<table align="center">
    <tr>
        <td colspan="2">
            <h1 class="title">
                Phép tính trên hai số
            </h1>
        </td>
    <tr>
        <td class="second-left">Phép tính đã chọn: </td>
        <td class="second-right">
            <input type="radio" name="PhepTinh" checked> <?php echo $pheptinh?>
        </td>
    </tr>
    <tr>
        <td class="third-four-left">Số thứ nhất: </td>
        <td>
            <input type="text" name="so1" value="<?php echo $so1 ?>">
        </td>
    </tr>
    <tr>
        <td class="third-four-left">Số thứ hai: </td>
        <td>
            <input type="text" name="so2" value="<?php echo $so2 ?>">
        </td>
    </tr>
    <tr>
        <td class="third-four-left">Kết quả: </td>
        <td> <input type="text" name="ketqua" value="<?php echo $ketqua ?>"> </td>
    </tr>
    <tr>
        <td></td>
        <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
    </tr>
</table>

</body>
</html>