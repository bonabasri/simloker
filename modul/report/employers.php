<!DOCTYPE html>
<html>
<head>
    <title>Data Perusahaan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print(); ">
<div class="container-fluid">
<div class="col-lg-12 col-md-offset-0">
<br/>

<?php
    $tgl     = explode('-',$_POST['start']);
    $start   = $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

    $tgl     = explode('-',$_POST['end']);
    $end     = $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

?>

<table  style='font-family: "Arial"; '> 
    
        <td >
            <font size="2"><b>REPORT DATA PERUSAHAAN</b></font><br/>
            <font size="2">Periode : <?php echo DateIndo($start)." - ".DateIndo($end); ?></font>
        </td>
</table>

<hr style="border: double;">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
            <?php                

                $sql = "SELECT * FROM tb_perusahaan a
                                INNER JOIN tb_user b ON a.user_id = b.user_id
                        WHERE a.tgl_daftar BETWEEN '{$start}' AND '{$end}'
                                ORDER BY b.user_id DESC";

                $res = $conn->query($sql);
                        
                $no = 0;
                // foreach ($res as $row) {
                    foreach ($res as $row => $data) {
                $no++;
            ?>                     
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama_perusahaan']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['no_telp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            
        </tr>
                    
            <?php
                }
            ?>

        </tbody>
        </table>
    </div>
</div>
</body>
</html>
