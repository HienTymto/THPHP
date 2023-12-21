<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./image/sanpham/icho" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./image/sanpham/icho" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./image/sanpham/icho" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
    <p class="text-center fs-2 fw-bolder">Giới thiệu chung</p>
    <p class="text-center fs-4">Shop bán pet đóng vai trò quan trọng trong việc nâng cao nhận thức của cộng đồng về việc chăm sóc và nuôi dưỡng thú cưng. Các shop bán pet cung cấp thông tin và tư vấn cho khách hàng về các vấn đề như dinh dưỡng, sức khỏe, hành vi,... của thú cưng.</p>
</div>
<div>
    <h3>Sản Phẩm</h3>
</div>
<div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
        <?php
        $list = $sp->getRand(10);
        foreach ($list as $r) {
        ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $r['anh']; ?>" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $r["tensp"]; ?><br /></h5>
                        <p class="card-text"><?php echo $r["mota"]; ?></p>
                        <a class="btn btn-success" href="index.php?mod=cart&ac=add&id=<?php echo $r["masp"]; ?>">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>