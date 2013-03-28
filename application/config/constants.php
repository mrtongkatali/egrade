<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| Database Names 
|--------------------------------------------------------------------------
|
*/
define('CV_MEMBERS', 'cv_members');
define('CV_COURSES', 'cv_courses');
define('CV_LOGIN', 'cv_login');
define('CV_SETTINGS_PROGRAM', 'cv_settings_program');
define('CV_SETTINGS_COLLEGE', 'cv_settings_college');
define('CV_SETTINGS_CURRICULUM', 'cv_settings_curriculum');
define('CV_COURSE_DESIGNATION', 'cv_course_designation');
define('CV_COURSE_ENROLLEES', 'cv_course_enrollees');

define('TIMEZONE','Asia/Manila');
define('MAX_NUMBER_COLLEGE_YEAR',4);
define('MAX_NUMBER_COLLEGE_SEMESTER',2);

define('ADMIN','Admin');
define('DEAN','Dean');
define('REGISTRAR','Registrar');
define('PROFESSOR','Professor');
define('STUDENT','Student');



/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */