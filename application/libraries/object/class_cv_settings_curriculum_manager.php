<?php
class CV_Settings_Curriculum_Manager {
	public static function save(CV_Settings_Curriculum $pt) {

		if (CV_Settings_Curriculum_Helper::isIdExist($pt) > 0 ) {

			$sql_start = "UPDATE " . CV_SETTINGS_CURRICULUM;
			$sql_end = " WHERE id = ". Model::safeSql($pt->getId());

		}else{

			$sql_start = "INSERT INTO " . CV_SETTINGS_CURRICULUM;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id		= ". Model::safeSql($pt->getSchoolId())	.",
			program_id		= ". Model::safeSql($pt->getProgramId())	.",
			course_id		= ". Model::safeSql($pt->getCourseId())	.",
			batch_year		= ". Model::safeSql($pt->getBatchYear())	.",
			year_level		= ". Model::safeSql($pt->getYearLevel())	.",
			semester		= ". Model::safeSql($pt->getSemester())	.",
			is_active		= ". Model::safeSql($pt->getIsActive())	.",
			is_archive		= ". Model::safeSql($pt->getIsArchive())	.""
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Settings_Curriculum $pt){

		if(CV_Settings_Curriculum_Helper::isIdExist($pt) > 0){
			$sql = "
				DELETE FROM " . CV_SETTINGS_CURRICULUM . " 
				WHERE id =" . Model::safeSql($pt->getId());

			Model::runSql($sql);
		}
	}
	
}

?>