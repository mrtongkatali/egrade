<?php
class CV_Login_Manager {
	public static function save(CV_Login $pt) {

		if (CV_Login_Helper::isIdExist($pt) > 0 ) {

			$sql_start = "UPDATE " . CV_LOGIN;
			$sql_end = " WHERE id = ". Model::safeSql($pt->getId());

		}else{

			$sql_start = "INSERT INTO " . CV_LOGIN;
			$sql_end = "";		
		}
		
		$sql = $sql_start ."

			SET
			member_id		= ". Model::safeSql($pt->getMemberId())	.",
			full_name		= ". Model::safeSql($pt->getFullName())	.",
			username		= ". Model::safeSql($pt->getUsername())	.",
			email_address	= ". Model::safeSql($pt->getEmailAddress())	.",
			pass_hash   	= ". Model::safeSql($pt->getPassHash())	.",
			account_type	= ". Model::safeSql($pt->getAccountType())	.",
			modules			= ". Model::safeSql($pt->getModules())	.",
			is_active		= ". Model::safeSql($pt->getIsActive())	.",
			date_added 		= ". Model::safeSql($pt->getDateAdded())	.""			
			. $sql_end ."			
		";
		Model::runSql($sql);
		return mysql_insert_id();		
	}		

	public static function delete(CV_Login $pt){

		if(CV_Login_Helper::isIdExist($pt) > 0){
			$sql = "
				DELETE FROM " . CV_LOGIN . " 
				WHERE id =" . Model::safeSql($pt->getId());

			Model::runSql($sql);
		}
	}
	
}

?>