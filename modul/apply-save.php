<?php
if (isset($_POST['apply-save'])) 
{
	$v_id_lowongan 	= $_POST['id_lowongan'];
	$v_user_id 		= $_SESSION['user_id'];

	$allowExt 			= array( 'doc', 'docx', 'pdf' );
	$allowExt1 			= array( 'pdf' );

	$fileName 			= $_FILES['file']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['file']['size'];
	$fileTemp 			= $_FILES['file']['tmp_name'];

	$fileName1 			= $_FILES['files']['name'];
	$fileExt1			= strtolower(end(explode('.', $fileName1)));
	$fileSize1			= $_FILES['files']['size'];
	$fileTemp1 			= $_FILES['files']['tmp_name'];

	$upload_dir 		= "dist/file/cv/";
	$file 				= basename ($fileName);
	$v_file 			= str_replace(' ','_',$file);

	$upload_dir1 		= "dist/file/ijazah/";
	$files 				= basename ($fileName1);
	$v_files 			= str_replace(' ','_',$files);

	if ( in_array( $fileExt, $allowExt ) === TRUE ) 
	{
		if ( in_array( $fileExt1, $allowExt1 ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( $fileSize1 < 1044070 ) 
				{
					$sqlcek = "SELECT * FROM tb_lamaran WHERE id_lowongan = '".$v_id_lowongan."' AND user_id = '".$v_user_id."' ";
		    		$result = $conn->query($sqlcek);

				    if ($result->num_rows > 0) {
				        echo '<script>alert("anda sudah mengirim lamaran"); </script>';
				        echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
				    } else {

						if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file ) && move_uploaded_file( $fileTemp1,$upload_dir1.$v_files ) )
						{
						$sql = "INSERT INTO tb_lamaran 
										(id_lowongan,user_id,file,files,tgl_lamar)
								VALUES ('$v_id_lowongan','$v_user_id','$v_file','$v_files',NOW())";

							if ( $conn->query($sql) === TRUE ) {
								echo '<script>alert("lamaran berhasil dikirim"); </script>';
					 			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
							} else {
							// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
							echo '<script>alert("data gagal disimpan disimpan"); </script>';
					 		echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
							}
						} else {
							echo '<script>alert("gagal upload file"); </script>';
							echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
						}
					}
				} else {
					echo '<script>alert("ukuran file ijazah maks 1 mb"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
				}
			} else {
				echo '<script>alert("ukuran file cv maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
			}
		} else {
			echo '<script>alert("ekstensi file ijazah harus pdf"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
		}
	} else {
		echo '<script>alert("ekstensi file cv tidak diijinkan"); </script>';
		echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
	}
	$conn->close();
}