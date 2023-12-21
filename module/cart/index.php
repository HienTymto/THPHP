<?php
$ac= getIndex("ac");

if ($ac=="add")
{
	$quantity = getIndex("quantity", 1);
	$id = getIndex("id");
	$cart->add($id, $quantity);
}
//Biến $cart được tạo từ trang chủ index.php
$cart->show();
?> 	

<section class="vh-100" style="background-color: #EEB893;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Giỏ hàng </span><span class="h4"></span></p>

        <div class="card mb-4">
          <div class="card-body p-4">
          <?php
              $cart = new Cart();
              $list = $cart->show();
              foreach ($list as $r) {
                ?>
            <div class="row align-items-center">
              <div class="col-md-2">
                <img src="<?php echo $r['anh']; ?>"
                  class="img-fluid" alt="Generic placeholder image">
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Tên sản phẩm</p>
                  <p class="lead fw-normal mb-0"><?php echo $r['tensp']; ?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Số lượng</p>
                  <p class="lead fw-normal mb-0"><?php echo $cart->getQuantity($r['masp']); ?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Giá tiền</p>
                  <p class="lead fw-normal mb-0"><?php echo $r['gia']; ?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Tổng tiền</p>
                  <p class="lead fw-normal mb-0"><?php echo $r['gia'] * $cart->getQuantity($r['masp']); ?> VND</p>
                </div>
              </div>
            </div>
                <?php } ?>
          </div>
        </div>

        <div class="card mb-5">
          <div class="card-body p-4">

            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">Tổng thanh toán</span> <span
                  class="lead fw-normal"><?php echo $cart->getTotal(); ?> VND</span>
              </p>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <a type="button" href="index.php" class="btn btn-light btn-lg me-2">Về trang chủ</a>
          <button type="button" class="btn btn-primary btn-lg">Thanh toán</button>
        </div>

      </div>
    </div>
  </div>
</section>