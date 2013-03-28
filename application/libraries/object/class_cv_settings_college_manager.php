<?php
class CV_Settings_College_Manager {
	public static function save(CV_Settings_College $pt) {

		if (CV_Settings_College_Helper::isIdExist($pt) > 0 ) {

			$sql_start = "UPDATE " . CV_SETTINGS_COLLEGE;
			$sql_end = " WHERE id = ". Model::safeSql($pt->getId());

		}else{

			$sql_start = "INSERT INTO " . CV_SETTINGS_COLLEGE;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			school_id		= ". Model::safeSql($pt->getSchoolId())	.",
			member_id		= ". Model::safeSql($pt->getMemberId())	.",
			college_name	= ". Model::safeSql($pt->getCollegeName())	.",
			college_code	= ". Model::safeSql($pt->getCollegeCode())	.",
			is_active		= ". Model::safeSql($pt->getIsActive())	.""		
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Settings_College $pt){

		if(CV_Settings_College_Helper::isIdExist($pt) > 0){
			$sql = "
				DELETE FROM " . CV_SETTINGS_COLLEGE . " 
				WHERE id =" . Model::safeSql($pt->getId());

			Model::runSql($sql);
		}
	}
	
}

?>