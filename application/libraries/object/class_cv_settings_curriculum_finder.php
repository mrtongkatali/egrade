<?php
class CV_Settings_Curriculum_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_CURRICULUM . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";
		
		return self::getRecord($sql);
	}
	
	public static function findAllActiveOfferedProgramsBySchoolId($school_id) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_CURRICULUM . "
			WHERE school_id =". Model::safeSql($school_id) ."
		";
		return self::getRecords($sql);
	}
	
	public static function checkIfCurriculumAlreadyExist($school_id,$program_id,$course_id,$batch_year,$year_level,$semester) {
		$sql = "
			SELECT * 
			FROM " . CV_SETTINGS_CURRICULUM . "
			WHERE 
				school_id 	=". Model::safeSql($school_id) ." AND
				program_id 	=". Model::safeSql($program_id) ." AND
				course_id 	=". Model::safeSql($course_id) ." AND
				batch_year 	=". Model::safeSql($batch_year) ." AND
				year_level 	=". Model::safeSql($year_level) ." AND
				semester 	=". Model::safeSql($semester) ." 
			LIMIT 1
				
		";
		return self::getRecord($sql);
	}
	
	public static function getProgramCodeById($id) {
		$sql = "
			SELECT id, program_code 
			FROM " . CV_SETTINGS_CURRICULUM . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findAllBySchoolProgramBatchYear($school_id,$program_id,$batch_year) {
		$sql = "
			SELECT c.id,c.school_id,c.program_id,c.course_id,c.batch_year,c.year_level,c.semester
			FROM " . CV_SETTINGS_CURRICULUM . " c
			WHERE 
				c.school_id =". Model::safeSql($school_id) ." AND
				c.program_id =". Model::safeSql($program_id) ." AND
				c.batch_year =". Model::safeSql($batch_year) ." AND
				c.is_active = ". Model::safeSql(CV_Settings_Curriculum::YES) ." AND
				c.is_archive = ". Model::safeSql(CV_Settings_Curriculum::NO) ."
			ORDER BY year_level, semester ASC
		";
		return self::getRecords($sql);
	}
	
	public static function findAllActiveBySchoolProgramBatchYearFilterByYearLevelSemester($school_id,$program_id,$batch_year,$year_level,$semester) {
		$sql = "
			SELECT c.id,c.school_id,c.program_id,c.course_id,c.batch_year,c.year_level,c.semester 
			FROM " . CV_SETTINGS_CURRICULUM . " c
			WHERE 
				c.school_id =". Model::safeSql($school_id) ." AND
				c.program_id =". Model::safeSql($program_id) ." AND
				c.batch_year =". Model::safeSql($batch_year) ." AND
				c.year_level =". Model::safeSql($year_level) ." AND
				c.semester = ". Model::safeSql($semester) ." AND
				c.is_active = ". Model::safeSql(CV_Settings_Curriculum::YES) ." AND
				c.is_archive = ". Model::safeSql(CV_Settings_Curriculum::NO) ."
				
			ORDER BY year_level,semester ASC
		";
		//echo $sql . '<br/>';
		return self::getRecords($sql);
	}
	
	public static function findAllActiveBySchoolProgramBatchYearFilterByYearLevel($school_id,$program_id,$batch_year,$year_level) {
		$sql = "
			SELECT c.id,c.school_id,c.program_id,c.course_id,c.batch_year,c.year_level,c.semester 
			FROM " . CV_SETTINGS_CURRICULUM . " c
			WHERE 
				c.school_id =". Model::safeSql($school_id) ." AND
				c.program_id =". Model::safeSql($program_id) ." AND
				c.batch_year =". Model::safeSql($batch_year) ." AND
				c.year_level =". Model::safeSql($year_level) ." AND
				c.is_active = ". Model::safeSql(CV_Settings_Curriculum::YES) ." AND
				c.is_archive = ". Model::safeSql(CV_Settings_Curriculum::NO) ."
				
			ORDER BY year_level,semester ASC
		";
		//echo $sql . '<br/>';
		return self::getRecords($sql);
	}
	
	public static function findAllActiveBySchoolProgramBatchYearFilterBySemester($school_id,$program_id,$batch_year,$year_level,$semester) {
		$sql = "
			SELECT c.id,c.school_id,c.program_id,c.course_id,c.batch_year,c.year_level,c.semester 
			FROM " . CV_SETTINGS_CURRICULUM . " c
			WHERE 
				c.school_id =". Model::safeSql($school_id) ." AND
				c.program_id =". Model::safeSql($program_id) ." AND
				c.batch_year =". Model::safeSql($batch_year) ." AND
				c.semester = ". Model::safeSql($semester) ." AND
				c.is_active = ". Model::safeSql(CV_Settings_Curriculum::YES) ." AND
				c.is_archive = ". Model::safeSql(CV_Settings_Curriculum::NO) ."
				
			ORDER BY year_level,semester ASC
		";
		//echo $sql . '<br/>';
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
		$pt = new CV_Settings_Curriculum($row['id']);
		$pt->setId($row['id']);
		$pt->setSchoolId($row['school_id']);
		$pt->setProgramId($row['program_id']);
		$pt->setCourseId($row['course_id']);
		$pt->setBatchYear($row['batch_year']);
		$pt->setYearLevel($row['year_level']);
		$pt->setSemester($row['semester']);
		$pt->setIsActive($row['is_active']);
		$pt->setIsArchive($row['is_archive']);
		return $pt;
	}
}
?>