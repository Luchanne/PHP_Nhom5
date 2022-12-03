<?php    
    if(isset($_GET['phan']) && isset($_GET['bt'])){
        $phan=$_GET['phan'];
        $bt=$_GET['bt'];
        switch($phan){
            case 'form':
                switch($bt)
                {
                    case '1':
                        include "../user/BTPHP/hcn.php";
                        break;

                    case '2':
                        include "../user/BTPHP/Hinhtron.php";
                        break;
                        
                    case '3':
                        include "../user/BTPHP/tiendien.php";
                        break;

                    case '4':
                        include "../user/BTPHP/kqthidh.php";
                        break;
                    
                    case '5':
                        include "../user/BTPHP/karaoke.php";
                        break;
                    
                    case '6':
                        include "../user/BTPHP/Trangnhaplieu.php";
                        break;

                    case '7':
                        include "../user/BTPHP/BT07.php";
                        break;

                    case '8':
                        include "../user/BTPHP/form.php";
                        break;

                    default:
                        include "../user/page/home.php";
                        break;
                }
                break;

            case 'mang':
                switch($bt)
                {
                    case '1':
                        include "../user/BTPHP/BT01.php";
                        break;

                    case '2':
                        include "../user/BTPHP/baitapmang2.php";
                        break;
                        
                    case '3':
                        include "../user/BTPHP/BT03.php";
                        break;

                    case '4':
                        include "../user/BTPHP/baitapmang4.php";
                        break;
                    
                    case '5':
                        include "../user/BTPHP/karaoke.php";
                        break;
                    
                    case '6':
                        include "../user/BTPHP/baitapmang6.php";
                        break;

                    case '7':
                        include "../user/BTPHP/mangamlich.php";
                        break;

                    default:
                        include "../user/page/home.php";
                        break;
                }
                break;

            case 'sql':
                switch($bt)
                {
                    case '1':
                        include "../user/BTPHP/btmysql/2_1.php";
                        break;

                    case '2':
                        include "../user/BTPHP/btmysql/sql2.2.php";
                        break;
                        
                    case '3':
                        include "../user/BTPHP/btmysql/sql2.3.php";
                        break;

                    case '4':
                        include "../user/BTPHP/btmysql/sql2.4.php";
                        break;
                    
                    case '5':
                        include "../user/BTPHP/btmysql/2_5.php";
                        break;
                    
                    case '6':
                        include "../user/BTPHP/btmysql/sql2.6.php";
                        break;

                    case '7':
                        include "../user/BTPHP/btmysql/sql2.7.php";
                        break;

                    case '8':
                        include "../user/BTPHP/btmysql/sql2.8.php";
                        break;
                    
                    case '9':
                        include "../user/BTPHP/btmysql/sql2.9.php";
                        break;
    
                    case '10':
                        include "../user/BTPHP/btmysql/sql2.10.php";
                        break;
                    
                    default:
                        include "../user/page/home.php";
                        break;
                }
                break;

            default:
                include "../user/page/home.php";
                break;
        }

    }else{
?>   
    <!-- Latest Product End -->
    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Bài tập</h2>
                        </div>
                    </div>
                            </div>
                    <div class="px-5 py-5" style="margin-left: 150px;margin-right: 150px;">
                    <div class="row bg-light px-5 py-3">
                    <div class="col-xs-12 col-md-4 d-flex justify-content-center">
                    <div style="align-items: center;">
                    <h2>Form</h2>
                        <p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=1"><b>Bài 1</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=2"><b>Bài 2</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=3"><b>Bài 3</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=4"><b>Bài 4</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=5"><b>Bài 5</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=6"><b>Bài 6</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=7"><b>Bài 7</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=form&bt=8"><b>Bài 8</b></a></p>
                    </div>
                    </div>
                    <div class="col-xs-12 col-md-4 d-flex justify-content-center">
                    <div style="align-items: center;">
                    <h2>Mảng</h2>
                        <p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=1"><b>Bài 1</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=2"><b>Bài 2</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=3"><b>Bài 3</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=4"><b>Bài 4</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=5"><b>Bài 5</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=6"><b>Bài 6</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=mang&bt=7"><b>Bài 7</b></a></p>
                    </div>
                    </div>
                    <div class="col-xs-12 col-md-4 d-flex justify-content-center">
                    <div style="align-items: center;">
                    <h2>SQL</h2>
                        <p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=1"><b>Bài 1</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=2"><b>Bài 2</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=3"><b>Bài 3</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=4"><b>Bài 4</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=5"><b>Bài 5</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=6"><b>Bài 6</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=7"><b>Bài 7</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=8"><b>Bài 8</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=9"><b>Bài 9</b></a></p>
                        <p><a style="font-size:30px;color:black;" href="index.php?act=baitap&phan=sql&bt=10"><b>Bài 10</b></a></p>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    }
?>