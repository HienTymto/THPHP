<?php
if (!isset($_SESSION)) session_start();

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
    <div class="nav-item">
      <form action="dashboard.php" method="POST">
        <button name="logout"> Đăng xuất</button>
      </form>
    </div>
    </body>
</html>