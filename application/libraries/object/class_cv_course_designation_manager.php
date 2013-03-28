<?php
class CV_Course_Designation_Manager {

	public static function save(CV_Course_Designation $m) {
		if (CV_Course_Designation_Helper::isIdExist($m) > 0 ) {
			$sql_start = "UPDATE " . CV_COURSE_DESIGNATION;
			$sql_end = " WHERE id = ". Model::safeSql($m->getId());
		}else{
			$sql_start = "INSERT INTO " . CV_COURSE_DESIGNATION;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id		= " . Model::safeSql($m->getSchoolId()) . ",
			college_id		= " . Model::safeSql($m->getCollegeId()) . ",
			program_id		= " . Model::safeSql($m->getProgramId()) . ",
			program_code	= " . Model::safeSql($m->getProgramCode()) . ",
			course_id		= " . Model::safeSql($m->getCourseId()) . ",
			course_code		= " . Model::safeSql($m->getCourseCode()) . ",
			course_title	= " . Model::safeSql($m->getCourseTitle()) . ",
			school_year		= " . Model::safeSql($m->getSchoolYear()) . ",
			semester		= " . Model::safeSql($m->getSemester()) . ",
			section			= " . Model::safeSql($m->getSection()) . ",
			max_size		= " . Model::safeSql($m->getMaxSize()) . ",
			professor_id	= " . Model::safeSql($m->getProfessorId()) . ",
			professor_name	= " . Model::safeSql($m->getProfessorName()) . ",
			remarks			= " . Model::safeSql($m->getRemarks()) . ",
			schedule		= " . Model::safeSql($m->getSchedule()) . ",
			is_lock			= " . Model::safeSql($m->getIsLock()) . ",
			submission_date	= " . Model::safeSql($m->getSubmissionDate()) . ",
			added_by		= " . Model::safeSql($m->getAddedBy()) . ",
			is_active		= " . Model::safeSql($m->getIsActive()) . ",
			is_archive		= " . Model::safeSql($m->getIsArchive()) . ",
			date_added		= " . Model::safeSql($m->getDateAdded()) . ""
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Course_Designation $m){

		if(CV_Course_Designation_Finder::isIdExist($m) > 0){
			$sql = "
				DELETE FROM " . CV_COURSE_DESIGNATION . " 
				WHERE id =" . Model::safeSql($gr->getId());

			Model::runSql($sql);
		}
	}
}

?>