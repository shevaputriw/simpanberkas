<div class="content-body" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>PENGAJUAN PINJAM BERKAS</h4></center>
                    </div>
                    <br>
                    <div class="card-body">
                            <form action="<?=base_url()?>PinjamBerkas/tambah_baru/<?=$data_peminjaman["ITDOCNO"];?>" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Tanggal</b></label>
                                        <input type="date" class="form-control" name="ITDOCDT" value="<?php echo date('Y-m-d') ?>" style="background-color:#f2f2f2;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label style="color:#2b2a28;"><b>Pilih Berkas yang akan Dipinjam :</b></label>
                                        <select class="form-control" name="ITICU" required>
                                            <option value="" selected="true" disabled="disabled">-- Pilih Berkas --</option>
                                            <?php foreach($get_berkas2_t1201 as $x) : ?>
                                                <option value="<?=$x["FAICU"]?>"><?=$x["FADESB1"]?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label style="color:#2b2a28;"><b>Keterangan :</b></label>
                                        <textarea name="ITDESB2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            &nbsp;&nbsp;
                                            <a href="<?=base_url()?>PinjamBerkas/index"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                        </center>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

                <!-- TABEL END -->
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">BERKAS YANG DIPINJAM</h4></center><br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">         
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Nama Barang</center></th>
                                        <th><center>Keterangan</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($get_data_peminjaman as $gt):?>
                                        <tr>
                                            <td><center><?=$no++;?></center></td>
                                            <td><center><?=$gt["ITDESB1"];?></td>
                                            <td><center><?=$gt["ITDESB2"];?></td>
                                            <td><center>
                                                <!-- DETAIL -->
                                                <a data-toggle="modal" href="#basicModal<?=$gt["ITICU"];?>" class="pd-setting-ed" style="color:#2b2a28;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                <!-- HAPUS -->
                                                <a data-toggle="modal" href="#basicModal2<?=$gt["ITICU"];?>" class="pd-setting-ed" style="color:#2b2a28;" title="Hapus"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- TABLE END -->

                <!-- MODAL DETAIL BERKAS START -->
                <?php foreach($get_data_peminjaman as $gt):?>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal<?=$gt["ITICU"];?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Berkas</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <?php if($gt["ITMSTY"] == 1) {?>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                <p style="color:#313236"><?=$gt["DTDESC1"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                <p style="color:#313236"><?=$gt["AMOBJ"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                <p style="color:#313236"><?=$gt["ITDESB1"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                <p style="color:#313236"><?=$gt["LMDESA2"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["ITDOCDT"])); ?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                <p style="color:#313236"><?=$gt["ITCOMV"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                <p style="color:#313236"><?=$gt["ITBRAND"];?></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                <p style="color:#313236"><?=$gt["ITCOLOR"];?></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                <p style="color:#313236"><?=$gt["ITCILCAP"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                <p style="color:#313236"><?=$gt["ITMFN"];?></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                <p style="color:#313236"><?=$gt["ITMACHNID"];?></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                <p style="color:#313236"><?=$gt["ITVHRN"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["ITVHTAXDT"])); ?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["ITVHRNTAXDT"])); ?></p>
                                            </div>
                                        </div>
                                    <?php } else {?>
                                        <div class="form-row">
                                            <!-- <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                <p style="color:#313236"><?=$gt["BNDESB1"];?></p>
                                            </div> -->
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                <p style="color:#313236"><?=$gt["DTDESC1"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                <p style="color:#313236"><?=$gt["AMOBJ"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                <p style="color:#313236"><?=$gt["ITDESB1"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                <p style="color:#313236"><?=$gt["LMDESA2"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["ITDOCDT"])); ?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                <p style="color:#313236"><?=$gt["ITCRTFID"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["ITCRTFDT"])); ?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                <p style="color:#313236"><?=$gt["ITLNDOWNST"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                <p style="color:#313236"><?=$gt["ITLENGTH"];?></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                <p style="color:#313236"><?=$gt["ITWIDTH"];?></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                <p style="color:#313236"><?=$gt["ITWIDE"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                <p style="color:#313236"><?=$gt["ITASADDR"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                <p style="color:#313236"><?=$gt["kabkota"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                <p style="color:#313236"><?=$gt["kecamatan"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                <p style="color:#313236"><?=$gt["desa"];?></p>
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
                <!-- MODAL DETAIL BERKAS END -->

                <!-- MODAL HAPUS BERKAS START -->
                <?php foreach($get_data_peminjaman as $gt):?>
                    <div class="modal fade" id="basicModal2<?=$gt["ITICU"];?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Berkas</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="basic-form">
                                        <form method="post" action="<?=base_url('PinjamBerkas/Hapus_berkas_pinjam/'.$gt['ITDOCNO'].'/'.$gt["ITICU"])?>">
                                            <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus berkas <b><?=$gt["ITDESB1"];?></b>?</p>
                                            <div class="modal-footer">
                                                <input type="hidden" name="ITDOCNO" value="<?=$gt["ITDOCNO"];?>">
                                                <input type="hidden" name="ITICU" value="<?=$gt["ITICU"];?>">
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
                <!-- MODAL HAPUS BERKAS END -->
            </div>
        </div>
    </div>
</div>