<div class="left-sidebar bg-success">
<h3>Admin Panel</h3>
<ul class="nav flex-column collapsible mt-4">

<!--- Dashboard--->
<li class="nav-item">
    <a href="index.php" class="nav-link">
    <i class="fa fa-home"></i> Dashboard
    </a>
</li>

  <!--- Website content--->
  <li class="nav-item toggle">
    <a class="nav-link" href="#"><i class="fa fa-laptop"></i> Nội dung</a>

    <ul class="nav flex-column toggle-list">
        <li class="nav-item">
            <a href="index.php?page=sanpham-list" class="nav-link">
            <i class="fa fa-list"></i> Danh sách
            </a>
        </li>
        <li class="nav-item">
            <a href="dashboard.php?page=donhang-list" class="nav-link">
            <i class="fa fa-list"></i> Đơn hàng
            </a>
        </li>
    </ul>
  </li>


     <li class="nav-item toggle">
    <a class="nav-link" href="#"><i class="fa fa-users"></i> Admins</a>

    <ul class="nav flex-column toggle-list">
        <li class="nav-item">
            <a href="index.php?page=profile" class="nav-link">
            <i class="fa fa-address-card-o"></i> Admins Profile
        </a>
        </li>
    </ul>
</li>



</ul>

</div>