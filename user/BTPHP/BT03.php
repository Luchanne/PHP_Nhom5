<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mảng</title>
</head>
<body>
<?php
function taoMang($n)
{
    $arr = [];
    for($i = 0; $i < $n; $i++)
    {
        $arr[$i] = rand(0,20);
    }
    return $arr;
}
function xuatMang($arr, $n)
{
    for($i = 0; $i < $n; $i++){
        echo "$arr[$i] ";
       }
}
function timMin($arr, $n)
{
    $min = $arr[0];
    for($i = 0; $i < $n; $i++){
        if($arr[$i] <= $min)
        {
            $min = $arr[$i];
        }
       }
    return $min;
}
function timMax($arr, $n)
{
    $max = $arr[0];
    for($i = 0; $i < $n; $i++){
        if($arr[$i] >= $max)
        {
            $max = $arr[$i];
        }
       }
    return $max;
}
function sumArr($arr, $n)
{
    $sum = 0;
    for($i = 0; $i < $n; $i++){
            $sum = $sum + $arr[$i];
       }
    return $sum;
}
if(isset($_POST["sub"]))
{
    $n = $_POST["n"];

    if(isset($n))
    {
        $arr = taoMang($n);
        $minArr = timMin($arr, $n);
        $maxArr = timMax($arr, $n);
        $sumArr = sumArr($arr, $n);
    }
}
?>
<form action="" method="post">
<table align="center" style="border:1px solid black;" bgcolor="#faedf4">
    <tr>
        <td colspan="2" bgcolor="#bf20c7" style="text-align:center;"><h2 style="color:white;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2></td>
    </tr>
    <tr bgcolor="#f5cee4">
        <td>Nhập số phần tử:</td>
        <td><input type="text" name="n" value="<?php if(isset($n)) echo $n; else echo ""?>"></td>
    </tr>
    <tr bgcolor="#f5cee4">
        <td></td>
        <td><button type="submit" name="sub" style="background-color:#f7f379;">Phát sinh và tính toán</button></td>
    </tr>
    <tr>
        <td>Mảng:</td>
        <td><textarea name="arr" cols="30" rows="5" style="background-color:#f09090" disabled ><?php if(isset($arr)) {
           xuatMang($arr,$n);
        } else echo ""?></textarea></td>
    </tr>
    <tr>
        <td>GTLN (Max) trong mảng:</td>
        <td><input type="text" style="background-color:#f09090" disabled value="<?php if(isset($maxArr)) echo $maxArr; else echo ""?>"> </td>
    </tr>
    <tr>
        <td>GTNN (Min) trong mảng:</td>
        <td><input type="text"  style="background-color:#f09090" disabled value="<?php if(isset($minArr)) echo $minArr; else echo ""?>"></td>
    </tr>
    <tr>
        <td>Tổng mảng:</td>
        <td><input type="text" name="sumArr" style="background-color:#f09090" disabled value="<?php if(isset($sumArr)) echo $sumArr; else echo ""?>"></td>
    </tr>
    <tr>
        <td colspan = "2" style="text-align:center;"><p>(<font color="red">Ghi chú: </font>các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</p></td>
    </tr>
</table>
</form>
</body>
</html>