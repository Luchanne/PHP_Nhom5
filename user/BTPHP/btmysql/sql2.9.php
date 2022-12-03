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
        
        .center {
            margin: 0px auto;
            align-self: center;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'quanly_ban_sua';
        $conn = mysqli_connect($servername,$username,$password,$database);

        if (!$conn)
        {
            die('Connect failed: '. mysqli_connect_error());
        }else echo 'Kết nối thành công<br><br>';

    $tk="";
    if (isset($_POST['submit'])){
        $tk = $_POST['tk'];
    }
?>
<body>
    <form method = "post">
        <table class='center'>
            <tr>
                <td colspan="3"  style="font-family:cursive;">
                    <h1>TÌM KIẾM THÔNG TIN SỮA</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 style="font-family:cursive;">Tên sữa:</h3>
                </td>
                <td>
                    <input type= "text" name= "tk" size="30"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['tk']
                        ?>" require>
                </td>
                <td>
                    <input type="submit" name="submit" style="font-family:cursive" value="Tìm" >
                </td>
            </tr>
        </table>
    </form>

<?php

        $mysql= "SELECT * from sua where Ten_sua LIKE '%".$tk."%'";
        $result = mysqli_query($conn,$mysql);

        echo"<div class='center'> <table>";

        if (mysqli_num_rows($result)===0)
        echo "<tr><td align='center'><h1 style='font-family:cursive;'>Không có kết quả</h1><td><tr>";
        else {
            

            if( mysqli_num_rows ( $result ) !=0){
                while ( $row = mysqli_fetch_row($result)){
                    echo "<tr>";
                        echo "<td colspan='2' style='background-color: #Da9542;font-family:cursive;' >";
                            echo "<h1 style='font-weight: bold; display: flex;justify-content: center;'>";
                                echo $row[1];
                            echo"</h1>";
                        echo "</td>";
                    echo "</tr>";
    
                    echo "<tr>";
                        echo "<td>";
                            $r = rand(-100,100);
                            if( $r % 2 === 1)
                            echo "<img src='../../BTPHP/btmysql/images/suabot.jpg' height='180' width='200'>";
                            else echo "<img src='../../BTPHP/btmysql/images/suacogaihalan.jpg' height='180' width='200'>";
                        echo "</td>";
    
                        echo "<td>";
                            echo "<h2 style='font-family:cursive;'>Thành phần dinh dưỡng:</h2>";
                            echo $row[6]."<br>";
                            echo "<h2 style='font-family:cursive;'> Lợi ích:</h2>";
                            echo $row[7]."<br>";
                            echo "<div style='font-weight: bold; display: flex;justify-content: flex-end;'>";
                                echo "<a style='font-weight: bold;font-family:cursive; '>Trọng lượng: </a>";
                                echo "<a style='font-family:cursive;'>".$row[4]."g -  </a><br>";
                                echo "<a style='font-weight: bold;font-family:cursive;'>Đơn giá: </a>"; 
                                echo "<a > ".$row[5]." VND</a><br>";       
                            echo "</div>";
                        echo "</td>";
                    echo "</tr>";
                }
            }       
        }
        echo"</table> </div>";   
?>
</body>
</html>