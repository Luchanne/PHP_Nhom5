<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 5px solid;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
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
    }else echo 'Kết nối thành công';

    $mysql= "select * from sua where Ma_sua = '".$_GET['id']."'";

    $result = mysqli_query($conn , $mysql );
?>
    <table style='font-weight: bold;'>
        <tr>
            <th colspan="5">
                <h1>
                    <?php
                        if( mysqli_num_rows ( $result ) !=0){
                            while ( $row = mysqli_fetch_row($result)){
                                echo $row[1];
                    ?>
                </h1>
            </th>
        </tr>
        <tr>
            <td>
                <?php
                    $r = rand(-100,100);
                    if( $r % 2 === 1)
                    echo "<img src='../../BTPHP/btmysql/images/suabot.jpg' height='200' width='200'>";
                    else echo "<img src='../../BTPHP/btmysql/images/suacogaihalan.jpg' height='200' width='200'>";
                ?>
            </td>
            <td>
                <?php
                    echo "<h2> Thành phần dinh dưỡng:</h2>";
                    echo $row[6]."<br>";
                    echo "<h2> Lợi ích:</h2>";
                    echo $row[7]."<br>";
                    echo "";
                        echo "Trọng lượng: ";
                        echo "".$row[4]."g -";
                        echo " Đơn giá: "; 
                        echo "".$row[5]." VND ";       
                    echo "</div>";
                    
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <a style='display: flex;justify-content: flex-end;'
                    href="javascript:window.history.back(-1);">Back</a>
            </td>
        </tr>
        <?php
            }}
        ?>
    </table>
</body>
</html>