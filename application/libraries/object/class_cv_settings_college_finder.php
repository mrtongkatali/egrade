<?php
class CV_Settings_College_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_COLLEGE . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findAllActiveCollegeBySchoolId($school_id) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_COLLEGE . "
			WHERE 
				school_id 	= ". Model::safeSql($school_id) ." AND
				is_active	= ". Model::safeSql(CV_Settings_College::YES) . "
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
		$pt = new CV_Settings_College($row['id']);
		$pt->setId($row['id']);
		$pt->setSchoolId($row['school_id']);
		$pt->setMemberId($row['member_id']);
		$pt->setCollegeName($row['college_name']);
		$pt->setCollegeCode($row['college_code']);
		$pt->setIsActive($row['is_active']);
		return $pt;
	}
}
?>