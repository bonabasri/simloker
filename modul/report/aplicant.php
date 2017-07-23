<!DOCTYPE html>
<html>
<head>
    <title>Data Pelamar Kerja</title>
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
            <font size="2"><b>REPORT DATA PELAMAR</b></font><br/>
            <font size="2">Periode : <?php echo DateIndo($start)." - ".DateIndo($end); ?></font>
        </td>
</table>

<hr style="border: double;">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelamar</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Lulusan</th>
            <th>Usia</th>
            
        </tr>
        </thead>
        <tbody>
            <?php                

                $sql = "SELECT * FROM tb_pelamar a
                        LEFT JOIN tb_user b ON a.user_id = b.user_id
                        WHERE a.tgl_daftar BETWEEN '{$start}' AND '{$end}'
                    ORDER BY a.id_pelamar DESC";

                $res = $conn->query($sql);
                        
                $no = 0;
                // foreach ($res as $row) {
                    foreach ($res as $row => $data) {
                $no++;
            ?>                     
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['tempat_lahir']; ?></td>
            <td><?php echo $data['lulusan']; ?></td>
            <td><?php echo $data['usia']; ?></td>

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
