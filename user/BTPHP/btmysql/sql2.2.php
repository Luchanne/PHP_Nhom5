<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        border-collapse: collapse;
        border: 1px solid black;
        } 
        td{
            border: 1px solid black;
        }
        th {
            background-color: black;
            border: 1px solid black;
            color: white;
            text-align: center;
        }
    
    </style>
</head>
<body>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quanly_ban_sua';

    $conn = mysqli_connect($servername,$username,$password,$database);

    $mysql = " SELECT * FROM  khach_hang";
    $result = mysqli_query ($conn , $mysql );
    echo "<table>";
    echo "<tr align='center'><td  colspan='5'><h1 align='center' style='font-family:cursive;>THÔNG TIN KHÁCH HÀNG</h1></td></tr>";
    echo "<tr>";
        echo "<th>Mã KH</th>";
        echo "<th>Tên hàng</th>";
        echo "<th>Giới tính</th>";
        echo "<th>Địa chỉ</th>";
        echo "<th>Số điện thoại</th>";
    $dem =0;
    echo "</tr>";
    if( mysqli_num_rows ( $result ) !=0){
        while ( $row = mysqli_fetch_row($result)) {
            $n = mysqli_num_fields($result);
            if ($dem %2 === 0)
            echo"<tr bgcolor='yellow'>";
            else echo"<tr>";
            for( $i = 0 ; $i < $n-1 ; $i++)
            {
                $gt = "";
                if ($row[$i] === '0') $gt="Nam"; else $gt="Nu";

                if ($i === 2) echo "<td align='center';>".$gt."</td>";
                else echo "<td>".$row[$i]."</td>";
            }
            echo"</tr>";

            $dem++;
        }
    }

    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);

?>
</body>
</html>