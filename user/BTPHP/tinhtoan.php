<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action= "../form/tinhtoanConfig.php" method= "get">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: blue;">PHEP TINH TREN HAI SO</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 style="color:brown" align="right">Chon phep tinh : </h3>
                </td>
                <td>
                    <input type="radio" name="pheptinh" value="Cong" >
                        <a style="color: red;">Cong</a>
                    <input type="radio" name="pheptinh" value="Tru" >
                        <a style="color: red;">Tru</a>
                    <input type="radio" name="pheptinh" value="Nhan" >
                        <a style="color: red;">Nhan</a>
                    <input type="radio" name="pheptinh" value="Chia" >
                        <a style="color: red;">Chia</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">So Thu Nhat : </a>
                </td>
                <td>
                    <input type= "text" name= "a"
                        value="" require><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">So Thu Hai : </a> 
                </td>
                <td >
                    <input type= "text" name= "b" 
                        value=""   require>
                </td>
            </tr>

            <tr>
                <td></td>
                <td >
                    <input type= "submit" value="Tinh" 
                        style="border-width: 5;border-color: blue;">
                </td>                
            </tr>

        </table>
    </form>
</body>


<?php

?>
</html>