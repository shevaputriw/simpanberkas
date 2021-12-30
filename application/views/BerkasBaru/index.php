<?php if($this->session->userdata('SCUSG') == 'BPKAD') { ?>
<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">TAMBAH BERKAS BARU</h4></center>
                    </div>
                    <div class="card-body">
                        <a href="<?=base_url()?>BerkasBaru/Halaman_Tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah Berkas</button></a>

                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Nomor Dokumen</center></th>
                                        <th><center>OPD</center></th>
                                        <th><center>Tanggal Dokumen</center></th>
                                        <th><center>Jumlah Berkas</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAll as $gt):?>
                                        <tr>
                                            <td><center><?=$no++;?></center></td>
                                            <td><center><?=$gt["OVDOCNO"];?></center></td>
                                            <td><?=$gt["BNDESB1"];?></td>
                                            <td><center><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></center></td>
                                            <td><center><?=$gt["total_berkas"];?></center></td>
                                            
                                            <?php if($gt["OVPOST"] == "0" || $gt["OVPOST"] == NULL) {?>
                                                <td><center>
                                                    <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["draft"];?></span></a></center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Data"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                    <!-- SERAHKAN -->
                                                    <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-success"><i class="fa fa-file-export" aria-hidden="true"></i></span></a>
                                                    </center>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "1") {?>
                                                <td><center>
                                                    <a href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["approval"];?></span></a></center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Data"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                    </center>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "3") {?>
                                                <td><center>
                                                    <a href="#"><span class="badge badge-success"><?=$gt["verifikasi_pengajuan"];?></span></a></center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Data"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                    </center>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "11") {?>
                                                <td><center>
                                                    <a href="#"><span class="badge badge-success"><?=$gt["finish"];?></span></a></center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Data"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
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
                        <?php foreach($getAll as $gt):?>
                            <div class="modal fade" id="basicModal2<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('BerkasBaru/Hapus_BerkasUpdate/'.$gt['OVIDBUID'].'/'.$gt["OVDOCNO"])?>">
                                                    <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus semua berkas milik <b><?=$gt["BNDESB1"];?></b>?</p>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="OVDOCNO" value="<?=$gt["OVDOCNO"];?>">
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

                        <!-- MODAL UBAH DRAFT BERKAS BARU START -->
                        <?php foreach($getAll as $gt):?>
                            <div class="modal fade" id="basicModal<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('BerkasBaru/Edit_Berkas2/'.$gt['OVDOCNO'].'/'.$gt["OVIDBUID"])?>">
                                                    <p style="color:#2b2a28;">Dokumen ini telah diusulkan. Jika Anda mengubah data, maka status dokumen akan menjadi <b>Draft</b>. 
                                                    <br><br>Apakah Anda tetap ingin mengubahnya?</p>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> &nbsp;&nbsp;Ubah</button>
                                                        <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <!-- MODAL UBAH DRAFT BERKAS BARU END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else if($this->session->userdata('SCUSG') == 'OPD') {?>
    <div class="content-body btn-page" style="margin-top:-4%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center><h4 class="card-title">BERKAS BARU</h4></center>
                        </div>
                        <div class="card-body">
                            <a href="<?=base_url()?>BerkasBaru/Halaman_Tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tambah Berkas</button></a>

                            <!-- TABEL BERKAS BARU START -->
                            <div class="table-responsive" style="margin-top:20px;">
                                <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Nomor Dokumen</center></th>
                                            <th><center>Tanggal Dokumen</center></th>
                                            <th><center>Jumlah Berkas</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($getAll_opd as $gt):?>
                                            <tr>
                                                <td><center><?=$no++;?></center></td>
                                                <td><center><?=$gt["OVDOCNO"];?></center></td>
                                                <td><center><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></center></td>
                                                <td><center><?=$gt["total_berkas"];?></center></td>
                                                <?php if($gt["OVPOST"] == "0" || $gt["OVPOST"] == NULL) {?>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["draft"];?></span></a></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- EDIT -->
                                                        <a href="<?=base_url()?>BerkasBaru/Tambah_Baru/<?=$gt['OVDOCNO'];?>/<?=$gt['OVIDBUID'];?>" class="pd-setting-ed" style="color:#000000;" title="Edit"><span class="badge badge-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>

                                                        <!-- HAPUS -->
                                                        <a data-toggle="modal" href="#basicModal2<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" title="Hapus" style="color:#2b2a28;"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i></span></a>

                                                        <!-- SERAHKAN -->
                                                        <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>" style="color:#2b2a28;" title="Serahkan"><span class="badge badge-success"><i class="fa fa-file-export"></i></span></a></center>
                                                    </td>
                                                <?php } else if($gt["OVPOST"] == "1") {?>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["approval"];?></span></a></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        
                                                        <!-- EDIT -->
                                                        <a data-toggle="modal" href="#basicModal<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" title="Edit" style="color:#2b2a28;"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i></span></a>
                                                    </td>
                                                <?php } else if($gt["OVPOST"] == "3") {?>
                                                    <td><center>
                                                        <a href="#"><span class="badge badge-success"><?=$gt["verifikasi_pengajuan"];?></span></a></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        
                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i></span></a>
                                                    </td>
                                                <?php } else if($gt["OVPOST"] == "11") {?>
                                                    <td><center>
                                                        <a href="#"><span class="badge badge-success"><?=$gt["finish"];?></span></a></center>
                                                    </td>
                                                    <td><center>
                                                        <!-- DETAIL -->
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                        <!-- PRINT -->
                                                        <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i></span></a>
                                                    </td>
                                                <?php }?>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- TABEL BERKAS BARU END -->

                            <!-- MODAL HAPUS BERKAS BARU START -->
                            <?php foreach($getAll as $gt):?>
                                <div class="modal fade" id="basicModal2<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Berkas</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="basic-form">
                                                    <form method="post" action="<?=base_url('BerkasBaru/Hapus_BerkasUpdate/'.$gt['OVIDBUID'].'/'.$gt["OVDOCNO"])?>">
                                                        <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus semua berkas milik <b><?=$gt["BNDESB1"];?></b>?</p>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="OVDOCNO" value="<?=$gt["OVDOCNO"];?>">
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

                            <!-- MODAL UBAH DRAFT BERKAS BARU START -->
                            <?php foreach($getAll as $gt):?>
                                <div class="modal fade" id="basicModal<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Berkas</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="basic-form">
                                                    <form method="post" action="<?=base_url('BerkasBaru/Edit_Berkas2/'.$gt['OVDOCNO'].'/'.$gt["OVIDBUID"])?>">
                                                        <p style="color:#2b2a28;">Dokumen ini telah diusulkan. Jika Anda mengubah data, maka status dokumen akan menjadi <b>Draft</b>. 
                                                        <br><br>Apakah Anda tetap ingin mengubahnya?</p>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> &nbsp;&nbsp;Ubah</button>
                                                            <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <!-- MODAL UBAH DRAFT BERKAS BARU END -->

                            <!-- MODAL DETAIL PARTNER BISNIS START -->
                            <!-- <?php foreach($getAll as $gt):?>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModalb<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Berkas</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gt["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#2b2a28;"><b>Detail Berkas :</b></label>
                                                        <?php $no=1; foreach($get_berkas as $gb):?>
                                                            <p style="color:#313236"><?=$no++?>. <?=$gb["OVDESB1"];?></p>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?> -->
                            <!-- MODAL DETAIL BERKAS END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>