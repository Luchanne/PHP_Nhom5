<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>
    <link rel="stylesheet" href="template/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>
<body style="background-color: #DDDDDD;">
<?php
    $conn= mysqli_connect("localhost", "root", "", "quanlyshop") or die('Không thể kết nối' . mysqli_connect_error());
    if (isset($_POST["submit"])){
        $pass=$_POST["pass"];
        $name=$_POST["name"];
        if (!$name || !$pass){
            $err="Hãy nhập username và password";
        }
        else {
            $sql = "SELECT  `ten_user`, `email_user`, `matkhau_user` FROM `user` WHERE '$name'=ten_user";
            $result=mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) 
            {
                $err1 = "$name chưa đăng ký!!!";
            }
            $row = mysqli_fetch_array($result);
                if($pass !== $row['matkhau_user']){
                    $err2 = "Hãy nhập lại password";
                } else {
                    header ('Location: ../admin/master.php');
                }
        }
    }
?>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src=".\img\lo.png"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">ĐĂNG NHẬP</p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" class="form-control form-control-lg" name="name"
                               placeholder="Enter a valid user name" />
                        <label class="form-label" for="form3Example3">Username</label>
                        <div style="font-size: 16px; color: red">
                        <?php
                            if (isset($err1)) echo $err1; else echo "";
                        ?></div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Enter password" name="pass" />
                        <label class="form-label" for="form3Example4">Password</label>
                        <div style="font-size: 16px; color: red">
                        <?php
                            if (isset($err2)) echo $err2; else echo "";
                        ?></div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Ghi nhớ 
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #666666; border: 1px;color: black;" name="submit">Đăng nhập</button>
                    </div>
                        
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5" style="background: grey;">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
        </div>
        <!-- Right -->
    </div>
</section>
</body>
</html>
