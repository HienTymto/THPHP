<?php
include "../config/config.php";
if (!isset($_SESSION)) session_start();
include ("../classes/Db.class.php");
include("../classes/Admin.class.php");
$mess = "";
if (isset($_POST["login"])) {
    $ad = new Admin();
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    if ($username == "" || $pass == "") {
        $mess = "Sai thông tin đăng nhập!";
    } else {
        $result = $ad->login($username,$pass);
        if ($result) {
            $_SESSION["username"] = $username;
			$_SESSION["admin_login"] =1;
            header("Location: index.php");
            exit;
        } else {
            $mess = 'Đăng nhập thất bại';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    ntegrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #intro {
            height: 100vh;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #intro {
                margin-top: -58.59px;
            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div id="intro">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="login.php">
                            <div class="col text-center">
                                <p class="fs-1">Đăng nhập</p>
                            </div>
                            <div class="form-outline mb-4">
                                <input name="username" id="form1Example1" class="form-control" />
                                <label class="form-label" for="form1Example1">Email </label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="pass" type="password" id="form1Example2" class="form-control" />
                                <label class="form-label" for="form1Example2">Mật khẩu</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                        <label class="form-check-label" for="form1Example3">
                                            Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                </div>

                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <a href="#">Quên mật khẩu?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button name="login" type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            <div class="col text-center">
                                <a href="register.php">Chưa có tài khoản?</a>
                            </div>
                            <div class="col text-center">
                                <p class="text-danger"> <?php echo $mess ?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>