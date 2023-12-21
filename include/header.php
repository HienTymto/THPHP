<?php
if (!isset($_SESSION)) session_start();
include "classes/User.class.php";
 ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="image/book/hinhlogo.jpg" height="150" alt=" Logo" loading="lazy" />
        </a>
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
                <?php include("include/category.php");?>
                <div><a class="nav-link" href="index.php?mod=cart">Giỏ hàng (<span id="cart_sumary"><?php echo  $cart->getNumItem();
                                                                                              ?></span>)</a></div>
            </ul>
            <form class="d-flex" role="search" action="index.php">
                <input type="hidden" name="mod" value="sanpham" />
                <input type="hidden" name="ac" value="search" />
                <input class="form-control me-2" type="search" placeholder="Tìm Kiếm" aria-label="Search" name="key"
                    value="<?php echo Utils::getIndex("key", ""); ?>">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
        </div>
        <div>&nbsp</div>
        <?php 
      if (isset($_SESSION['user'])) {
       ?>
       <div class="nav-item">
      <a class="btn btn-outline-success me-2" href="dashboard.php" type="button">Dashboard</a>
    </div>
       <?php } else{ ?>
      <div class="nav-item">
      <a class="btn btn-outline-success me-2" href="login.php" type="button">Đăng nhập</a>
    </div>
      <div class="nav-item">
      <a class="btn btn-outline-success me-2" href="register.php" type="button">Đăng ký</a>
    </div>
    <?php } ?>
    </div>
    
</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>