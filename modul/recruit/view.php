
<div class="row">
    <div class="col-md-8">
        <h3 class="page-header"><small> Pelamar</small></h3>

<div class="btn-group" role="group" aria-label="...">   
    <a href="?p=recruit.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:5%;">No</th>
                        <th>Pelamar</th>
                        <th>Email</th>
                        <th>Posisi</th> 
                        <th>CV</th>
                        <th style="text-align:center;">Tgl Lamar</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['user_id'];
                        $sql = "SELECT *FROM tb_lamaran a 
                                left join tb_lowongan b on a.id_lowongan = b.id_lowongan
                                left join tb_pelamar c on a.user_id = c.user_id
                                left join tb_user e on c.user_id = e.user_id
                                left join tb_perusahaan d on b.user_id = d.user_id
                                WHERE b.user_id = '$getID'";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {
                            $status = $data['status'];
                            if ($status === '0') {
                                $status = '<span class="label label-default">Pelamar Baru</span>';
                            } elseif ($status === '1') {
                                $status = '<span class="label label-primary">Proses Interview</span>';
                            } elseif ($status === '2') {
                                $status = '<span class="label label-success">Diterima</span>';
                            }
                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></td>
                        <td ><?php echo $data['email'];?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td style="width: 15%;"><a href="dist/file/cv/<?php echo $data['file']; ?>" target="_blank"><?php echo $data['file'];?></a></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_lamar']), 'd/m/Y');?> </td>
                        <td ><?php echo $status;?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            
                            <a class="btn btn-default btn-xs" title="Proses Data" href="?p=recruit.review&id=<?php echo $data['id_lamaran']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
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