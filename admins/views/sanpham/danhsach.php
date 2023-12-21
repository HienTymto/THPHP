<?php
$sp = new SanPham();
if (isset($_GET['delete'])) {
  $masp = $_GET['masp'];
  // Hiển thị modal xác nhận
  $sp->delete($masp);
  header ('location: ./index.php?page=sanpham-list');
}
if (!defined("ROOT")) {
  echo "Err!";
  exit;
}
$list = $sp->getSP();
?>
<p class="fs-1 text-center fw-bold text-success">Danh sách sản phẩm</p>
<div class="d-flex justify-content-end">
  <td><a class="btn btn-outline-success me-1" href="index.php?page=sanpham-add">Thêm sản phẩm</a></td>
</div>
<table class="table table-striped text-center" id="mytable">
  <?php if (isset($_SESSION['update'])) { ?>
    <p class="text-success"><?php echo '' . $_SESSION['update'] . '';
                            unset($_SESSION['update']);
                          } ?></p>
    <thead>
      <tr>
        <th class="text-center"> Mã Sản phẩm </th>
        <th class="text-center"> Tên Sản phẩm </th>
        <th class="text-center"> Số lượng </th>
        <th class="text-center"> Giá </th>
        <th class="text-center"> Action </th>
      </tr>
    </thead>
    <?php foreach ($list as $r) { ?>
      <tr>
        <td><?php echo $r['masp']; ?></td>
        <td><?php echo $r['tensp']; ?></td>
        <td><?php echo $r['soluong']; ?></td>
        <td><?php echo $r['gia']; ?></td>
        <td><a class="btn btn-outline-success me-1" href="index.php?page=sanpham-update&masp=<?php echo $r['masp'] ?>">Sửa</a>
          <!-- Gọi hàm xác nhận xóa khi nhấp vào liên kết Xóa -->
          <a class="btn btn-outline-success me-1" href="javascript:void(0);" onclick="confirmDelete('<?php echo $r['masp']; ?>')">Xóa</a>
        </td>
      </tr>
    <?php } ?>
</table>

<!-- Modal xác nhận xóa -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa sản phẩm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa sản phẩm này?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
        <!-- Thêm ID để xác định nút xác nhận trong JavaScript -->
        <button type="button" class="btn btn-primary" id="confirmDeleteButton">Xác nhận</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#mytable').DataTable();
  });

  // Hàm xác nhận xóa
  function confirmDelete(masp) {
    $('#confirmDeleteModal').modal('show');
    $('#confirmDeleteButton').click(function() {
      // Redirect to delete endpoint or handle delete here
      window.location.href = 'index.php?page=sanpham-list&delete=1&masp=' + masp;
    });
  }
</script>