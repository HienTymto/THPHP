<?php
class User extends Db
{
	public function delete($email)
	{
		$sql = "delete from user where email=:email ";
		$arr =  array(":email" => $email);
		return $this->exeNoneQuery($sql, $arr);
	}

	public function getById($email, $pass)
	{
		$sql = "select user.* 
			from user
			where  user.email=:email ";
		$arr = array(":email" => $email , ":pass"=> $pass);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data) > 0) return $data[0];
		else return array();
	}

	public function getAll()
	{
		return $this->exeQuery("select * from user");
	}

	public function saveEdit()
	{
		$id = Utils::postIndex("email", "");
		$name = Utils::postIndex("ten", "");
		if ($id == "" || $name == "") return 0; //Error
		$sql = "update user set ten=:name where email=:id ";
		$arr = array(":name" => $name, ":id" => $id);
		return $this->exeNoneQuery($sql, $arr);
	}
	function register_user(string $email, string $ten, string $pass, string $diachi)
	{
		$sql = 'INSERT INTO user( email, pass, ten, diachi)
            VALUES(:email, :pass, :ten, :diachi)';

		$statement = $this->dbh->prepare($sql);

		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		$statement->bindValue(':pass', $pass, PDO::PARAM_STR);
		$statement->bindValue(':ten', $ten, PDO::PARAM_STR);
		$statement->bindValue(':diachi', $diachi, PDO::PARAM_STR);
		if (!$statement->execute()) {
			die(print_r($statement->errorInfo(), true));
		}
		
		return true;
	}
	function login_user(string $email, string $pass)
{
    $sql = 'SELECT * FROM user WHERE email = :email AND pass = :pass';
    $statement = $this->dbh->prepare($sql);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
	$statement->bindValue(':pass', $pass, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
	
    if ($user ) {
        return $user;
    } else {
        return false;
    }
}

}
