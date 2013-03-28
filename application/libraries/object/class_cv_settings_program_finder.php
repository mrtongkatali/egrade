<?php
class CV_Settings_Program_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_PROGRAM . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";
		
		return self::getRecord($sql);
	}
	
	public static function findAllActiveOfferedProgramsBySchoolId($school_id) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_PROGRAM . "
			WHERE school_id =". Model::safeSql($school_id) ."
		";
		return self::getRecords($sql);
	}
	
	public static function getProgramCodeById($id) {
		$sql = "
			SELECT id, program_code 
			FROM " . CV_SETTINGS_PROGRAM . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
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
		$pt = new CV_Settings_Program($row['id']);
		$pt->setId($row['id']);
		$pt->setSchoolId($row['school_id']);
		$pt->setCollegeId($row['college_id']);
		$pt->setProgramCode($row['program_code']);
		$pt->setProgramName($row['program_name']);
		$pt->setTitle($row['title']);
		$pt->setDescription($row['description']);
		$pt->setDegreeType($row['degree_type']);
		$pt->setIsOffered($row['is_offered']);	
		$pt->setIsActive($row['is_active']);
		return $pt;
	}
}
?>