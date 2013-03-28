<?php

class CV_Courses_Helper {
	public static function isIdExist(CV_Courses $pt) {
		$sql = "
			SELECT COUNT(*) as total
			FROM  " . CV_COURSES . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
}

?>