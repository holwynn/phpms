<?php

/**
* LoginC(ontroller)
*/
class LoginC
{
	private $username;
	private $password;

	public function index()
	{
		$errors = '';
		/*
		 * Stage 1:
		 * Check for empty fields
		 */
		if (self::checkEmpty())
		{
			$continue = True;
			self::_setUsername($_POST['username']);
			self::_setPassword($_POST['password']);
		} 
		else 
		{
			$errors .= 'Some fields were left blank<br>';
			$continue = False;
		}

		/*
		 * Stage 2:
		 * Validate the input
		 */
		if ($continue)
		{
			if (!Validator::usernameLengthCheck(self::getUsername()))
			{
				$errors .= 'Invalid username length<br>';
				$continue = False;
			}

			if (!Validator::passwordLengthCheck(self::getpassword()))
			{
				$errors .= 'Invalid password lenght<br>';
				$continue = False;
			}
		}

		/* Stage 3:
		 * Check input against database
		 */
		if ($continue)
		{
			$loginObj = new Login(self::getUsername(), self::getPassword());
			$loginData = $loginObj->loginDataReturn(); // object with db data
			if ($loginData)
			{
				$checkHash = Hashing::checkSHA512(self::getPassword(),
												$loginData->password,
												$loginData->salt);
				if ($checkHash)
				{
					$continue = True;
				}
				else
				{
					$errors .= 'Incorrect password!';
					$continue = False;
				}
			}
			else
			{
				$errors .= "That account doesn't exist!";
				$continue = False;
			}
		}

		/* Stage 4:
		 * Data is correct, proceed to login
		 */
		if ($continue)
		{
			$_SESSION['LOGIN'] = True;
			$_SESSION['ACCOUNT_ID'] = $loginData->id;
			$_SESSION['ACCOUNT_USERNAME'] = $loginData->name;
			$_SESSION['ACCOUNT_GM'] = $loginData->gm;
			header('Location: /?home');
		}
		include VIEWS . 'default/head.php';
		include VIEWS . 'default/topbanner.php';
		include VIEWS . 'assets/status.php';

		include VIEWS . 'default/slider.php';
		include VIEWS . 'modules/login.php';

		include VIEWS . 'default/footer.php';
		include VIEWS . 'default/foot.php';
	}

	public function logout()
	{
		session_destroy();
		header('Location: /?home');
	}

	private function checkEmpty()
	{
		if (isset($_POST['username']) && !empty($_POST['username']) &&
			isset($_POST['password']) && !empty($_POST['password']))
		{
			return True;
		}
		else
		{
			return False;
		}
	}

	// Getters and setters
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
}