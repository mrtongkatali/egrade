<?php
class CV_Settings_Program_Manager {
	public static function save(CV_Settings_Program $pt) {

		if (CV_Settings_Program_Helper::isIdExist($pt) > 0 ) {

			$sql_start = "UPDATE " . CV_SETTINGS_PROGRAM;
			$sql_end = " WHERE id = ". Model::safeSql($pt->getId());

		}else{

			$sql_start = "INSERT INTO " . CV_SETTINGS_PROGRAM;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id		= ". Model::safeSql($pt->getSchoolId())	.",
			college_Id		= ". Model::safeSql($pt->getCollegeId())	.",
			program_code	= ". Model::safeSql($pt->getProgramCode())	.",
			program_name	= ". Model::safeSql($pt->getProgramName())	.",
			title			= ". Model::safeSql($pt->getTitle())	.",
			description		= ". Model::safeSql($pt->getDescription())	.",
			degree_type		= ". Model::safeSql($pt->getDegreeType())	.",
			is_offered		= ". Model::safeSql($pt->getIsOffered())	.",
			is_active		= ". Model::safeSql($pt->getIsActive())	.""		
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Settings_Program $pt){

		if(CV_Settings_Program_Helper::isIdExist($pt) > 0){
			$sql = "
				DELETE FROM " . CV_SETTINGS_PROGRAM . " 
				WHERE id =" . Model::safeSql($pt->getId());

			Model::runSql($sql);
		}
	}
	
}

?>