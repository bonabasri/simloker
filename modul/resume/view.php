
<div class="row">
    <div class="col-md-8">
        <h3 class="page-header"><small> Resume</small></h3>

<div class="btn-group" role="group" aria-label="...">
    <a href="?p=resume.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th >Perusahaan</th>
                        <th style="width:15%;">Posisi</th> 
                        <th style="text-align:center;">CV</th>
                        <th style="text-align:center;">Tanggal Lamar</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['user_id'];
                        $sql = "SELECT *FROM tb_lamaran a 
                                left join tb_lowongan b on a.id_lowongan = b.id_lowongan
                                left join tb_pelamar c on b.user_id = c.user_id
                                left join tb_perusahaan d on b.user_id = d.user_id
                                WHERE a.user_id = '$getID'";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {
                            $status = $data['status'];
                            if ($status === '0') {
                                $status = '<span class="label label-default">Terkirim</span>';
                            } elseif ($status === '1') {
                                $status = '<span class="label label-primary">Proses Interview</span>';
                            } elseif ($status === '2') {
                                $status = '<span class="label label-success">Diterima</span>';
                            }
                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><img src="dist/images/logo/<?php echo $data['logo'];?> " width="30" height="30"/> <?php echo $data['nama_perusahaan']; ?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><a href="dist/file/cv/<?php echo $data['file']; ?>"><?php echo $data['file'];?></a></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_lamar']), 'd/m/Y');?> </td>
                        <td ><?php echo $status;?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=job.edit&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=job.delete&id=<?php echo $data['id_lowongan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data lowongan?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
                        </div>

                        </td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>
</div>
</div>