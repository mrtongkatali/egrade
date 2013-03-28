<?php
class CV_Members_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_MEMBERS . "
			WHERE id = ". Model::safeSql($id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findAll($sort = "", $limit = "") {
		$sql = "
			SELECT * 
			FROM " . CV_MEMBERS . "
			$sort
			$limit
		";
		return self::getRecords($sql);
	}

	public static function searchByNameOrEmailOrCode($query) {
		$sql = "
	        SELECT id,firstname,lastname,fullname
	        FROM " . CV_MEMBERS . "
	        WHERE 
				(
					firstname LIKE '%{$query}%' OR
					lastname LIKE '%{$query}%' OR
					email_address LIKE '%{$query}%' OR
					student_employee_code LIKE '%{$query}%'
				) AND (
					is_active = " . Model::safeSql(CV_Members::YES) . "
				)
			"; 
			
		return self::getRecords($sql);
    }
	
    public static function searchActiveProfessorByFullName($query) {
		$sql = "
			SELECT id, firstname,lastname,fullname 
			FROM " . CV_MEMBERS . "
			WHERE
			( 
				firstname LIKE '%{$query}%' OR
				lastname LIKE '%{$query}%' OR
				fullname LIKE '%{$query}%' 
			) AND (
				member_type = " . Model::safeSql(CV_Members::PROFESSOR) . " AND
				is_active	= " . Model::safeSql(CV_Members::YES) . "
			)
		";
		return self::getRecords($sql);
	}
	
	public static function searchActiveStudentByFullName($query) {
		$sql = "
			SELECT id, firstname,lastname,fullname 
			FROM " . CV_MEMBERS . "
			WHERE
			( 
				firstname LIKE '%{$query}%' OR
				lastname LIKE '%{$query}%' OR
				fullname LIKE '%{$query}%' 
			) AND (
				member_type = " . Model::safeSql(CV_Members::STUDENT) . " AND
				is_active	= " . Model::safeSql(CV_Members::YES) . "
			)
		";
		return self::getRecords($sql);
	}
	
	private static function getRecord($sql) {

		$result = Model::runSql($sql);
		$total = mysql_num_rows($result);
		if ($total == 0) {return false;}		
	
		$row = Model::fetchAssoc($result);
		$records = self::newObject($row);	
		return $records;
	}
	
	private static function getRecords($sql) {
		$result = Model::runSql($sql);
		$total = mysql_num_rows($result);
	
		if ($total == 0) {return false;}
		while ($row = Model::fetchAssoc($result)) {
			$records[$row['id']] = self::newObject($row);
		}
		return $records;
	}

	private static function newObject($row) {
		$var = new CV_Members($row['id']);
		$var->setId($row['id']);
		$var->setSchoolId($row['school_id']);	
		$var->setFirstName($row['firstname']);
		$var->setMiddleName($row['middlename']);
		$var->setLastName($row['lastname']);
		$var->setFullName($row['fullname']);
		$var->setGender($row['gender']);
		$var->setBirthDate($row['birthdate']);
		$var->setEmailAddress($row['email_address']);
		$var->setAddress($row['address']);
		$var->setPhoneNumber($row['phone_number']);
		$var->setMobileNumber($row['mobile_number']);
		$var->setStudentEmployeeCode($row['student_employee_code']);
		$var->setProgramId($row['program_id']);
		$var->setProgramCode($row['program_code']);
		$var->setYearLevel($row['year_level']);
		$var->setSemester($row['semester']);
		$var->setCollegeId($row['college_id']);
		$var->setIsEnrolled($row['is_enrolled']);
		$var->setIsActive($row['is_active']);
		$var->setMemberType($row['member_type']);
		$var->setDisplayImage($row['display_image']);
		$var->setDateAdded($row['date_added']);
		return $var;
	}
}
?>