<?php

/**
* Controlpanel.php
*/
class Controlpanel
{
	public function getCharacters()
	{
		$link = MapleDatabase::connect();
		$sql = "SELECT id, name, level, exp, job, reborns 
				FROM characters
				WHERE accountid = :accountid;";
		$stmt = $link->prepare($sql);
		$stmt->bindParam(':accountid', $_SESSION['ACCOUNT_ID']);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function mapFix($id)
	{
		$link = MapleDatabase::connect();
		$sql = "UPDATE characters set map = 100000000 WHERE id = :id;";
		$stmt = $link->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return ($stmt->execute()) ? True : False;
	}
}