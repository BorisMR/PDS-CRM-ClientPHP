<?php
	
	session_start();
	
	session_unset();
    session_destroy();
    header('Location: /PDS-CRM-ClientPHP/formLogin.php');
?>