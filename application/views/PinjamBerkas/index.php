<?php if($this->session->userdata('SCUSG') == "BPKAD" || $this->session->userdata('SCUSG') == "Administrator") {?>
    <div class="content-body btn-page" style="margin-top:-4%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center><h4 class="card-title">PINJAM BERKAS</h4></center>
                        </div>
                        <div class="card-body">
                            <a href="<?=base_url()?>PinjamBerkas/pengajuan_pinjam_berkas"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Pinjam Berkas</button></a>
                            <!-- TABEL BERKAS BARU START -->
                            <div class="table-responsive" style="margin-top:20px;">
                                <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Nomor Dokumen</center></th>
                                            <th><center>Tanggal</center></th>
                                            <th><center>Jumlah Berkas</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($getAllBerkas as $gab):?>
                                            <tr>
                                                <td><center><?=$no++;?></center></td>
                                                <td><center><?=$gab["ITDOCNO"];?></center></td>
                                                <td><center><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></center></td>
                                                <td><center><?=$gab["total_berkas"];?></center></td>
                                                <?php if($gab["ITPOST"] == '0') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gab["draft"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" title="LIHAT Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- EDIT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/tambah_baru/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed"><span class="badge badge-warning" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>

                                                        <!-- HAPUS -->
                                                        <a data-toggle="modal" href="#basicModal2<?=$gab["ITDOCNO"];?>" ><span class="badge badge-danger" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></span></i></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print" aria-hidden="true"></i></span></a>

                                                        <!-- SERAHKAN -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Approval/<?=$gab["ITDOCNO"];?>" title="Serahkan"><span class="badge badge-success"></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gab["ITPOST"] == '2') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gab["pengajuan"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" title="LiHAT Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gab["ITPOST"] == '3') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gab["verifikasi"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" title="LIHAT Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gab["ITPOST"] == '7') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gab["berkas_keluar"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" title="LIHAT Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gab["ITPOST"] == '11') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gab["finish"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" title="LIHAT Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php }?>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- TABEL BERKAS BARU END -->

                            <!-- MODAL HAPUS BERKAS BARU START -->
                            <?php foreach($getAllBerkas as $gab):?>
                                <div class="modal fade" id="basicModal2<?=$gab["ITDOCNO"];?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Berkas</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="basic-form">
                                                    <form method="post" action="<?=base_url('PinjamBerkas/hapus_pengajuan_pinjam/'.$gab['ITDOCNO'])?>">
                                                        <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus semua berkas pada dokumen ini?</p>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="ITDOCNO" value="<?=$gab["ITDOCNO"];?>">
                                                            <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;&nbsp;Hapus</button>
                                                            <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <!-- MODAL HAPUS BERKAS BARU END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else if($this->session->userdata('SCUSG') == "OPD") {?>
    <div class="content-body btn-page" style="margin-top:-4%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center><h4 class="card-title">PINJAM BERKAS</h4></center>
                        </div>
                        <div class="card-body">
                            <a href="<?=base_url()?>PinjamBerkas/pengajuan_pinjam_berkas"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Pinjam Berkas</button></a>
                            <!-- TABEL BERKAS BARU START -->
                            <div class="table-responsive" style="margin-top:20px;">
                                <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Nomor Dokumen</center></th>
                                            <th><center>Tanggal</center></th>
                                            <th><center>Jumlah Berkas</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($getAllBerkas_opd as $gabo):?>
                                            <tr>
                                                <td><center><?=$no++;?></center></td>
                                                <td><center><?=$gabo["ITDOCNO"];?></center></td>
                                                <td><center><?= date('d-m-Y', strtotime($gabo["ITDOCDT"])); ?></center></td>
                                                <td><center><?=$gabo["total_berkas"];?></center></td>
                                                <?php if($gabo["ITPOST"] == '0') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gabo["draft"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gabo["ITDOCNO"];?>" class="pd-setting-ed" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- EDIT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/tambah_baru/<?=$gabo["ITDOCNO"];?>" class="pd-setting-ed" title="Edit"><span class="badge badge-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>

                                                        <!-- HAPUS -->
                                                        <a data-toggle="modal" href="#basicModal2<?=$gabo["ITDOCNO"];?>" title="Hapus"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></i></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gabo["ITDOCNO"];?>/<?=$gabo["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print" aria-hidden="true"></i></span></a>

                                                        <!-- SERAHKAN -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Approval/<?=$gabo["ITDOCNO"];?>" title="Serahkan"><span class="badge badge-success"><i class="fa fa-file-export" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gabo["ITPOST"] == '2') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gabo["pengajuan"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gabo["ITDOCNO"];?>" class="pd-setting-ed" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gabo["ITDOCNO"];?>/<?=$gabo["ITIDBUID"];?>" style="color:#2b2a28;" title="Cetak Berita Acara"><span class="badge badge-primary"><i class="fa fa-print"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gabo["ITPOST"] == '3') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gabo["verifikasi"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gabo["ITDOCNO"];?>" class="pd-setting-ed" title="Lihat Detail"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gabo["ITDOCNO"];?>/<?=$gabo["ITIDBUID"];?>" style="color:#2b2a28;" title="Cetak Berita Acara"><span class="badge badge-primary"><i class="fa fa-print"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gabo["ITPOST"] == '7') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gabo["berkas_keluar"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gabo["ITDOCNO"];?>" class="pd-setting-ed" title="Lihat Detail"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gabo["ITPOST"] == '11') {?>
                                                    <td><center>
                                                        <span class="badge badge-warning"><?=$gabo["finish"];?></span></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gabo["ITDOCNO"];?>" class="pd-setting-ed" title="Lihat Detail"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        </center>
                                                    </td>
                                                <?php }?>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- TABEL BERKAS BARU END -->

                            <!-- MODAL HAPUS BERKAS BARU START -->
                            <?php foreach($getAllBerkas_opd as $gabo):?>
                                <div class="modal fade" id="basicModal2<?=$gabo["ITDOCNO"];?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Berkas</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="basic-form">
                                                    <form method="post" action="<?=base_url('PinjamBerkas/hapus_pengajuan_pinjam/'.$gabo['ITDOCNO'])?>">
                                                        <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus semua berkas pada dokumen ini?</p>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="ITDOCNO" value="<?=$gabo["ITDOCNO"];?>">
                                                            <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;&nbsp;Hapus</button>
                                                            <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <!-- MODAL HAPUS BERKAS BARU END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>