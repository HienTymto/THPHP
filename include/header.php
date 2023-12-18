<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    ntegrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <div>
            <a class="nav-link" href="index.php ">
              Trang Chủ
            </a>
          </div>
          <?php include("include/category.php"); ?>
          <div><a class="nav-link" href="index.php?mod=cart">Giỏ hàng (<span id="cart_sumary">
                <?php echo $cart->getNumItem();
                ?>
              </span>)</a></div>
          <form class="d-flex" role="search" action="index.php">
            <input type="hidden" name="mod" value="book" />
            <input type="hidden" name="ac" value="search" />
            <input class="form-control me-2" type="search" placeholder="Tìm Kiếm" aria-label="Search" name="key"
              value="<?php echo Utils::getIndex("key", ""); ?>">
            <button class="btn btn-outline-success" type="submit">Tìm</button>

      </div>
      <div class="nav-item">
      <a class="btn btn-outline-success me-2" href="login.php" type="button">Đăng nhập</a>
    </div>
      <div class="nav-item">
      <a class="btn btn-outline-success me-2" href="register.php" type="button">Đăng ký</a>
    </div>
    </div>
  </nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>