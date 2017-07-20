<?php
	if (isset($_POST['update'])) 
	{
		// $getID 			 = $_GET['id'];
		$v_id_pelamar 	 = $_POST['id_lamaran'];
		$v_message 	  	 = $_POST['message'];
		$v_status 	  	 = $_POST['status'];
		$date	         = explode('-',$_POST['tgl_interview']);
		$v_tgl_interview = $date['2'].'-'.$date['1'].'-'.$date['0'];

		$sql = "UPDATE tb_lamaran SET 
					message = '$v_message',
					status  = '$v_status',
					tgl_interview = '$v_tgl_interview'
				WHERE id_lamaran = '$v_id_pelamar' ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("data lamaran berhasil diproses"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=recruit.view">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		
	}