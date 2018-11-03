<?php 

/**
* Hashing.php
* TODO: Either extend this or remove it, so far it is used by 1 controller
*/
class Hashing
{
	private function __construct() {}

	static function checkSHA512($original, $hash, $salt)
	{
		$salted = $original . $salt;
		return (hash('sha512', $salted) == $hash) ? True : False;
	}
}
