<?php
if (isset($_POST['apply-save'])) 
{
	$v_id_lowongan 	= $_POST['id_lowongan'];
	$v_user_id 		= $_SESSION['user_id'];

	$allowExt 			= array( 'doc', 'docx', 'pdf' );

	$fileName 			= $_FILES['file']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['file']['size'];
	$fileTemp 			= $_FILES['file']['tmp_name'];

	$upload_dir 		= "dist/file/cv/";
	$file 				= basename ($fileName);
	$v_file 			= str_replace(' ','_',$file);

	if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file) )
				{
					$sql = "INSERT INTO tb_lamaran (id_lowongan,user_id,file,tgl_lamar)
							VALUES ('$v_id_lowongan','$v_user_id','$v_file',NOW())";

					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("lamaran berhasil dikirim"); </script>';
			 			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
					} else {
					// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					// echo '<script>alert("data gagal disimpan disimpan"); </script>';
			 	// 	echo '<meta http-equiv="refresh" content="0;URL=?p=apply">';
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=apply">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=apply">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=apply&id=<?php echo $data["id_lowongan"]; ?>">';
		}
		$conn->close();
	}
