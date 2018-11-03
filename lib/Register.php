<?php 

/**
* Register.php
*/
class Register
{
	private $username;
	private $password;
	private $email;
	private $birthday;

	public function __construct($username = null, $password = null, $email = null, $birthday = null)
	{
		self::_setUsername($username);
		self::_setPassword($password);
		self::_setEmail($email);
		self::_setBirthday($birthday);
	}

	public function actionRegister()
	{
		$link = MapleDatabase::connect();
		$sql = "INSERT INTO accounts
					(name, password, email, birthday)
					VALUES
					(:name, :password, :email, :birthday);";
		$stmt = $link->prepare($sql);

		$name = self::getUsername();
		$password = self::getPassword();
		$email = self::getEmail();
		$birthday = self::getBirthday();

		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);

		return ($stmt->execute()) ? True : False;
	}

	public function checkUsername($username)
	{
		$link = MapleDatabase::connect();
		$sql = "SELECT name FROM accounts WHERE name = :name;";
		$stmt = $link->prepare($sql);
		$stmt->bindParam(':name', $username);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		
		return ($result) ? True : False;
	}


    public function getUsername()
    {
        return $this->username;
    }

    private function _setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    private function _setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function _setEmail($email)
    {
        $this->email = $email;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    private function _setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
}