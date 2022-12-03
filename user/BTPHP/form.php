<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="./config.php"method= "POST">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Enter Your Information</h3>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a>Full name : </a>
                </td>
                <td>
                    <input type= "text" name= "ten"
                        value="<?php
                        ?>" required><br>
                </td>
            </tr>
            
            <tr>
                <td align="right">
                    <a>Address : </a>
                </td>
                <td>
                    <input type= "text" name= "dc"
                        value="<?php
                        ?>" required><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a>Phone : </a>
                </td>
                <td>
                    <input type= "text" name= "sdt"
                        value="<?php
                        ?>" required><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a">Gender : </a>
                </td>
                <td>
                    <input type="radio" name="gt" value="Nam"  checked>
                        <a>Nam</a>
                    <input type="radio" name="gt" value="Nu" >
                        <a>Nữ</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a>Country : </a>
                </td>
                <td>
                <select name="quocgia" id="cars">
                    <option value="Việt Nam" >Việt Nam</option>
                    <option value="Úc">Úc</option>
                    <option value="Hàn Quốc">Hàn Quốc</option>
                    <option value="Singgapore">Singgapore</option>
                </select>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a >Study : </a>
                </td>
                <td>
                    <input type="checkbox" name="hoc" value="PHP & MySQL" >
                        <a>PHP & MySQL</a>
                    <input type="checkbox" name="hoc" value="ASP.NET" >
                        <a>ASP.NET</a>
                    <input type="checkbox" name="hoc" value="CCNA" >
                        <a >CCNA</a>
                    <input type="checkbox" name="hoc" value="SERCURITY+" >
                        <a">SERCURITY+</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a>Note : </a>
                </td>
                <td>
                    <textarea type= "text" name= "note" required >
                    </textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td >
                    <input type= "submit" name='submit' value="Gửi" 
                        >
                    <input type= "reset" name='reset' value="Hủy" 
                        >
                </td>                
            </tr>

        </table>
    </form>
</body>



</html>