<?php
class PhanLoai extends Db{
	
	
	public function delete($maloai)
	{
		$sql="delete from phanloai where maloai=:maloai ";
		$arr =  Array(":maloai"=>$maloai);
		return $this->exeNoneQuery($sql, $arr);	
	}
	
	public function getById($maloai)
	{
		$sql="select phanloai.* 
			from phanloai
			where  phanloai.maloai=:maloai ";
		$arr = array(":maloai"=>$maloai);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	
	public function getAll()
	{
		return $this->exeQuery("select * from phanloai");
	}
	
	public function saveEdit()
	{
		$id =Utils::postIndex("maloai", "");
		$name =Utils::postIndex("tenloai", "");
		if ($id =="" || $name=="") return 0;//Error
		$sql="update phanloai set tenloai=:name where maloai=:id ";
		$arr = array(":name"=>$name, ":id"=>$id);
		return $this->exeNoneQuery($sql, $arr);
		
	}
	public function saveAddNew()
	{
		$id =Utils::postIndex("maloai", "");
		$name =Utils::postIndex("tenloai", "");
		if ($id =="" || $name=="") return 0;//Error
		$sql="insert into phanloai(maloai, tenloai) values(:maloai, :tenloai) ";
		$arr = array(":maloai"=>$id, ":tenloai"=>$name);
		return $this->exeNoneQuery($sql, $arr);
		
	}

}
?>