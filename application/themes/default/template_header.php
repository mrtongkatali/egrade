<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $page_title; ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<?php mysql_query("SET NAMES 'UTF8'"); ?>
<script src="<?php echo BASE_FOLDER .'application/scripts/bootstrap/init.js' ?>"></script>
<script src="<?php echo BASE_FOLDER .'application/scripts/jquery-ui.js' ?>"></script>
<?php Loader::get(); ?>

<script>
	var loading_message = '<img src="'+ base_folder + 'application/themes/' + theme + 'themes-images/loading_image.gif">';	
	function lockScreen(){blockFullScreen();$(document).ready(function(){$.unblockUI();});}
	function blockFullScreen(){var loader_image=base_folder+"application/themes/default/themes-images/bar_loader.gif";$.blockUI({message:'<div style="background-color:#FFFFFF; border:1px solid #CCCCCC;"><div style="font:verdana; font-weight:bold; font-size:12px ">Loading...</div><img src="'+loader_image+'"></div>',overlayCSS:{backgroundColor:'#CCCCCC'},css:{border:'0px'}});}
	$(function(){lockScreen();});
</script>
<?php $member = CV_Members_Helper::getBasicInfoById(Utilities::decrypt($_SESSION['egrade']['member_id'])); ?>
<body>
    <div class="header">
        <div class="logo">
            <a href="#">
                <img src="<?php echo BASE_FOLDER . 'application/themes/default/themes-images/egrade-logo.png';?>" width="700px" height="115px">
            </a>
        </div>
        <div class="user logout"><a href="<?php echo url('login/member_logout'); ?>">Logout</a></div>
        <div class="user">Logged in as <a href="<?php echo url('my_page'); ?>"><?php echo $member['name']; ?></a></div>
    </div>
    <!-- <div class="span9"> -->
    <div class="main-container">
        <!-- this is where the views will show -->
