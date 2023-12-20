<?php
$sp = new SanPham();
if (isset($_GET['masp'])) {
  $masp = $_GET['masp'];
  $sp->delete($masp);
  }
if (!defined("ROOT"))
{
	echo "Err!"; exit;	
}
$list = $sp->getSP();
?>
<p class="fs-1 text-center fw-bold text-success">Danh sách sản phẩm</p>
<div>
<td><a class="btn btn-outline-success me-1" href="index.php?page=sanpham-add">Thêm sản phẩm</a></td>
</div>
<table class="table table-striped text-center">
  <tr><th> Mã Sản phẩm </th>
  <th> Tên Sản phẩm </th>
  <th> Số lượng </th>
  <th> Giá </th>
  <th colspan="2"> Action </th>
  </tr>
  <?php foreach($list as $r) { ?>
  <tr>
    <td><?php echo $r['masp']; ?></td>
    <td><?php echo $r['tensp']; ?></td>
    <td><?php echo $r['soluong']; ?></td>
    <td><?php echo $r['gia']; ?></td>
    <td><a class="btn btn-outline-success me-1" href="index.php?page=sanpham-update&masp=<?php echo $r['masp'] ?>">Sửa</a></td>
    <td><a class="btn btn-outline-success me-1" href="index.php?page=sanpham-list&masp=<?php echo $r['masp'] ?>">Xóa</a></td>
  </tr>
  <?php } ?>
</table>