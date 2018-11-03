<?php 

/**
* Validator.php
* Contains some static reused validation methods
*/
class Validator
{
	private function __construct() {}

	static function usernameLengthCheck($username)
	{
		global $settings;
		if (strlen($username) < $settings['SERVER_USERNAME_MINCHARACTERS'] ||
			strlen($username) > $settings['SERVER_USERNAME_MAXCHARACTERS'])
		{
			return False;
		}
		else
		{
			return True;
		}
	}

	static function passwordLengthCheck($password)
	{
		global $settings;
		if (strlen($password) < $settings['SERVER_PASSWORD_MINCHARACTERS'] ||
			strlen($password) > $settings['SERVER_PASSWORD_MAXCHARACTERS'])
		{
			return False;
		}
		else
		{
			return True;
		}
	}

	static function passwordMatchCheck($password, $confirm)
	{
		return ($password == $confirm) ? True : False;
	}
}