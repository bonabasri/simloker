<?php

/**
 * PSB Online - SMK Kosgoro Nganjuk
 * ------------------------------------------------------------------------
 * @package     PSB Online
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template by www.startbootstrap.com
 */

?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Perusahaan</h3>
    </div>
</div>

<div class="btn-group" role="group" aria-label="...">
    <a href="?p=data.views" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="row">
<div class="panel-body">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:15%;">Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th style="width:15%;">No Telepon</th> 
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Logo</th>               
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tb_perusahaan ORDER BY id_perusahaan DESC";
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_perusahaan']; ?></td>
                        <td ><?php echo $data['alamat']; ?></td>
                        <td style="text-align:center;"><?php echo $data['no_telp'];?></td>
                        <td style="text-align:center;"><?php echo $data['email'];?> & <?php echo $data['jurpil2'];?></td>
                        <td style="text-align:center;"><img src="../dist/images/logo/<?php echo $data['logo'];?>" width="30" height="30"></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-sm" title="Detail Pendaftar" data-toggle="modal" data-target="#detail<?php echo $data['no_reg']; ?>"><span class="fa fa-search fa-fw" aria-hidden="true"></span></a>
                            <a class="btn btn-default btn-sm" title="Edit Data" href="?p=data.edit&id=<?php echo $data['no_reg']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a class="btn btn-default btn-sm" title="Konfirmasi Pendaftar" data-toggle="modal" data-target="#confirm<?php echo $data['no_reg']; ?>"><span class="fa fa-check fa-fw" aria-hidden="true"></span></a>
                        </div>

                        </td>
                    </tr>

                <!-- MODAL -->
                    <!-- BEGIN DETAIL -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="detail<?php echo $data['no_reg']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Detail Pendaftar</h4>
                                </div>
                                <div class="modal-body" style="height:440px;">
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label">Nomor Pendaftaran</label>
                                        <div class="col-lg-6"><?php echo $data['no_reg']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label">Nama</label>
                                        <div class="col-lg-6"><?php echo $data['nama']; ?>
                                            </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label">Tempat, Tanggal Lahir</label>
                                        <div class="col-lg-6"><?php echo $data['tmp_lhr'].", ".date_format(date_create($data['tgl']), 'd-m-Y'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label"> Asal Sekolah</label>
                                        <div class="col-lg-6"><?php echo $data['as_sklh']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label"> Nilai UN</label>
                                        <div class="col-lg-6"><?php echo $data['jmlnilai']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label"> Pilihan Jurusan</label>
                                        <div class="col-lg-6"><?php echo $data['jurpil1']; ?> & <?php echo $data['jurpil2']; ?>
                                        </div>
                                    </div> 
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label"> Nama Orang Tua</label>
                                        <div class="col-lg-6"><?php echo $data['ortu']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label"> Alamat</label>
                                        <div class="col-lg-6"> RT <?php echo $data['rt']." RW ".$data['rw']." ".$data['alamat']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding:15px;">
                                    <label class="col-lg-5 control-label"> Nomor HP</label>
                                        <div class="col-lg-6"><?php echo $data['no_hp']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DETAIL -->

                    <!-- BEGIN KONFIRM -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="confirm<?php echo $data['no_reg']; ?>" >
                    <style type="text/css">
                        #style1 {background-color: #ffffff}
                    </style>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Pendaftar</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="?p=data.action" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $data['no_reg']; ?>">
                                                  
                                    <div class="form-group">
                                    <label>Nomor Pendaftaran</label>
                                        <input type="text" name="no_reg" class="form-control" readonly id="style1" value="<?php echo $data['no_reg']; ?>" />
                                    </div>
                                    <div class="form-group">
                                    <label>Nama Pendaftar</label>
                                        <input type="text" name="nama" class="form-control" readonly id="style1" value="<?php echo $data['nama']; ?>" />
                                    </div>
                                        <input type="hidden" name="jk" class="form-control" value="<?php echo $data['jk']; ?>" />
                                    
                                        <input type="hidden" name="as_sklh" class="form-control" value="<?php echo $data['as_sklh']; ?>" />
                                    
                                    <div class="form-group">
                                    <label>Jumlah Nilai</label>
                                        <input type="text" name="jmlnilai" class="form-control" readonly id="style1" value="<?php echo $data['jmlnilai']; ?>" />
                                    </div>
                                    <div class="form-group">
                                    <label>Status</label>
                                        <select class="form-control" name="status" required />
                                            <option value="<?php echo $data['status'];?>" ><?php echo $data['status'];?></option>
                                            <option value="DITERIMA">DITERIMA</option>
                                            <option value="DITOLAK">DITOLAK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="acc" class="btn btn-primary"> Confirm</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END KONFIRM -->
                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>
</div>