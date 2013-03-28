<?php

class CV_Members_Helper {
	public static function isIdExist(CV_Members $pt) {
		$sql = "
			SELECT COUNT(id) as total
			FROM  " . CV_MEMBERS . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function getBasicInfoById($id) {
		$sql = "
			SELECT 
				m.id, 
				CONCAT(m.firstname, ' ', m.lastname) as name,
				m.gender,
				m.birthdate,
				m.email_address
			FROM " . CV_MEMBERS . " m
			WHERE id = ". Model::safeSql($id) ."
			LIMIT 1
		";
		return Model::runSql($sql,true, false);
		
	}
	
	public static function getNextId() {
		$sql = "
			SELECT m.id 
			FROM " . CV_MEMBERS . " m
			ORDER BY id DESC
			LIMIT 1
		";
	
		$var = Model::runSql($sql,true, false);
		$next_id = ($var ? $var['id'] + 1 : '1');
		return $next_id;
	}
	
	public static function updateProfessorInCourseDesignation(CV_Members $m) {
		$sql = "
			UPDATE " . CV_COURSE_DESIGNATION . " SET
			professor_name = " . Model::safeSql($m->getFullName()) . "
			WHERE
				professor_id = " . Model::safeSql($m->getId()) . "
		";
		Model::runSql($sql);
	}
	
	public static function updateProfessorInCourseEnrollees(CV_Members $m) {
		$sql = "
			UPDATE " . CV_COURSE_ENROLLEES . " SET
			professor_name = " . Model::safeSql($m->getFullName()) . "
			WHERE
				professor_id = " . Model::safeSql($m->getId()) . "
		";
		Model::runSql($sql);
	}
	
	public static function updateStudentInCourseEnrollees(CV_Members $m) {
		$sql = "
			UPDATE " . CV_COURSE_ENROLLEES . " SET
			student_name = " . Model::safeSql($m->getFullName()) . "
			WHERE
				student_id = " . Model::safeSql($m->getId()) . "
		";
		Model::runSql($sql);
	}
	
	public static function updateMemberInLogin(CV_Members $m) {
		$sql = "
			UPDATE " . CV_LOGIN . " SET
			full_name = " . Model::safeSql($m->getFullName()) . "
			WHERE
				member_id = " . Model::safeSql($m->getId()) . "
		";
		Model::runSql($sql);
	}
}

?>