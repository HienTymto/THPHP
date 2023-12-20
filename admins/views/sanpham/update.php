<?php
ob_start();
$sp = new SanPham();
$pl = new PhanLoai();
$kl = new KieuLoai();
$getpl = $pl->getAll();
$getkl = $kl->getAll();
$mess="";
if (isset($_GET['masp'])) {
    $masp = $_GET['masp'];
    $list = $sp->getDetail($masp);
    }
if (isset($_POST["updatesp"])) {
    $masp = $_POST["masp"];
    $tensp = $_POST["tensp"];
    $mota = $_POST["mota"];
    $soluong = $_POST["soluong"];
    $gia = $_POST["gia"];
    $maloai = $_POST["maloai"];
    $maxx = $_POST["maxx"];
    if ($masp == "" || $tensp == "" || $mota == "" || $soluong == "" || $gia == "" || $maloai == "" || $maxx == "") {
        $mess = "Không để trống thông tin!";
    } else {

        $result = $sp->updateSP($masp, $tensp, $mota, $gia, $soluong, $maloai, $maxx);
        if ($result) {
            $mess = "Sửa sản phẩm thành công!";
            unset($_POST["themsp"]);
           header ('location: index.php?page=sampham-list');
        } else {
            $mess = "Sửa sản phẩm thất bại!";
        }
    }
}
?>
<div>
    <div>
        <p class="h1 text-primary">Thêm sản phẩm</p>
    </div>
    <form action="index.php?page=sanpham-update" method="POST">
        <div class="container form-group pt-5 ">
            <div> <p class="text-success"><?php echo $mess ?></p></div>
            <div class="row">
                <div class="col-6">
                    <div class="container form-group pt-5">
                        <label class="form-label">Mã sản phẩm:</label>
                        <input type="text" class="form-control" name="masp" value="<?php echo $list['masp']; ?>">
                    </div>
                    <div class="container form-group pt-5">
                        <label class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="tensp" value="<?php echo $list['tensp']; ?>">
                    </div>
                    <div class="form-group container pt-5">
                        <label class="form-label">Mô tả:</label>
                        <textarea class="form-control" rows="3" name="mota"> <?php echo $list['mota']; ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="container form-group pt-5">
                        <label class="form-label">Số lượng:</label>
                        <input type="text" class="form-control" name="soluong" value="<?php echo $list['soluong']; ?>">
                    </div>
                    <div class="container form-group pt-5">
                        <label class="form-label">Giá:</label>
                        <input type="text" class="form-control" name="gia" value="<?php echo $list['gia']; ?>">
                    </div>
                    <div class="row">

                        <div class="col-6 container form-group pt-5">
                            <select class="form-select" aria-label="Disabled select example" name="maloai">
                                <option selected value="<?php echo $list['maloai']; ?>"><?php echo $list['tenloai']; ?></option>
                                <?php foreach ($getpl as $key) { ?>
                                    <option value="<?php echo $key['maloai']; ?>"><?php echo $key['tenloai']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 container form-group pt-5">
                            <select class="form-select" aria-label="Disabled select example" name="maxx">
                                <option selected value="<?php echo $list['maxx']; ?>"><?php echo $list['nuocxx']; ?></option>
                                <?php foreach ($getkl as $a) { ?>
                                    <option value="<?php echo $a['maxx']; ?>"><?php echo $a['nuocxx']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group btn-them-bai-viet container pt-5 d-flex justify-content-end">
                <button name="updatesp" type="submit" class="btn btn-primary">Lưu</button>
            </div>

    </form>
</div>
<?php ob_end_flush(); ?>