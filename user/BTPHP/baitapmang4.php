<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    function timkiem($arr){
        $mm = trim($arr);
        $a = explode(",",$mm);
        $d=0;
        foreach($a as $key){
            if($key != ""){
                if($key === $_GET['find']) return $d;
                $d ++;
            }
        }
        return -1;
    }


?>
<form  method= "GET" >
        <table align="center" >
            <tr>
                <td colspan="2" align="center" bgcolor="#33999A">
                    <h3 style="color: white; margin: 20px;">TÌM KIẾM</h3>
                </td>
            </tr>

            <tr >
                <td align="left ">
                    <a>Nhập mảng: </a>
                </td>
                <td>
                    <input type= "text" name= "n"
                        value="<?php
                            if(isset($_GET['submit'])) echo $_GET['n'];
                        ?>" require><br>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Số cần tìm: </a>
                </td>
                <td   >
                    <input type= "text" name="find" value="<?php
                            if (isset($_GET['submit'])) echo $_GET['find'];
                        ?>" require size="8"
                        >    
                </td>                
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type= "submit" name="submit" value="Tìm Kiếm"
                    >    
                </td>                
            </tr>
            
            <tr >
                <td>
                    <a>Mảng: </a>
                </td>
                <td   >
                    <input type= "text" name="" value="<?php
                            if(isset($_GET['submit'])) {
                                echo $_GET['n'];
                            }
                        ?>"readonly
                       >    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Kết quả tìm kiếm: </a>
                </td>
                <td >
                    <input type= "text" name="" value="<?php
                            if(isset($_GET['submit'])) {
                                if (timkiem($_GET['n'])===-1) echo 'Không thấy bé ơiiii';
                                else{
                                    echo "Tìm thấy số ".$_GET['find']." tại vị trí ".timkiem($_GET['n'])." của mảng";
                                }
                            }
                        ?>" readonly
                    >    
                </td>                
            </tr>
            <tr  style="background-color: #72D1D0;">
                <td colspan="2" align="center">
                    <a>
                        (Các phần tử sẽ cách nhau bằng dấu ",")
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>


</html>