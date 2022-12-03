<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Các Loại Sữa</title>
</head>

<style>
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: solid 0.5px;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #FEE0C1;}
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
</style>


<body>
    <h1 style="text-align:center;color:#AA1F00;font-style:italic">Thông Tin Chi Tiết Các Loại Sữa</h1>
    <table align="center"  width: 600px;>
        <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="quanly_ban_sua";

             $conn=mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn) echo "Kết nối thất bại";
            mysqli_set_charset($conn, 'utf8');

            
            $rowsPerPage=2; // số lượng dòng 1 trang
            if ( ! isset($_GET['page']))
                $_GET['page'] = 1;
            $offset =($_GET['page']-1)*$rowsPerPage;

            $query="SELECT * FROM `sua` LIMIT $offset, $rowsPerPage;";
            
            $result = mysqli_query($conn,$query);
            if (!$result ) die ('<br> <b>Query failed</b>');
            $numRows= mysqli_num_rows($result); // Số dòng
            $maxPage = ceil($numRows / $rowsPerPage);
            
            if($numRows != 0) {
                $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
                if($temp<=$rowsPerPage) $num=0;
                else $num=$temp-$rowsPerPage;
                 while($rows=mysqli_fetch_array($result))
                {
                   echo '<tr bgcolor="#FFEEE6">
                        <th colspan="2">
                            <h1 style="color: #E1691B;">'.$rows["Ten_sua"].'</h1>
                        </th>
                    </tr>
                    <tr>
                            <td align="center">
                                <img width="160px" height ="200px" src="../../BTPHP/btmysql/images/suabot.jpg'.$rows["Hinh"].'">
                            </td>
                            <td>
                               <p><b>Thành phần dinh dưỡng:</b></p>
                                <p>'.$rows["TP_Dinh_Duong"].'</p>
                                <b>Lợi ích:</b>
                                <p>'.$rows["Loi_ich"].'</p>
                                <p><span ><b>Trọng lượng: </b><span style="color:red">'.$rows["Trong_luong"].'gr</span> - <b>Đơn giá: </b><span style="color:red">'.$rows["Don_gia"].' VNĐ</span></p>
                            </td>
                    </tr>';
                }
            }
        ?>
    </table>
    <?php 
        $re = mysqli_query($conn, 'select * from sua');
        $numRows = mysqli_num_rows($re);
        $maxPage = floor($numRows/$rowsPerPage) + 1;
        echo "<div class='center'>";

            if ($_GET['page'] > 1){
                echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a> "; //gắn thêm nút Back
            }
            for ($i=1 ; $i<=$maxPage ; $i++)
            {
                if ($i == $_GET['page'])
                {
                    echo '<b class="center">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
                }
                else {
                    echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
                }
            }
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">></a>";  //gắn thêm nút Next
            }
            echo " ";
            if (isset($_GET['page'])) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] = $maxPage) . ">>></a>";  //Gắn thêm nút NextMax
            }
            echo"</div>";
    ?>
</body>

</html>