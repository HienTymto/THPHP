<?php
class Cart extends Db{
	private $_cart;
	private $_num_item =0;
	public function  __construct()
	{
		if(!isset($_SESSION["cart"])) $this->_cart= array();
		else $this->_cart = $_SESSION["cart"];
		$this->_num_item = array_sum($this->_cart);
		
	}
	
	public function getNumItem()
	{
		return $this->_num_item;	
	}
	public function __destruct()
	{
		$_SESSION["cart"] = $this->_cart;	
	}
	/*
	Them san pham có mã $masp và số lương $quantity vào giỏ hàng
	*/
	
	public function spExist($masp)
	{
		$sql="select * from sanpham where masp = '$masp' ";
		$temp = new Db();
		$temp->exeQuery($sql);
		if ($temp->getRowCount()==0) return false;
		return true;
	}
	public function add($masp, $quantity=1)
	{	
		if ($masp=="" || $quantity<1) return;
		if (!$this->spExist($masp)) return;
		print_r($this->_cart);		
		if (isset($this->_cart[$masp]))
			$this->_cart[$masp]+=	$quantity;
		else $this->_cart[$masp]=	$quantity;
		$_SESSION["cart"] = $this->_cart;	
		$this->_num_item = array_sum($this->_cart);
		echo "Da them $masp - $quantity ";
		echo "<script language=javascript>window.location='index.php?mod=cart';</script>";//Chuyển trình duyệt web tới trang hiển thị cart
	}
	
	public function remove($masp)
	{
		unset($this->_cart[$masp]);
		$this->_num_item = array_sum($this->_cart);
		$_SESSION["cart"] = $this->_cart;	
	}
	public function edit($masp, $quantity)
	{
		$this->_cart[$masp]	= $quantity;
		$this->_num_item = array_sum($this->_cart);
		$_SESSION["cart"] = $this->_cart;	
	}
	
	// public function show()
	// {
	// 	if (Count($this->_cart)==0) 
	// 	{	echo "Giỏ hàng rỗng";
	// 		return;
	// 	}
	// 	echo "<table border=\"1\"><tr><td>ID</td><td>Số lượng</td></tr>";
	// 	foreach($this->_cart as $masp=>$quantity)
	// 	{
	// 			echo "<tr><td>$masp</td><td>$quantity</td></tr>";
	// 	}
		
	// 	echo "</table>";	
	// 	$this->setCartInfo($this->getNumItem());
	// 	//Update số lượng item của cart trong header.php. Có thể không sử dụng method này nếu mỗi lần thêm xong, chuyển trang về mod=cart.
		
	// }
	public function show()
    {
        $sql = "SELECT * FROM sanpham WHERE masp IN (";
        $ids = array_keys($this->_cart);

        if (!empty($ids)) {
            $sql .= implode(',', array_fill(0, count($ids), '?'));
            $sql .= ")";
            $temp = new Db();
            return $temp->exeQuery($sql, $ids);
        }

        return []; // Return an empty array or handle the case when there are no items in the cart
    }
	public function getQuantity($masp)
    {
        return $this->_cart[$masp];
    }
	
	public function getTotal()
    {
        $total = 0;
        $list = $this->show();
        foreach ($list as $item) {
            $total += $item["gia"] * $this->_cart[$item["masp"]];
        }
        return $total;
    }

}
?>