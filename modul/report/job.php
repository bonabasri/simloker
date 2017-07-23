<!DOCTYPE html>
<html>
<head>
    <title>Data Lowongan Kerja</title>
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
            <font size="2"><b>REPORT LOWONGAN KERJA</b></font><br/>
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
            <th>Posisi</th>
            <th>Kategori Kerja</th>
            <th>Jenis Kerja</th>
            
        </tr>
        </thead>
        <tbody>
            <?php                

                $sql = "SELECT *FROM tb_lowongan a
                        LEFT JOIN tb_kategori_pekerjaan b ON 
                            (a.id_kategori_pekerjaan=b.id_kategori_kerja)
                        LEFT JOIN tb_kategori_pendidikan c ON 
                            (a.id_pendidikan=c.id_pendidikan)
                        LEFT JOIN tb_perusahaan d ON 
                            (a.user_id=d.user_id)
                        LEFT JOIN tb_jenis_pekerjaan e ON
                            (a.id_jenis=e.id_jenis)
                    WHERE a.tgl_posting BETWEEN '{$start}' AND '{$end}' AND a.stat=2
                        ORDER BY a.id_lowongan DESC";

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
            <td><?php echo $data['posisi']; ?></td>
            <td><?php echo $data['nama_kategori_kerja']; ?></td>
            <td><?php echo $data['nama_jenis_kerja']; ?></td>
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
