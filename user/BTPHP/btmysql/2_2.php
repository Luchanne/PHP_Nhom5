<?php
$conn = mysqli_connect('localhost','root','','quanly_ban_sua') or
    die ('Khong the ket noi toi database'.
    mysqli_connect_error());
$squery1 = "SELECT * FROM khach_hang";
$result = mysqli_query($conn,$squery1);
echo "<p align ='center' style='color:black;'><font size ='10'><b> THÔNG TIN KHÁCH HÀNG </b></ font > </p>";
echo "<table align ='center' width ='700' border ='1' cellpadding='3'
    style ='border - collapse : collapse'>";
echo "<tr style='color:#e84f4f'>
    <th width ='50' > Mã KH </th>
    <th width ='200' > Tên khách hàng </th> 
    <th width ='50' > Giới tính </th>
    <th width ='300' > Địa chỉ </th>
    <th width ='100' > Số điện thoại </th></tr>";
    if( mysqli_num_rows ( $result )!=0) {
        $stt=1;
        while ( $rows = mysqli_fetch_row ( $result )) {
            if($stt%2==0){
                echo "<tr>";
            }else echo "<tr bgcolor='#f5ae9d'>";
            echo "<td>$rows[0] </td>";
            echo "<td>$rows[1] </td>";
            echo "<td align ='center'>$rows[2] </td>";
            echo "<td>$rows[3] </td>";
            echo "<td>$rows[4] </td>";
            echo "</tr>";
            $stt++;
        }
    }
mysqli_close($conn);
?>