<?php

	require('./core.php');
	
	if (isset($_POST['login'])) 
	{
	$v_uname = $conn->real_escape_string($_POST['uname']);
	// $v_upsw	 = $conn->real_escape_string($_POST['upsw']);
	$v_upsw	 = $conn->real_escape_string(sha1($_POST['upsw']));

	$log = "SELECT *FROM tb_user WHERE uname='".$v_uname."' AND upsw='".$v_upsw."'";
	$res = $conn->query($log);
	$row = $res->fetch_assoc();

		if ($res->num_rows === 1 ) {
			foreach ($row as $key => $value) {
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
		$conn->close();
	}

	if (isset($_POST['daftar'])) 
	{	
		$uname 		= $_POST['uname'];
		$user_id	= $uname;
		$upsw 		= $_POST['upsw'];
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
							echo('<script>alert("Registrasi berhasil, silahkan login"); </script>');
	 						echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
	 						date_default_timezone_set('Etc/UTC');
							require 'PHPMailer/PHPMailerAutoload.php';
							$mail = new PHPMailer;
							$mail->isSMTP();
							$mail->Host = 'smtp.gmail.com';
							$mail->Port = 587;
							$mail->SMTPSecure = 'tls';
							$mail->SMTPAuth = true;
							$mail->Username = $email;
							$mail->Password = $upsw;  /*Tulis Password Gmail Anda Disini*/
							$mail->setFrom('admin.lokercilacap@gmail.com', 'lokercilacap.com');
							$mail->addAddress($email, $user_id);
							$mail->Subject = 'Selamat Datang di lokercilacap.com';
							$mail->msgHTML("<body style='margin: 20px;'>
							        <div style='width: 640px; font-family: Arial, sans-serif; font-size: 14px; padding:30px 30px 30px 30px; line-height:25px; border:#eaeaea solid 10px; border-radius: 5px; color:#445566;'>
							        <br>
							        Selamat Datang ".$user_id.", <br>
						        	Anda baru saja bergabung sebagai ".$uac." di lokercilacap!<br>
							        <ul>
								        <li>Baca <a href='http://localhost/simloker/?p=add-job'>panduan memulai</a>
								        </li>
							        </ul>
							        <hr>
							        Salam Hangat, <br>
							        Admin lokercilacap
							        </div>
							        </body>");
							$mail->AltBody = 'Selamat Datang di lokercilacap.com';

							if (!$mail->send()) {
							    echo "Mailer Error: " . $mail->ErrorInfo;
							}
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
		$conn->close();
	}


	if (isset($_POST['reset'])) 
	{
	$uname = $conn->real_escape_string($_POST['uname']);

	$sql = "SELECT *FROM tb_user WHERE uname='".$v_uname."'";
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();
	$email = $row['email'];

		// if ($res->num_rows === 1 ) {
		// 	foreach ($row as $key => $value) {
		// 		# code...
		// 		$_SESSION[$key] = $value;
		// 		//session_start();
		// 		$_SESSION['user_id']= $row['user_id'];
		// 		$_SESSION['uname'] 	= $v_uname;
		// 		$_SESSION['upsw']	= $v_upsw;  
		// 		$_SESSION['uac'] 	= $row['uac']; 

		// 		header('location:./main.php');
		// 	}
		// } else {
		// 	// header('location:login.php?action=error');
		// 	echo('<script>alert("username dan password tidak cocok"); </script>');
		//  	echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
		// }
	}
?>