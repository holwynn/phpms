<?php 

/**
* Login.php
*/
class Login
{
	private $username;
	private $password; // TODO: Do we really need it?

	public function __construct($username = null, $password = null)
	{
		self::_setUsername($username);
		self::_setPassword($password);
	}

	public function loginDataReturn()
	{
		$link = MapleDatabase::connect();
		$sql = "SELECT id, name, password, salt, gm
				FROM accounts WHERE name = :name";
		$stmt = $link->prepare($sql);

		$name = self::getUsername();

		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);

		return ($result) ? $result : False;
	}


    public function getUsername()
    {
        return $this->username;
    }

    private function _setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    private function _setPassword($password)
    {
        $this->password = $password;
    }
}