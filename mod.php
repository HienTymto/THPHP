<?php
$mod = getIndex("mod", "sanpham");

if ($mod == "sanpham")
	include "module/sanpham/index.php";
if ($mod == "news")
	include "module/news/index.php";
if ($mod == "cart")
	include "module/cart/index.php";
