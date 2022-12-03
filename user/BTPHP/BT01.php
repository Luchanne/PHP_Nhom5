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
        if(isset($_POST["sub"]))
        {
            $n = $_POST["n"];
        }
           
    ?>
    <form action="" method="post">
        <table align="center">
           <tr>
                <td>Nhập n:</td>
                <td><input type="text" name="n" value="<?php if(isset($_POST["n"])) if(isset($_POST["reset"])) echo ""; else echo $n;?>" required></td>
           </tr>
           <tr>
                <td></td>
                <td><button type="submit" name="sub">Thực hiện</button>
                <button type="submit" name="reset">Reset</button></td>
           </tr> 
        </table>
    </form>

    <?php
        if(isset($_POST["sub"]))
        {
            if(isset($n))
            {
                if($n > 0 )
                {
                    $arr = [];
                    for($i = 0; $i < $n; $i++){
                        $arr[$i] = rand(-5, 10);
                    }
                    echo "Mảng phát sinh: ";
                    for($i = 0; $i < $n; $i++){
                        echo "$arr[$i], ";
                    }
                    echo "<br>Số phần tử Chẵn: ";
                    echo SoPhanTuChan($arr, $n);
                    echo "<br>Số phần tử nhỏ hơn 100: ";
                    echo SoPhanTuNhoHon100($arr, $n);
                    echo "<br>Tổng số âm: ";
                    echo TongSoAm($arr, $n);
                    echo "<br>Vị trí số âm: ";
                    ViTriPT0($arr, $n);
                    SapXepTD($arr, $n);
                    echo " <br> Đã sắp xếp:";
                    for($i = 0; $i < $n; $i++){
                        echo "$arr[$i], ";
                    }
                }
            }
        }

        function SoPhanTuChan($arr, $n){
            $dem= 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] % 2 == 0 && $arr[$i] != 0)
                {
                    $dem++;
                }
            }
            return $dem;
        }
        function SoPhanTuNhoHon100($arr, $n){
            $dem= 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] < 100)
                {
                    $dem++;
                }
            }
            return $dem;
        }

        function TongSoAm($arr, $n){
            $sum= 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] < 0)
                {
                    $sum = $sum + $arr[$i];
                }
            }
            return $sum;
        }

        function ViTriPT0($arr, $n){
            $dem = 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] == 0)
                {
                    $dem++;
                    echo "$i ";
                }
            }
            if($dem == 0)
            {
                echo "Không có số 0";
            }
        }
        function Doi(&$i, &$j)
        {
            $tam = $i;
            $i = $j;
            $j = $tam;
        }
        function SapXepTD(&$arr, $n){
            for($i = 0; $i < $n; $i++)
            {
                for($j = $i+1; $j < $n; $j++)
                {
                    if ($arr[$j] < $arr[$i])
                    Doi($arr[$i], $arr[$j]);
                }
            }
        }
    ?>
</body>
</html>