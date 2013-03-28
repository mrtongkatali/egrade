<?php
class CV_Course_Enrollees_Manager {

	public static function save(CV_Course_Enrollees $m) {
		if (CV_Course_Enrollees_Helper::isIdExist($m) > 0 ) {
			$sql_start = "UPDATE " . CV_COURSE_ENROLLEES;
			$sql_end = " WHERE id = ". Model::safeSql($m->getId());
		}else{
			$sql_start = "INSERT INTO " . CV_COURSE_ENROLLEES;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id				= " . Model::safeSql($m->getSchoolId()) . ",
			course_designation_id	= " . Model::safeSql($m->getCourseDesignationId()) . ",
			program_id				= " . Model::safeSql($m->getProgramId()) . ",
			program_code			= " . Model::safeSql($m->getProgramCode()) . ",
			student_id				= " . Model::safeSql($m->getStudentId()) . ",
			student_code			= " . Model::safeSql($m->getStudentCode()) . ",
			student_name			= " . Model::safeSql($m->getStudentName()) . ",
			course_id				= " . Model::safeSql($m->getCourseId()) . ",
			course_code				= " . Model::safeSql($m->getCourseCode()) . ",
			professor_id			= " . Model::safeSql($m->getProfessorId()) . ",
			professor_name			= " . Model::safeSql($m->getProfessorName()) . ",
			pre_final_grade			= " . Model::safeSql($m->getPreFinalGrade()) . ",
			final_exam_grade		= " . Model::safeSql($m->getFinalExamGrade()) . ",
			final_grade				= " . Model::safeSql($m->getFinalGrade()) . ",
			remarks					= " . Model::safeSql($m->getRemarks()) . ",
			is_currently_enrolled	= " . Model::safeSql($m->getIsCurrentlyEnrolled()) . ",
			is_passed				= " . Model::safeSql($m->getIsPassed()) . ",
			enrolled_by				= " . Model::safeSql($m->getEnrolledBy()) . ",
			is_archive				= " . Model::safeSql($m->getIsArchive()) . ",
			date_added				= " . Model::safeSql($m->getDateAdded()) . ""
			. $sql_end ."			
		";

		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Course_Enrollees $m){

		if(CV_Course_Enrollees_Helper::isIdExist($m) > 0){
			$sql = "
				DELETE FROM " . CV_COURSE_ENROLLEES . " 
				WHERE id =" . Model::safeSql($m->getId());

			Model::runSql($sql);
		}
	}
}

?>