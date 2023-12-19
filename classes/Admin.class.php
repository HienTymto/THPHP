<?php
class Admin extends Db
{
    public function delete($username)
    {
        $sql = "delete from admin where username=:username ";
        $arr =  array(":username" => $username);
        return $this->exeNoneQuery($sql, $arr);
    }
    function login(string $username, string $password)
    {
        $sql = "select * from admin where username = :username AND password = :password";
        $statement = $this->dbh->prepare($sql);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function getProfile()
    {

        $data = [];
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            
            // Sử dụng câu truy vấn SQL để lấy thông tin của admin
            $sql = 'SELECT * FROM admin WHERE username = :username';
            $statement = $this->dbh->prepare($sql);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            
            // Lấy dữ liệu từ kết quả truy vấn
            $data = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $data;
    }
}
