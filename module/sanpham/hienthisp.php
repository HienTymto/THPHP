<?php
if (!defined("ROOT"))
{
	echo "Err!"; exit;	
}
$maxx = getIndex("maxx", "all");
$sql ="select * from sanpham WHERE 1=1 ";
$arr = array();
if ($maxx !="all")
{	$sql .=" and maxx =:maxx ";
	$arr[":maxx"] = $maxx;
}

$list = $sp->exeQuery($sql, $arr);
echo "Có ".$sp->getRowCount() ." kết quả";
foreach($list as $r)
{
	?>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">  <?php echo $r["tensp"]; ?></h5>
    <p class="card-text">  <?php echo $r["mota"]; ?></p>
    <a href="#" class="btn btn-primary">Đặt hàng</a>
  </div>
</div>
    <?php	
}

?>