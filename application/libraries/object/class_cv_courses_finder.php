<?php
class CV_Courses_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_COURSES . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";	
		return self::getRecord($sql);
	}

	public static function searchByTitleOrCourseCode($query) {
		$sql = "
	        SELECT id, course_code 
	        FROM " . CV_COURSES . "
	        WHERE 
				course_code LIKE '%{$query}%' OR
				title LIKE '%{$query}%' OR
				description LIKE '%{$query}%'
			";
		return self::getRecords($sql);
    }
	
	private static function getRecord($sql) {

		$result = Model::runSql($sql);
		$total = mysql_num_rows($result);
		if ($total == 0) {
			return false;	
		}		
	
		$row = Model::fetchAssoc($result);
		$records = self::newObject($row);	
		return $records;
	}

	private static function getRecords($sql) {

		$result = Model::runSql($sql);
		$total = mysql_num_rows($result);
	
		if ($total == 0) {
			
			return false;	

		}
		while ($row = Model::fetchAssoc($result)) {

			$records[$row['id']] = self::newObject($row);
		}
		return $records;
	}

	private static function newObject($row) {
		$pt = new CV_Courses($row['id']);
		$pt->setId($row['id']);
		$pt->setSchoolId($row['school_id']);
		$pt->setCourseCode($row['course_code']);
		$pt->setTitle($row['title']);
		$pt->setDescription($row['description']);
		$pt->setUnits($row['units']);
		$pt->setHasLaboratory($row['has_laboratory']);	
		$pt->setIsActive($row['is_active']);
		return $pt;
	}
}
?>