<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create account</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #D3D3D3;">
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname ="quanlyshop";
    $conn= mysqli_connect($servername, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
    if (isset($_POST["submit"])){
        if(isset($_POST["yes"])){
            $name=$_POST["name"];
            $sdt=$_POST["sdt"];
            $diachi=$_POST["diachi"];
            $email=$_POST["email"];
            $gioitinh = $_POST['gioitinh'];
            $pass=$_POST["pass"];
            $repass=$_POST["repass"];
            $sql_kt= "SELECT * FROM khachhang WHERE ten_kh='$name'";
            $query_kt = mysqli_query($conn,$sql_kt);
            $row_kt = mysqli_num_rows($query_kt);
            if($row_kt>0){
                $err2 = "User name đã tồn tại, mời nhập lại!!!";
            }
            if($pass !== $repass)
            {
                $err ="Hãy nhập lại mật khẩu!";
            }
            if(!isset($err) && !isset($err2)){
                $sql= "INSERT INTO khachhang (ten_kh, sdt, diachi, email_kh, gioitinh, matkhau_kh, anh) VALUES ('$name','$sdt','$diachi','$email','$gioitinh','$pass','avatar.jpg')";
                if (mysqli_query($conn, $sql)){
                    header('Location: ./login_page.php');
                }
            }
        }
        else{
            $err1 = "Bạn chưa đồng ý với điều khoản!";
        }
    }
?>
<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">ĐĂNG KÝ</p>
                                

                                <form class="mx-1 mx-md-4" method="post" action="">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="name"/>
                                            <label class="form-label" for="form3Example1c">User name</label>
                                            <div style="font-size: 16px; color: red">
                                                <?php
                                                    if (isset($err2)) echo $err2; else echo "";
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="sdt"/>
                                            <label class="form-label" for="form3Example1c">Số điện thoại</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="diachi"/>
                                            <label class="form-label" for="form3Example1c">Địa chỉ</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3c" class="form-control" name="email" />
                                            <label class="form-label" for="form3Example3c">Email</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>                                   
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="male" value="Nam">
                                        <label class="form-check-label" for="male">
                                            Nam
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="female"  style="margin-left:10px" checked value="Nữ">
                                        <label class="form-check-label" for="female">
                                            Nữ
                                        </label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" class="form-control" name="pass"/>
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cd" class="form-control" name="repass"/>
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                            <div style="font-size: 16px; color: red">
                                                <?php
                                                    if (isset($err)) echo $err; else echo "";
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" name="yes" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            Tôi đồng ý với tất cả điều khoản<a href="#!" style="color: black;font-weight: 700;">Terms of service</a>
                                        </label>
                                        <div style="font-size: 16px; color: red">
                                                <?php
                                                    if (isset($err1)) echo $err1; else echo "";
                                                ?>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg" name="submit" style="
                                                                                                                    background-color: #D3D3D3;
                                                                                                                    border: 1px;
                                                                                                                    color: black;">Đăng ký</button>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <label class="form-check-label" for="form2Example3">
                                            Bạn đã có tài khoản? <a href="./login_page.php"><u style="
                                                                                            color: black;">Đăng nhập ở đây</u></a>
<!--                                            I agree all statements in <a href="#!">Terms of service</a>-->
<!--                                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>-->
                                        </label>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src=".\img\registration.jpg"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
