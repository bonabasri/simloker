<?php
	if (isset($_POST['daftar'])) 
	{
		$user_id	= $_POST['user_id'];
		$uname 		= $_POST['uname'];
		$upsw 		= sha1($_POST['upsw']);
		$uac 		= $_POST['uac'];
		$email 		= $_POST['email'];

		if (!empty($email)) 
		{
			$sql = "SELECT *FROM tb_perusahaan WHERE email = '$email'";
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			
			if ($row['email'] != $email)
			{
				if (!empty($uname))
				{
					$sql = "SELECT *FROM tb_user WHERE uname = '$uname'";
					$res = $conn->query($sql);
					$row = $res->fetch_assoc();
					
					if ($row['uname'] != $uname)
					{
						$query = "INSERT INTO tb_user 
										(uname, upsw, email, uac)
									VALUES ('$uname, $upsw', '$email', '$uac')";
						if ($conn->query($sql) === TRUE)
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
						echo('<script>alert("username sudah digunakan"); </script>');
	 					echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
					}
				} else {
					echo('<script>alert("anda belum mengisi username"); </script>');
	 				echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
				}
			} else {
				echo('<script>alert("email sudah digunakan"); </script>');
	 			echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
			}
		} else {
			echo('<script>alert("email belum diisi"); </script>');
	 		echo '<meta http-equiv="refresh" content="0;URL=?ref=register">';
		}
	}