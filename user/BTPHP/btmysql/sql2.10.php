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

    $find="";
    $hangsua="AB";
    $loaisua="SB";
    if (isset($_POST['submit'])){
        $find = $_POST['find'];
        $hangsua= $_POST['hangsua'];
        $loaisua= $_POST['loaisua'];
    }
?>
<body>
    <form method = "post" action="">
        <table class='center'>
            <tr>
                <td colspan="4  ">
                    <h1 align="center" style="font-family:cursive;">TÌM KIẾM THÔNG TIN SỮA</h1>
                </td>
            </tr>
            <tr>
                <td  style="display: flex;justify-content: center;">
                    <a style="font-family:cursive;">Loại sữa</a>
                        <select name="loaisua" >
                            <?php
                                $query = "SELECT * FROM loai_sua";
                                $result = mysqli_query ($conn , $query );
                                if( mysqli_num_rows( $result ) !=0){
                                    while ( $row = mysqli_fetch_row($result)) {
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                    }
                                }
                            ?>
                        </select>
                </td>
                <td>
                <td>
                <a  style="font-family:cursive;">Hãng sữa</a>
                        <select name="hangsua" >
                            <?php
                                $query = "SELECT * FROM hang_sua";
                                $result = mysqli_query ($conn , $query );
                                if( mysqli_num_rows( $result ) !=0){
                                    while ( $row = mysqli_fetch_row($result)) {
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                    }
                                }
                            ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>
                    <h3  style="font-family:cursive;">Tên sữa:</h3>
                </td>
                <td>
                    <input type= "text" name= "find" size="30"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['find']
                        ?>" required>
                </td>
                <td>
                    <input type="submit" name="submit" value="Tìm" >
                </td>
            </tr>
        </table>
    </form>

<?php
    

    $mysql= "SELECT * from sua inner join loai_sua on loai_sua.Ma_loai_sua = sua.Ma_loai_sua inner join hang_sua on hang_sua.Ma_hang_sua = sua.Ma_hang_sua where  Ten_sua LIKE '%".$find."%' and loai_sua.Ma_loai_sua like '".$loaisua."' and hang_sua.Ma_hang_sua like '".$hangsua."'  ";
    $result = mysqli_query($conn,$mysql);

    echo"<div class='center'> <table>";                            

    if (mysqli_num_rows($result)===0)     
    echo "<tr><td align='center'><h1>Không tìm thấy kết quả</h1><td><tr>";
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
                        echo "<h2 style='font-family:cursive'> Thành phần dinh dưỡng:</h2>";
                        echo $row[6]."<br>";
                        echo "<h2 style='font-family:cursive'> Lợi ích:</h2>";
                        echo $row[7]."<br>";
                        echo "<div style='font-weight: bold; display: flex;justify-content: flex-end;'>";
                            echo "<a style='font-weight: bold;font-family:cursive '> Trọng lượng: </a>";
                            echo "<a style='font-family:cursive'>".$row[4]."gam -  </a><br>";
                            echo "<a style='font-weight: bold;font-family:cursive'> Giá tiền: </a>"; 
                            echo "<a style='font-family:cursive' > ".$row[5]." VND</a><br>";       
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