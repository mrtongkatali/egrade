<?php 

class CV_Login {
	
	public $id;
	public $member_id;
	public $full_name;
	public $username;
	public $email_address;
	public $pass_hash;
	public $account_type;
	public $modules;
	public $is_active;
	public $date_added;

	const YES 	= 'Yes';
	const NO	= 'No';
	
	const ADMIN 	= 'Admin';
	const DEAN		= 'Dean';
	const REGISTRAR	= 'Registrar';
	const PROFESSOR	= 'Professor';
	const TEACHER	= 'Teacher';
	
	public function setId($value) {$this->id = $value;}
	public function getId() {return $this->id;}
	
	public function setMemberId($value) {$this->member_id = $value;}
	public function getMemberId() {return $this->member_id;}
	
	public function setFullName($value) {$this->full_name = $value;}
	public function getFullName() {return $this->full_name;}
	
	public function setUsername($value) {$this->username = $value;}
	public function getUsername() {return $this->username;}
	
	public function setEmailAddress($value) {$this->email_address = $value;}
	public function getEmailAddress() {return $this->email_address;}
	
	public function setPassHash($value) {$this->pass_hash = $value;}
	public function getPassHash() {return $this->pass_hash;}
	
	public function setAccountType($value) {$this->account_type = $value;}
	public function getAccountType() {return $this->account_type;}
	
	public function setModules($value) {$this->modules = $value;}
	public function getModules() {return $this->modules;}
	
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}
	
	public function setDateAdded($value) {$this->date_added = $value;}
	public function getDateAdded() {return $this->date_added;}
	
	public function save(C_Events $ce) {
		return CV_Login_Manager::save($this);
	}

	public function delete() {
		return CV_Login_Manager::delete($this);
	}
	
	

}
?>
