<?php
	if (isset($_POST['save'])) 
	{
		$allowExt 	= array( 'png', 'jpg' );

		$fileName 	= $_FILES['file']['name'];
		$fileExt	= strtolower(end(explode('.', $filename)));
		$fileSize	= $_FILES['file']['size'];
		$fileTemp 	= $_FILES['file']['tmp_name'];

	}
?>