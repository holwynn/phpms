<?php

/**
* Ranking.php
* TODO: Pagination
*/
class Ranking
{
	public function getRankings($start = 0)
	{
		$link = MapleDatabase::connect();
		$sql = "SELECT name, level, job, reborns
				FROM characters
				ORDER BY level DESC
				LIMIT 0, 15;";
		$stmt = $link->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}