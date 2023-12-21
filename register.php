<?php
include "config/config.php";
if (!isset($_SESSION)) session_start();
include "classes/Db.class.php";
include "classes/User.class.php";
$mess = "";
if (isset($_POST["register"])) {
  $us = new User();
  $email = $_POST["email"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"];
  $ten = $_POST["hoten"];
  $diachi = $_POST["diachi"];
  if ($email == "" || $pass1 == "" || $pass2 == "" || $ten == "" || $diachi == "") {
    $mess = "Không để trống thông tin!";
  } else {
    if ($pass1 != $pass2) {
      $mess = "Mật khẩu không trùng khớp!";
    } else {
      $result = $us->register_user($email, $ten, $pass1, $diachi);

      if ($result) {
        $mess = "Đăng ký thành công!";
        unset($_POST["register"]);
      } else {
        $mess = "Đăng ký thất bại. Vui lòng thử lại.";
      }
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
            <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="register.php">
              <div class="col text-center">
                <p class="fs-1">Đăng ký</p>
              </div>
              <div class="form-outline mb-4">
                <input name="email" type="email" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Email </label>
              </div>
              <div class="form-outline mb-4">
                <input name="hoten" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Họ và Tên </label>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input name="pass1" type="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Mật khẩu</label>
              </div>
              <div class="form-outline mb-4">
                <input name="pass2" type="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2"> Nhập lại mật khẩu</label>
              </div>
              <!-- 2 column grid layout for inline styling -->
              <div class="form-outline mb-4">
                <input name="diachi" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Địa chỉ </label>
              </div>
              <!-- Submit button -->
              <button name="register" type="submit" class="btn btn-primary btn-block">Đăng ký</button>
              <div class="col text-center">
                <a href="login.php">Đã có tài khoản?</a>
              </div>
              <div class="col ">
                <p class="text-danger"><?php echo $mess ?></p>
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

</html>