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

    $arr=array();
    $maxarr=0;
    $minarr=20;
    $sumarr=0;

    function sx($arr, $kt){
        $mm = trim($arr);
        $a = explode(",",$mm);
        $d=0;
        $at=array();
        foreach($a as $key){
            if($key != ""){
                $at[]= $key;
            }
        }
        $a= $at;
        for ($i=0 ; $i < count($at) ; $i++)
                for ($j=$i+1 ; $j < count($at) ; $j++)
                {
                    if ($kt === true){
                        if ($a[$i] > $a[$j]){
                            $t = $a[$i];
                            $a[$i] = $a[$j];
                            $a[$j] = $t;
                        }
                    }
                    else 
                    {
                        if ($a[$i] < $a[$j]){
                            $t = $a[$i];
                            $a[$i] = $a[$j];
                            $a[$j] = $t;
                        }
                    }
                }
                


        return $a;
    }

?>
<form  method= "GET" >
        <table align="center" >
            <tr>
                <td colspan="3" align="center" bgcolor="#25a5be">
                    <h3 style="color: white; margin: 20px;">Sắp xếp Mảng</h3>
                </td>
            </tr>

            <tr >
                <td>
                    <a>Nhập Mảng: </a>
                </td>
                <td>
                    <input type= "text" name= "n"
                        value="<?php
                            if(isset($_GET['submit'])) echo $_GET['n'];
                        ?>" require><br>
                    
                </td>
                <td>
                <a style="color: red;">(*)  </a>
                </td>
            </tr>
            
            <tr>
                <td align = "center" >
                    <input type= "submit" name="submit" value="Sắp xếp Tăng/giảm"
                    >  
                </td>                
            </tr>
            <tr>
                <td colspan="2">
                    <a>Sau khi sắp xếp</a>
                </td>
            </tr>
            
            <tr >
                <td>
                    <a>Giảm dần: </a>
                </td>
                <td   >
                    <input type= "text" name="" value="<?php
                            if(isset($_GET['submit'])) {
                                foreach(sx($_GET['n'],false) as $key) echo $key." ";
                            }
                        ?>"readonly
                        style="background-color: #CCFCFD;">    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Tăng dần: </a>
                </td>
                <td >
                    <input type= "text" name="" value="<?php
                            if(isset($_GET['submit'])) {
                                foreach(sx($_GET['n'],true) as $key) echo $key." ";
                            }
                        ?>" readonly
                        style="background-color: #CCFCFD;">    
                </td>                
            </tr>
            <tr  style="background-color: #CCFCFD;">
                <td colspan="2" align="center">
                <a style="color: red;">(*)  </a>
                    <a>
                        (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>


</html>