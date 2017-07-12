
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small>View Resume</small></h3>
        
            <div class="panel panel-default">
            <div class="panel-heading">Info Resume</div>
                <div class="panel-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lowongan</th>
                        <th>Nama Pelamar</th>
                        <th>Nama Perusahaan</th>
                        <th>Email</th>
                        <th>File CV</th>
                    </tr>
                </thead>
                <tbody>
                    
            <?php
                $GetID  = $_GET['id'];
                $sql = "SELECT *FROM tb_lamaran a 
                        left join tb_lowongan b on a.id_lowongan = b.id_lowongan
                        left join tb_pelamar c on a.user_id = c.user_id
                        left join tb_user e on c.user_id = e.user_id
                        left join tb_perusahaan d on b.user_id = d.user_id
                        WHERE a.id_lamaran = '$GetID'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();

                $status = $data['status'];
                    if ($status === '0') {
                        $status = '<span class="label label-default">Pelamar Baru</span>';
                    } elseif ($status === '1') {
                        $status = '<span class="label label-primary">Proses Interview</span>';
                    } elseif ($status === '2') {
                        $status = '<span class="label label-success">Diterima</span>';
                    }
            ?>
                <tr>
                    <td><?php echo $data['posisi']; ?></td>
                    <td><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></td>
                    <td><?php echo $data['nama_perusahaan']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><a href="dist/file/cv/<?php echo $data['file']; ?>"><?php echo $data['file']; ?></a></td>
                    
                </tr>
                </tbody>
                </table>
                   
                <form class="" role="form" action="?p=recruit.action" id="defaultForm" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $data['message'];?></td>
                        
                    </tr>
                </tbody>
                </table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Interview</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 50%;"><?php echo date_format(date_create($data['tgl_interview']), 'd-m-Y'); ?>
                        </td>
                        <td><?php echo $status; ?>
                        </td>
                    </tr>
                </tbody>
                </table>
                    <button class="btn btn-primary pull-right" type="submit" name="update">Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>
