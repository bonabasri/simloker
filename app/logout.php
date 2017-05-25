<?php
	session_start();
	unset($_SESSION['usr_username']);
	session_destroy();
	header('location: ./');
?>