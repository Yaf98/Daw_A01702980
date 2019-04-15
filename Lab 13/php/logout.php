<?php
	require_once("utils.php");
	
	session_start();
    session_unset();
    session_destroy();
	_header();
	_login_form();
	_footer();
?>