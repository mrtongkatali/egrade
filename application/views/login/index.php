<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php mysql_query("SET NAMES 'UTF8'"); ?>
<?php Loader::get(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>

<body class="login">
	<!--<header>test</header>-->
    <div class="login-logo">
        <img src="<?php echo BASE_FOLDER . 'application/themes/default/themes-images/egrade.png'; ?>" height="100px" width="120px" />
    </div>
    <h3 class="school-name">Benghazi University - Nursing Department</h3>
	<div class="login-container">
    	<h3>Login your account</h3>
        <?php if($this->session->flashdata('error_login')) { ?>
        <div class="alert alert-error login-error">
        	<button type="button" class="close" data-dismiss="alert"></button>
        	<?php echo $this->session->flashdata('error_message'); ?>
        </div>
        <?php } ?>
        <form id="login" name="login" enctype="application/x-www-form-urlencoded" method="post" action="<?php echo url('login/check_login'); ?>">
        <input type="hidden" id="next" name="next" value="<?php echo $next; ?>" />
        	<table width="100%" border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<!--<td valign="top">
                    	<?php //$image_url = BASE_FOLDER . 'application/themes/default/themes-images/user_profile_pic.png'; ?>
                    	<img id="company_logo" class="user-profile-pic" src="<?php echo $image_url;?>" width="135px;" height="135px;" /><br />
                    </td>-->
                	<td valign="top">
                        <table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tr>
                                <td><input class="large-input login-input" type="text" placeholder="Username" id="username" name="username"/></td>
                            </tr>
                            <tr>
                                <td><input class="large-input login-input" type="password" placeholder="Password" id="password" name="password"/></td>
                            </tr>
                            <tr>
                                <td>
                                	<footer>
                                    	<button class="btn btn-primary"><i class="icon-lock icon-white"></i>Login</button>
                                    	<a href="#" class="forgot-pw">Forgot Password</a>
                                    </footer>
                                </td>
                            </tr>
                        </table>
        			</td>
        		</tr>
        	</table>
        </form>
    </div>
</body>