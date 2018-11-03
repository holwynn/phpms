<?php

/**
* RegisterC(ontroller)
*/
class RegisterC
{
	private $username;
	private $password;
	private $password_confirm;
	private $email;
	private $birthday;

	public function __construct()
	{
		if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN'] == True)
		{
			die('You are already logged in!');
		}
	}

	public function index()
	{
		$errors = 'Make sure you fill all boxes! <br>';
		global $settings;

		/*
		 * Stage 1:
		 * Check for empty form fields, if all fields are filled, set object properties
		 */
		if (self::checkEmpty())
		{
			$continue = True;
			self::_setUsername($_POST['username']);
			self::_setPassword($_POST['password']);
			self::_setPasswordConfirm($_POST['password_confirm']);
			self::_setEmail($_POST['email']);
			self::_setBirthday($_POST['birthday']);
		}
		else
		{
			$continue = False;
		}

		/*
		 * Stage 2:
		 * Forms are filled, validate the input
		 * The commented true/false is a reference to the conditional logic
		 */
		if ($continue)
		{
			// Username length validation
			// False = username length doesn't follow the pattern in config.php
			if (!Validator::usernameLengthCheck(self::getUsername()))
			{
				$errors .= 'Please follow username length!<br>';
				$continue = False;
			}
			// Username availability validation
			// True: username exists
			if (self::usernameAvailabilityCheck(self::getUsername()))
			{
				$errors .= 'That username is already registered!<br>';
				$continue = False;
			}
			// Password length validation
			// False = password length doesn't follow the pattern in config.php
			if (!Validator::passwordLengthCheck(self::getPassword()))
			{
				$errors .= "Incorrect password length!<br>";
				$continue = False;
			}
			// Password match validation
			// False = passwords don't match
			if (!Validator::passwordMatchCheck(self::getPassword(), self::getPasswordConfirm()))
			{
				$errors .= "The passwords don't match!<br>";
				$continue = False;
			}

			// Email validation
			if (!filter_var(self::getEmail(), FILTER_VALIDATE_EMAIL))
			{
			    $errors .= "Your email doesn't seem to be valid!<br>";
			    $continue = False;
			}
		}

		/*
		 * Stage 3:
		 * Everything is in order, proceed to registration
		 */
		if ($continue)
		{
			switch ($settings['SERVER_PASSWORD_HASH'])
			{
				case 'plaintext':
					$hash = self::getPassword();
					break;
				case 'sha1':
					$hash = sha1(self::getPassword());
					break;
				default:
					return 'Unsupported hashing algorithm';
			}
			$registerObj = new Register(self::getUsername(),
										$hash,
										self::getEmail(),
										self::getBirthday());
			$registerObj->actionRegister();
			// $completed = True; // TODO: Find a use for this or remove it

			// Login the newly created user
			$loginObj = new Login(self::getUsername());
			$loginData = $loginObj->loginDataReturn(); // object with db data
			$_SESSION['LOGIN'] = True;
			$_SESSION['ACCOUNT_ID'] = $loginData->id;
			$_SESSION['ACCOUNT_USERNAME'] = $loginData->name;
			$_SESSION['ACCOUNT_GM'] = $loginData->gm;
			header('Location: /?home');
		}

		// Head
		include VIEWS . 'default/head.php';
		include VIEWS . 'default/topbanner.php';
		include VIEWS . 'assets/status.php';

		// Slider-carousel
		include VIEWS . 'default/slider.php';

		// Main content (login/panel and content)
		// These two must come together
		include VIEWS . 'assets/login.php';
		include VIEWS . 'modules/register.php';

		// Foot
		include VIEWS . 'default/footer.php';
		include VIEWS . 'default/foot.php';
	}

	private function checkEmpty()
	{
		if (isset($_POST['username']) && !empty($_POST['username']) &&
			isset($_POST['password']) && !empty($_POST['password']) &&
			isset($_POST['password_confirm']) && !empty($_POST['password_confirm']) &&
			isset($_POST['email']) && !empty($_POST['email']) &&
			isset($_POST['birthday']) && !empty($_POST['birthday']))
		{
			return True;
		}
		else
		{
			return False;
		}
	}

	private function usernameAvailabilityCheck($username)
	{
		$registerObj = new Register();
		return $registerObj->checkUsername($username);
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

    public function getPasswordConfirm()
    {
        return $this->password_confirm;
    }

    private function _setPasswordConfirm($password_confirm)
    {
        $this->password_confirm = $password_confirm;
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