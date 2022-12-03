<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        align-items: center;
        text-align: center;
        align-self: center;
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

    if (!$conn)
    {
        die('Connect failed: '. mysqli_connect_error());
    }else echo 'Kết nối thành công <br><br>';
    
    $result = mysqli_query ($conn , "select * from sua" );
    $d=0;
    echo "<tr>";
?>
    <table align="center">
        <tr>
            <th colspan="5" bgcolor="#Da9542"><h2  style="font-family:cursive;">Thông tin sản phẩm</h2></th>
        </tr>
        <?php
            if( mysqli_num_rows ( $result ) !=0){
                while ( $row = mysqli_fetch_row($result)){
                    $d++;
                    echo "<td align-item: 'center'; >";

                    echo "<a>".$row[1]."</a><br>";
                    echo "<a>".$row[4]."g - ".$row[5]." VND</a><br>";
                    $r = rand(-100,100);
                    if( $r % 2 === 1)
                        echo "<img src='../../BTPHP/btmysql/images/suabot.jpg' height='85' width='85'>";
                    else echo "<img src='../../BTPHP/btmysql/images/suacogaihalan.jpg' height='85' width='85'>";

                    echo "</td>";
                    if ($d%5 ===0 ) echo "</tr><tr>";
                }
            }

        ?>

    </table>
</body>
</html>