<?php
class CV_Members_Manager {

	public static function save(CV_Members $m) {
		if (CV_Members_Helper::isIdExist($m) > 0 ) {
			$sql_start = "UPDATE " . CV_MEMBERS;
			$sql_end = " WHERE id = ". Model::safeSql($m->getId());
		}else{
			$sql_start = "INSERT INTO " . CV_MEMBERS;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id				= " . Model::safeSql($m->getSchoolId()) . ",
			firstname 				= " . Model::safeSql($m->getFirstName()) . ",
			middlename	 			= " . Model::safeSql($m->getMiddleName()) . ",
			lastname 				= " . Model::safeSql($m->getLastName()) . ",
			fullname 				= " . Model::safeSql($m->getFullName()) . ",
			gender					= " . Model::safeSql($m->getGender()) . ",
			birthdate				= " . Model::safeSql($m->getBirthdate()) . ",
			email_address			= " . Model::safeSql($m->getEmailAddress()) . ",
			address					= " . Model::safeSql($m->getAddress()) . ",
			phone_number			= " . Model::safeSql($m->getPhoneNumber()) . ",
			mobile_number			= " . Model::safeSql($m->getMobileNumber()) . ",
			student_employee_code	= " . Model::safeSql($m->getStudentEmployeeCode()) . ",
			program_id				= " . Model::safeSql($m->getProgramId()) . ",
			program_code			= " . Model::safeSql($m->getProgramCode()) . ",
			year_level				= " . Model::safeSql($m->getYearLevel()) . ",
			semester				= " . Model::safeSql($m->getSemester()) . ",
			college_id				= " . Model::safeSql($m->getCollegeId()) . ",
			is_enrolled				= " . Model::safeSql($m->getIsEnrolled()) . ",
			is_active				= " . Model::safeSql($m->getIsActive()) . ",
			member_type				= " . Model::safeSql($m->getMemberType()) . ",
			display_image			= " . Model::safeSql($m->getDisplayImage()) . ",
			date_added				= " . Model::safeSql($m->getDateAdded()) . ""
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Members $m){

		if(CV_Members_Finder::isIdExist($m) > 0){
			$sql = "
				DELETE FROM " . CV_MEMBERS . " 
				WHERE id =" . Model::safeSql($gr->getId());

			Model::runSql($sql);
		}
	}
}

?>