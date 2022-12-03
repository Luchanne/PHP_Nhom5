<?php
$conn = mysqli_connect('localhost','root','','quanly_ban_sua') or
    die ('Khong the ket noi toi database'.
    mysqli_connect_error());
$squery1 = "SELECT * FROM hang_sua";
$result = mysqli_query($conn,$squery1);
echo "<p align ='center' style='color:#267ec7;'><font size ='10'><i> THÔNG TIN HÃNG SỮA <i></ font > </p>";
echo "<table align ='center' width ='700' border ='1' cellpadding='2'
    style ='border - collapse : collapse'>";
echo '<tr><th width ="50" > STT </th>
    <th width ="50" > Mã HS </th>
    <th width ="150" > Tên hãng sữa </th> 
    <th width ="300" > Địa chỉ </th>
    <th width ="120" > Điện thoại </th>
    <th width ="200" > Email </th></tr>';
    if( mysqli_num_rows ( $result )!=0) {
        $stt =1; 
        while ( $rows = mysqli_fetch_row ( $result )) {
            echo "<tr>";
            echo "<td>$stt </td>";
            echo "<td>$rows[0] </td>";
            echo "<td>$rows[1] </td>";
            echo "<td>$rows[2] </td>";
            echo "<td>$rows[3] </td>";
            echo "<td>$rows[4] </td>";
            echo "</tr>";
            $stt++;
        }
    }
mysqli_close($conn);
?>