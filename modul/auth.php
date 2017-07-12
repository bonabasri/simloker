<?php

	require('./core.php');
	
	if (isset($_POST['login'])) 
	{
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

				header('location:./main.php');
			}
		} else {
			// header('location:login.php?action=error');
			echo('<script>alert("username dan password tidak cocok"); </script>');
		 	echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
		}
	}

	if (isset($_POST['daftar'])) 
	{	
		$uname 		= $_POST['uname'];
		$user_id	= $uname;
		$upsw 		= sha1($_POST['upsw']);
		$email 		= $_POST['email'];
		$uac 		= $_POST['uac'];
		
		if (!empty($uname)) 
		{
			$sql = "SELECT *FROM tb_user WHERE uname = '$uname'";
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			
			if ($row['uname'] != $uname)
			{
				if (!empty($email))
				{
					$sql = "SELECT *FROM tb_user WHERE email = '$email'";
					$res = $conn->query($sql);
					$row = $res->fetch_assoc();
					
					if ($row['email'] != $email)
					{
						$query = "INSERT INTO tb_user 
										(user_id, uname, upsw, email, uac)
									VALUES 
										('$user_id', '$uname', '$upsw', '$email', '$uac')";
						
						if ($conn->query($query) === TRUE)
						{
							echo('<script>alert("registrasi berhasil, silahkan login"); </script>');
	 						echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
						}
						if ($uac === 'PELAMAR') 
						{
							$sql = "INSERT INTO tb_pelamar (user_id) VALUES ('$user_id')";
							$conn->query($sql);

						} elseif ($uac === 'PERUSAHAAN') 
						{
							$sql = "INSERT INTO tb_perusahaan (user_id) VALUES ('$user_id')";
							$conn->query($sql);
						} 
					} else {
						echo('<script>alert("email sudah digunakan"); </script>');
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
					}
				} else {
					echo('<script>alert("email belum diisi"); </script>');
	 				echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
				}
			} else {
				echo('<script>alert("username sudah digunakan"); </script>');
	 			echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
			}
		} else {
			echo('<script>alert("username belum diisi"); </script>');
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
		}
	}
?>