<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" >
            <table align="center" style="background-color:	#20B2AA;">
                <td colspan="3" align="center" style="background-color:#008080;color:white">
                    <h1>Thanh toán karaoke</h1>
                </td>
                <tr>
                    <td>Giờ bắt đầu: </td>
                    <td><input type="text" name="csc" 
                    value="<?php 
                        if(isset($_POST['reset'])) echo '';
                        else if(isset($_POST['csc'])){
                                if (is_numeric($_POST['csc'])) echo $_POST['csc'];
                                else echo 'Chi so cu phai la so!' ;}
                    ?>" required                   
                    ></td>
                    <td>(h)</td>
                </tr>
                <tr>
                    <td>Giờ kết thúc: </td>
                    <td><input type="text" name="csm" 
                    value="<?php 
                        if(isset($_POST['reset'])) echo '';
                        else if(isset($_POST['csm'])){
                                if (is_numeric($_POST['csm'])) echo $_POST['csm'];
                                else echo 'Chi so moi phai la so!' ;}
                    ?>" required
                    ></td>
                    <td>(h)</td>
                </tr>
                <tr>
                    <td>Tiền thanh toán: </td>
                    <td><input type="text" name="tt" style="background-color: yellow;" readonly
                    value="<?php 
                    if(isset($_POST['reset'])) echo '';
                    else if((isset($_POST['csm'])&&($_POST['csc']))&& ($_POST['csm'])>($_POST['csc'])) {
                        if ((is_numeric($_POST['csm'])&&($_POST['csc']))&&($_POST['csc'])>9 && ($_POST['csm'])<25)
                        {
                            if(($_POST['csc'])>9 && ($_POST['csm'])<18) echo ((($_POST['csm'])-($_POST['csc']))*20000);
                            else if(($_POST['csc'])>16 && ($_POST['csm'])<25) 
                            {
                                echo ((($_POST['csm'])-($_POST['csc']))*45000);   
                            }
                            else {echo ((($_POST['csm'])-17)*45000+140000);}
                        }}
                        else echo 'Giờ kết thúc phải > Giờ bắt đầu';
                    ?>"
                    ></td>
                    <td>(VNĐ)</td>
                </tr>               
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Tinh">
                        <input type="submit" name="reset" value="Delete">
                    </td>
                </tr>
            
            </table>
        </form>
</body>
</html>