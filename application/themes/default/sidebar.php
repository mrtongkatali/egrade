<?php $credentials = strtolower(Utilities::decrypt($_SESSION['egrade']['account_type'])); ?>

<div id="sidebar">
	<?php if($credentials == 'student') { ?>
    <ul class="nav nav-tabs nav-stacked">
        <ul class="nav nav-tabs nav-stacked">
            <li class="side-menu-header">General</li>
            <li <?php echo ($selected =='home' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('home'); ?>">Home<i class="icon-chevron-right icon-right"></i></a></li>
            <li <?php echo ($selected =='grade_management' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('grade_management'); ?>">My Grades<i class="icon-chevron-right icon-right"></i></a></li>
            <li <?php echo ($selected =='report' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('report'); ?>">Reports<i class="icon-chevron-right icon-right"></i></a></li>
        </ul>
        
        <ul class="nav nav-tabs nav-stacked">
            <li class="side-menu-header">Settings</li>
            <li <?php echo ($selected =='account' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('account'); ?>">Account<i class="icon-chevron-right icon-right"></i></a></li>
        </ul>
    </ul>
    <?php } ?>
    
    <?php if($credentials == 'professor') { ?>
    <ul class="nav nav-tabs nav-stacked">
        <li class="side-menu-header">General</li>
        <li <?php echo ($selected =='home' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('home'); ?>">Home<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='grade_management' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('grade_management'); ?>">Grade Management<i class="icon-chevron-right icon-right"></i></a></li>
    </ul>
    
    <ul class="nav nav-tabs nav-stacked">
        <li class="side-menu-header">Settings</li>
        <li <?php echo ($selected =='account' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('account'); ?>">Account<i class="icon-chevron-right icon-right"></i></a></li>
    </ul>
    <?php } ?>
    
    <?php if($credentials == 'dean') { ?>
    <ul class="nav nav-tabs nav-stacked">
        <ul class="nav nav-tabs nav-stacked">
            <li class="side-menu-header">General</li>
            <li <?php echo ($selected =='home' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('home'); ?>">Home<i class="icon-chevron-right icon-right"></i></a></li>
            <li <?php echo ($selected =='grade_management' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('grade_management'); ?>">Grade Management<i class="icon-chevron-right icon-right"></i></a></li>
            <li <?php echo ($selected =='report' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('report'); ?>">Reports<i class="icon-chevron-right icon-right"></i></a></li>
        </ul>
        
        <ul class="nav nav-tabs nav-stacked">
            <li class="side-menu-header">Settings</li>
            <li <?php echo ($selected =='account' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('account'); ?>">Account<i class="icon-chevron-right icon-right"></i></a></li>
        </ul>
    </ul>
    <?php } ?>
    
    <?php if($credentials == 'registrar') { ?>
    <ul class="nav nav-tabs nav-stacked">
        <ul class="nav nav-tabs nav-stacked">
            <li class="side-menu-header">General</li>
            <li <?php echo ($selected =='home' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('home'); ?>">Home<i class="icon-chevron-right icon-right"></i></a></li>
            <li <?php echo ($selected =='grade_management' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('grade_management'); ?>">Grade Management<i class="icon-chevron-right icon-right"></i></a></li>
            <li <?php echo ($selected =='report' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('report'); ?>">Reports<i class="icon-chevron-right icon-right"></i></a></li>
        </ul>
        
        <ul class="nav nav-tabs nav-stacked">
            <li class="side-menu-header">Settings</li>
            <li <?php echo ($selected =='account' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('account'); ?>">Account<i class="icon-chevron-right icon-right"></i></a></li>
        </ul>
    </ul>
    <?php } ?>
    
    <?php if($credentials == 'admin') { ?>
    <ul class="nav nav-tabs nav-stacked">
        <li class="side-menu-header">General</li>
        <li <?php echo ($selected =='students' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('students'); ?>">Students<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='professors' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('professors'); ?>">Professors<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='course_management' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('course_management'); ?>">Course Management<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='grade_management' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('grade_management'); ?>">Grade Management<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='report' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('report'); ?>">Reports<i class="icon-chevron-right icon-right"></i></a></li>
    </ul>
    
    <ul class="nav nav-tabs nav-stacked">
        <li class="side-menu-header">Settings</li>
        <li <?php echo ($selected =='courses' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('courses'); ?>">Courses<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='programs' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('programs'); ?>">Programs<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='colleges' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('colleges'); ?>">Colleges<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='curriculum' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('curriculum'); ?>">Curriculum<i class="icon-chevron-right icon-right"></i></a></li>
        <li <?php echo ($selected =='user_accounts' ? 'class="active"' : ''); ?>><a class="side-menu" href="<?php echo url('user_accounts'); ?>">Users<i class="icon-chevron-right icon-right"></i></a></li>
    </ul>
    <?php } ?>
</div>
