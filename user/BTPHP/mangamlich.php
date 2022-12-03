<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid;
            width: 30%;
        }
    </style>
</head>
<body>
<?php

$hangchi  = array( "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tị", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất", "Hợi");
$hangcan  = array( "Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");

$anh = array(
    "./images/anh1.jpg",
    "./images/anh2.jpg",
    "./images/anh3.jpg",
    "./images/anh4.jpg",
    "./images/anh5.jpg",
    "./images/anh6.jpg",
    "./images/anh7.jpg",
    "./images/anh8.jpg",
    "./images/anh9.jpg",
    "./images/anh10.jpg",
    "./images/anh11.jpg",
    "./images/anh12.jpg",
);

    $can=0;
    $chi=0;
    if (isset($_GET['submit'])){
        $n= $_GET['nam'];
        $n =$n - 3;
        $can= $n % 10;
        $chi = $n % 12;
    }

    
?>
<form  method= "GET" >
        <table align="center" >
            <tr>
                <td colspan="3" align="center" bgcolor="#2587be">
                    <h3 style="color: white;">TÍNH NĂM ÂM LỊCH </h3>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <a>Năm dương lịch </a>
                </td>
                <td>
                <td align="center">
                    <a>Năm âm lịch</a>
                </td>
            </tr>
            <tr >
                <td align="center">
                    <input type= "text" name= "nam" size="5"
                        value="<?php
                            if(isset($_GET['submit'])) echo $_GET['nam'];
                        ?>" require><br>
                    
                </td>
                <td align="center">
                    <input type= "submit" name="submit" value="=>"
                    >
                </td>
                <td align="center">
                    <input type= "text" name="" size="8" readonly
                    value="<?php
                        if (isset($_GET['submit'])){
                            echo $hangcan[$can]." ".$hangchi[$chi];
                        }
                    ?>"
                    >
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <img src="<?php
                        echo $anh[$chi];
                    ?>" width="250" height="250">
                </td>
            </tr>
            
        </table>
    </form>
</body>

</html>