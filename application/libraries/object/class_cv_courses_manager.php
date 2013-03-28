<?php
class CV_Courses_Manager {
	public static function save(CV_Courses $pt) {

		if (CV_Courses_Helper::isIdExist($pt) > 0 ) {

			$sql_start = "UPDATE " . CV_COURSES;
			$sql_end = " WHERE id = ". Model::safeSql($pt->getId());

		}else{

			$sql_start = "INSERT INTO " . CV_COURSES;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id		= ". Model::safeSql($pt->getSchoolId())	.",
			course_code		= ". Model::safeSql($pt->getCourseCode())	.",
			title			= ". Model::safeSql($pt->getTitle())	.",
			description		= ". Model::safeSql($pt->getDescription())	.",
			units			= ". Model::safeSql($pt->getUnits())	.",
			has_laboratory	= ". Model::safeSql($pt->getHasLaboratory())	.",
			is_active		= ". Model::safeSql($pt->getIsActive())	.""		
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Courses $pt){

		if(CV_Courses_Helper::isIdExist($pt) > 0){
			$sql = "
				DELETE FROM " . CV_COURSES . " 
				WHERE id =" . Model::safeSql($pt->getId());

			Model::runSql($sql);
		}
	}
	
}

?>