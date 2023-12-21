<?php
if (!defined("ROOT")) {
	echo "Err!";
	exit;
}
$sp = new SanPham();
$ac = getIndex("ac", "home");
if ($ac == "home") {
	include ROOT . "/module/sanpham/home.php";
}
if ($ac == "list") {
	include ROOT . "/module/sanpham/hienthisp.php";
}
if ($ac == "detail") {
	include ROOT . "/module/sanpham/detail.php";
}
if ($ac == "search") {
	include ROOT . "/module/sanpham/search.php";
}
