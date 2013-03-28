<?php

class CV_Settings_College_Helper {
	public static function isIdExist(CV_Settings_College $pt) {
		$sql = "
			SELECT COUNT(*) as total
			FROM  " . CV_SETTINGS_COLLEGE . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function getCollegeByMemberId($member_id) {
		$sql = "
			SELECT id
			FROM  " . CV_SETTINGS_COLLEGE . "
			WHERE member_id = ". Model::safeSql($member_id) ."
		";
		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['id'];
	}
}

?>