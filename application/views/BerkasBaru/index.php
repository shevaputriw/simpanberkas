<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">BERKAS BARU</h4></center>
                    </div>
                    <div class="card-body">
                        <a href="<?=base_url()?>BerkasBaru/Halaman_Tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah Berkas</button></a>

                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Dokumen</th>
                                        <th>OPD</th>
                                        <th>Tanggal Dokumen</th>
                                        <th>Jumlah Berkas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAll as $gt):?>
                                        <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$gt["OVDOCNO"];?></td>
                                        <td><?=$gt["BNDESB1"];?></td>
                                        <td><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></td>
                                        <td><?=$gt["total_berkas"];?></td>
                                        <td>
                                            <!-- <a data-toggle="modal" href="#basicModalb<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" class="pd-setting-ed" style="color:#2b2a28;"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                            <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?=base_url()?>BerkasBaru/Tambah_Baru/<?=$gt['OVDOCNO'];?>/<?=$gt['OVIDBUID'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a data-toggle="modal" href="#basicModal2<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
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