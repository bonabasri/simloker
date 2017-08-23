<?php
include('core.php');
if ( isset($_POST["id_provinsi"]) && !empty($_POST["id_provinsi"]) )
{
    $query = $conn->query("SELECT * FROM tb_kota WHERE id_provinsi = ".$_POST['id_provinsi']." ");
    
    $rowCount = $query->num_rows;
    
    if($rowCount > 0){
        echo '<option value="">- Pilih Kota -</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_kota'].'">'.$row['kota'].'</option>';
        }
    }else{
        echo '<option value="">Kota Tidak Tersedia</option>';
    }
}