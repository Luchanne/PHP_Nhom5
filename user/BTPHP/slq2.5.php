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
            margin: 20;
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
    $sql = " SELECT * FROM  sua";
    $sql1 = " SELECT * FROM  hang_sua";
    $sql2 = " SELECT * FROM  loai_sua";

    $result = mysqli_query ($conn , $sql );
    $resultHang = mysqli_query ($conn , $sql1 );
    $resultLoaiSua = mysqli_query ($conn , $sql2 );
    echo "<table>";
    echo "<tr align='center'><td  colspan='2'><h1 align='center'>THONG TIN KHACHHANG</h1></td></tr>";
    
    if( mysqli_num_rows ( $result ) !=0){
        while ( $row = mysqli_fetch_row($result)) {
            echo "<tr>";
                // -Cot 1---
                echo "<td>";
                    echo "<img src='../../NguyenHoangNhatNguyen_BTPHP/btmysql/images2.5/".$row[8]."' height='80' width='80'>";
                echo "</td>";
                //--COt 2---
                echo"<td>";
                    echo"<a style='font-size: 20;font-weight: bold;'>".$row[1]."</a><br>";
                    // ----------nha sx-------
                    $sx= "not found";
                    $resultHang = mysqli_query ($conn , $sql1 );
                    if(mysqli_num_rows ($resultHang) !=0){
                        $check= mysqli_num_rows ( $resultHang );
                        while ( $rowTam = mysqli_fetch_row($resultHang)){
                            if ($rowTam[0] === $row[2]) $sx=$rowTam[1];
                        }
                        
                    }
                    echo"<a style='font-family:cursive;'>Nhà sản xuất: ".$sx."</a><br>";
                    mysqli_free_result($resultHang);

                    $resultLoaiSua = mysqli_query ($conn , $sql2 );
                    if(mysqli_num_rows ($resultLoaiSua) !=0){
                        $check= mysqli_num_rows ( $resultLoaiSua );
                        while ( $rowTam = mysqli_fetch_row($resultLoaiSua)){
                            if ($rowTam[0] === $row[3]) $loaiS=$rowTam[1];
                        }
                        
                    }
                    echo"<a >".$loaiS." - ".$row[4]." - ".$row[5]." VND</a>";
                    mysqli_free_result($resultLoaiSua);
                echo"</td>";
            echo "</tr>";
        }
    }

    echo "</table";
    mysqli_free_result($result);
    mysqli_close($conn);

?>
</body>
</html>