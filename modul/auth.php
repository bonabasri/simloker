<?php

	require('./core.php');
	
	$v_uname = $conn->real_escape_string($_POST['uname']);
	$v_upsw	 = $conn->real_escape_string($_POST['upsw']);

	$log = "SELECT *FROM tb_user WHERE uname='".$v_uname."' AND upsw='".sha1($v_upsw)."'";
	$res = $conn->query($log);
	$row = $res->fetch_assoc();

	if ($res->num_rows === 1 ) {
		foreach ($row as $key => $value) {
			# code...
			$_SESSION[$key] = $value;
			//session_start();
			$_SESSION['user_id']= $row['user_id'];
			$_SESSION['uname'] 	= $v_uname;
			$_SESSION['upsw']	= $v_upsw;  
			$_SESSION['uac'] 	= $row['uac']; 

			header('location:?p=member');
		}
	} else {
		// header('location:login.php?action=error');
		echo('<script>alert("username dan password tidak cocok"); </script>');
	 	echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
	}
?>