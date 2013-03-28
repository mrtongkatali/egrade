<?php

class CV_Login_Helper {
	public static function isIdExist(CV_Login $pt) {
		$sql = "
			SELECT COUNT(*) as total
			FROM  " . CV_LOGIN . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function checkIfUserNameExists($member_id, $username) {
		$sql = "
			SELECT id
			FROM  " . CV_LOGIN . "
			WHERE 
				member_id != ". Model::safeSql($member_id) ." AND 
				username  = ". Model::safeSql($username) ."
				LIMIT 1
		";
		$result = Model::runSql($sql,true,false);
		return $result;
	}
}

?>