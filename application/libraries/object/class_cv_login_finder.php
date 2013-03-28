<?php
class CV_Login_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_LOGIN . "
			WHERE id =". Model::safeSql($id) ."
			LIMIT 1
		";
		
		return self::getRecord($sql);
	}
	
	public static function findByMemberId($member_id) {
		$sql = "
			SELECT * 
			FROM " . CV_LOGIN . "
			WHERE member_id =". Model::safeSql($member_id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
	}

	public static function findAll($limit="",$sort="") {
		$sql = "
			SELECT *
			FROM " . CV_LOGIN . "			
			" . $limit . "
			" . $sort  . "
		";
		return self::getRecords($sql);
	}
	
	public static function findActiveAccountByUsernameAndPassHash($username,$pass_hash) {
		$sql = " 
			SELECT * 
			FROM " . CV_LOGIN . "
			WHERE 
				username 	= " . Model::safeSql($username) . " AND
				pass_hash 	= " . Model::safeSql($pass_hash) . " AND
				is_active 	= " . Model::safeSql(CV_Login::YES) . "
		";
		return Model::runSql($sql,true,false);
	}
	
	public static function findActiveAccountByEmailAddressAndPassHash($email_address,$pass_hash) {
		$sql = " 
			SELECT * 
			FROM " . CV_LOGIN . "
			WHERE 
				email_address 	= " . Model::safeSql($email_address) . " AND
				pass_hash 		= " . Model::safeSql($pass_hash) . " AND
				is_active 		= " . Model::safeSql(CV_Login::YES) . "
			LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findActiveAccountByUsernameAddressAndPassHash($username,$pass_hash) {
		$sql = " 
			SELECT * 
			FROM " . CV_LOGIN . "
			WHERE 
				username	 	= " . Model::safeSql($username) . " AND
				pass_hash 		= " . Model::safeSql($pass_hash) . " AND
				is_active 		= " . Model::safeSql(CV_Login::YES) . "
			LIMIT 1
		";
		return self::getRecord($sql);
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
		$pt = new CV_Login($row['id']);
		$pt->setId($row['id']);
		$pt->setMemberId($row['member_id']);
		$pt->setFullName($row['full_name']);
		$pt->setUsername($row['username']);
		$pt->setEmailAddress($row['email_address']);
		$pt->setPassHash($row['pass_hash']);
		$pt->setAccountType($row['account_type']);
		$pt->setModules($row['modules']);
		$pt->setIsActive($row['is_active']);
		$pt->setDateAdded($row['date_added']);
		return $pt;
	}
}
?>