<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Form mảng của Lu chằn</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>

<?php 
    function tao_mang($n)
    {
        for($i=0;$i<$n;$i++)
        $mang[$i]=rand(0,20);
        return $mang;
    }                
    
    function xuat_mang($mang)
    {
        $n = count($mang);
        $chuoi = "";
        for($i=0;$i<$n;$i++)
        $chuoi = $chuoi . $mang[$i] . "#";
        return $chuoi;
    }

    function tinh_tong($mang){
        $n = count($mang);
        $tong = 0;
        for($i=0;$i<$n;$i++)
            $tong=$tong+$mang[$i];
        return $tong;
    }

    function tim_max($mang){
        $n = count($mang);
        $max = $mang[0];
        for($i=0;$i<$n;$i++){
            if($mang[$i]>$max)
            $max= $mang[$i];
        }
        return $max;
    }

    function tim_min($mang){
        $n = count($mang);
        $min = $mang[0];
        for($i=0;$i<$n;$i++){
            if($mang[$i]<$min)
            $min= $mang[$i];
        }
        return $min;
    }

    if(isset($_POST['n']))
    {
        $n=$_POST['n'];
        $mang = tao_mang($n);
        $mang_kq = xuat_mang($mang);
        $tong = tinh_tong($mang);
        $max = tim_max($mang);
        $min = tim_min($mang);
    }

    
?>
<form action="baitapmang2.php" method="post">
    <table align="center" bgcolor="#fce75d" width="450px">
        <tr>
            <td colspan="2"><h1 style="font-family:cursive;color:black;text-align:center;margin:20px;font-size:30px;">Form mảng của Lu chan</h1></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">Nhập số n: </td>
            <td> <input type="text" name="n" style="width: 250px" value="<?php  if (isset($_POST['n'])) echo $_POST['n'];  ?>"></td>
        </tr>
        <tr>
            <td>
            <td colspan="2" align="left">
                <input type="submit" name="thuchien" value="Phát sinh mảng ngẫu nhiên nè UwU" style="font-family:cursive;">
            </td>
        </tr>
  
        <tr>
            <td style="font-family:cursive;">a) Mảng ngẫu nhiên nè: </td>
            <td> <input type="text" name="ktra" style="width: 250px" readonly value="<?php if (isset($_POST['thuchien'])) echo $mang_kq; ?> "></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">b) Max nè: </td>
            <td> <input type="text" name="max" style="width: 250px" readonly value="<?php if (isset($_POST['thuchien']))
                                                                                                echo $max;
                                                                                                ?> "></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">c) Min nè: </td>
            <td> <input type="text" name="min" style="width: 250px" readonly value="<?php if (isset($_POST['thuchien']))
                                                                                                echo $min;
                                                                                                ?> "></td>
        </tr>
        <tr>
            <td style="font-family:cursive;">d) Tổng mảng nè: </td>
            <td> <input type="text" name="tong" style="width: 250px" readonly value="<?php if (isset($_POST['thuchien']))
                                                                                                echo $tong;
                                                                                                ?> "></td>
        </tr>
        <tr>
            <td td colspan="2" align="center">
            (<a style="color:red ;font-family:cursive;">Ghi chú:</a> <a style="font-family:cursive">Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</a>
        </tr>
    </table>
</form>

</body>
</html>