<?php
	include_once './core.php';

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
	 						echo '<meta http-equiv="refresh" content="0;URL=?ref=login">';
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
	 					echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
					}
				} else {
					echo('<script>alert("email belum diisi"); </script>');
	 				echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
				}
			} else {
				echo('<script>alert("username sudah digunakan"); </script>');
	 			echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
			}
		} else {
			echo('<script>alert("username belum diisi"); </script>');
	 		echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
		}
	}