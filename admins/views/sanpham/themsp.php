<?php
$pl = new PhanLoai();
$kl = new KieuLoai();
$getpl = $pl->getAll();
$getkl = $kl->getAll();
$mess = "";
if (isset($_POST["themsp"])) {
    $sp = new SanPham();
   
    // $masp = $_POST["masp"];
    $tensp = $_POST["tensp"];
    $mota = $_POST["mota"];
    $soluong = $_POST["soluong"];
    $gia = $_POST["gia"];
    $anhPath = "";
    $maloai = $_POST["maloai"];
    $maxx = $_POST["maxx"];
    if (isset($_FILES['anh']) && $_FILES['anh']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../image/sanpham';
        $uploadFile = $uploadDir . basename($_FILES['anh']['name']);
        
        if (move_uploaded_file($_FILES['anh']['tmp_name'], $uploadFile)) {
            $anhPath = '../image/sanpham' . $_FILES['anh']['name'];
        }
    }
    if ($tensp == "" || $mota == "" || $soluong == "" || $gia == "" || $maloai == "" || $maxx == "") {
        $mess = "Không để trống thông tin!";
    } else {

        $result = $sp->addSP($tensp, $mota, $gia, $anhPath, $soluong, $maloai, $maxx);
        if ($result) {
            $mess = "Thêm sản phẩm thành công!";
            unset($_POST["themsp"]);
        } else {
            $mess = "Thêm sản phẩm thất bại!";
        }
    }
}
?>
<div>
    <div>
        <p class="h1 text-primary">Thêm sản phẩm</p>
    </div>
    <form action="index.php?page=sanpham-add" method="POST" enctype="multipart/form-data">
        <div class="container form-group pt-5 ">
            <div>
                <p class="text-success"><?php echo $mess ?></p>
            </div>
            <div class="d-flex justify-content-end">
  <td><a class="btn btn-outline-success me-1" href="index.php?page=sanpham-list">Danh sách</a></td>
</div>
            <div class="row">
                <div class="col-6">
                    <div class="container form-group pt-5">
                        <label class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="tensp">
                    </div>
                    <div class="form-group container pt-5">
                        <label class="form-label">Mô tả:</label>
                        <textarea class="form-control" rows="3" name="mota"></textarea>
                    </div>
                    <div class="container form-group pt-5">
                        <label class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" name="anh">
                    </div>
                </div>
                <div class="col-6">
                    <div class="container form-group pt-5">
                        <label class="form-label">Số lượng:</label>
                        <input type="text" class="form-control" name="soluong">
                    </div>
                    <div class="container form-group pt-5">
                        <label class="form-label">Giá:</label>
                        <input type="text" class="form-control" name="gia">
                    </div>
                    <div class="row">
                        <div class="col-6 container form-group pt-5">
                            <select class="form-select" aria-label="Disabled select example" name="maloai">
                                <option selected>Loại sản phẩm</option>
                                <?php foreach ($getpl as $key) { ?>
                                    <option value="<?php echo $key['maloai']; ?>"><?php echo $key['tenloai']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 container form-group pt-5">
                            <select class="form-select" aria-label="Disabled select example" name="maxx">
                                <option selected>Kiểu Loại</option>
                                <?php foreach ($getkl as $a) { ?>
                                    <option value="<?php echo $a['maxx']; ?>"><?php echo $a['nuocxx']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group btn-them-bai-viet container pt-5 d-flex justify-content-end">
                <button name="themsp" type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>

    </form>
</div>