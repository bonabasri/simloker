
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Kategori Pendidikan</small></h3>
    
<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=pendidikan.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=pendidikan.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th >Nama Kategori Pendidikan</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT *FROM tb_kategori_pendidikan";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_pendidikan']; ?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=pendidikan.edit&id=<?php echo $data['id_pendidikan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=pendidikan.delete&id=<?php echo $data['id_pendidikan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data kategori pendidikan?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
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