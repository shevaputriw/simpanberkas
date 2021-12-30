<div class="content-body" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>DETAIL BERKAS</h4></center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label style="color:#2b2a28;"><b>OPD :</b></label>
                                <p style="color:#313236"><?=$get_berkas["BNDESB1"];?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="color:#2b2a28;"><b>Nomor Dokuman :</b></label>
                                <p style="color:#313236"><?=$get_berkas["OVDOCNO"];?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                <p style="color:#313236"><?= date('d-m-Y', strtotime($get_berkas["OVDOCDT"])); ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label style="color:#2b2a28;"><b>Detail Berkas :</b></label>
                                <?php $no=1; foreach($get_berkas2 as $gb2):?>
                                    <p style="color:#313236">
                                        <?=$no++?>. <?=$gb2["OVDESB1"];?>
                                        <a data-toggle="modal" href="#basicModal<?=$gb2["OVDOCNO"];?><?=$gb2["OVICU"];?>" class="pd-setting-ed" style="color:#2b2a28;">
                                            <span class="badge badge-warning">Lihat</span>
                                        </a>
                                    </p>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <a href="<?=base_url()?>BerkasBaru/History_berkas_baru"><button type="button" class="btn btn-secondary" style="float:right;"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button></a>

                        <!-- COBA MODAL DETAIL START -->
                        <?php foreach($get_berkas2 as $gb2):?>
                        <div class="modal fade" id="basicModal<?=$gb2["OVDOCNO"];?><?=$gb2["OVICU"];?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Berkas</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($gb2["OVMSTY"] == 1) {?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                    <p style="color:#313236"><?=$gb2["BNDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                    <p style="color:#313236"><?=$gb2["jenis_berkas"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVINUM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["LMDESA2"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gb2["OVDOCDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVCOMV"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVBRAND"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVCOLOR"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVCILCAP"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVMFN"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVMACHNID"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVVHRN"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gb2["OVVHTAXDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gb2["OVVHRNTAXDT"])); ?></p>
                                                </div>
                                            </div>
                                        <?php } else {?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                    <p style="color:#313236"><?=$gb2["jenis_berkas"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVINUM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["LMDESA2"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gb2["OVDOCDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVCRTFID"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gb2["OVCRTFDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVLNDOWNST"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVLENGTH"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVWIDTH"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVWIDE"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                    <p style="color:#313236"><?=$gb2["OVASADDR"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                    <p style="color:#313236"><?=$gb2["kabupaten"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                    <p style="color:#313236"><?=$gb2["kecamatan"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                    <p style="color:#313236"><?=$gb2["desa1"];?></p>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- COBA MODAL DETAIL END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>