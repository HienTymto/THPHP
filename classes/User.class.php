<?php
class User extends Db
{
	public function delete($email)
	{
		$sql = "delete from user where email=:email ";
		$arr =  array(":email" => $email);
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
