<?php

class CV_Settings_Curriculum_Helper {
	public static function isIdExist(CV_Settings_Curriculum $pt) {
		$sql = "
			SELECT COUNT(*) as total
			FROM  " . CV_SETTINGS_CURRICULUM . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
}

?>