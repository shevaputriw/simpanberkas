<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">DAFTAR BERKAS</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Nomor Dokumen</th> -->
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Barang</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($berkas as $gab):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <!-- <td><?=$gab["OVDOCNO"];?></td> -->
                                            <td><?= date('d-m-Y', strtotime($gab["FADTAQU"])); ?></td>
                                            <td><?=$gab["FADESB1"];?></td>
                                            <td><?=$gab["LMDESA2"];?></td>
                                            <td>
                                                <a data-toggle="modal" href="#basicModal<?=$gab["OVDOCNO"];?><?=$gab["FAICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->

                        <!-- MODAL DETAIL START -->
                        <?php foreach($berkas as $gab):?>
                            <div class="modal fade" id="basicModal<?=$gab["OVDOCNO"];?><?=$gab["FAICU"];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if($gab["OVMSTY"] == 1) {?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gab["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                        <p style="color:#313236"><?=$gab["jenis_berkas"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAAOBJ"];?> / <?=$gab["AMDESB1"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["FADESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FADTAQU"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                        <p style="color:#313236"><?=$gab["FACOMV"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                        <p style="color:#313236"><?=$gab["FABRAND"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                        <p style="color:#313236"><?=$gab["FACOLOR"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                        <p style="color:#313236"><?=$gab["FACILCAP"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAMFN"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAMACHNID"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAVHRN"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FAVHTAXDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FAVHRNTAXDT"])); ?></p>
                                                    </div>
                                                </div>
                                            <?php } else {?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gab["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                        <p style="color:#313236"><?=$gab["jenis_berkas"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["OVINUM"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["FADESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FADTAQU"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                        <p style="color:#313236"><?=$gab["FACRTFID"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FACRTFDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                        <p style="color:#313236"><?=$gab["FALNDOWNST"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                        <p style="color:#313236"><?=$gab["FALENGTH"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAWIDTH"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAWIDE"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                        <p style="color:#313236"><?=$gab["FAASADDR"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                        <p style="color:#313236"><?=$gab["kabupaten"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                        <p style="color:#313236"><?=$gab["kecamatan"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                        <p style="color:#313236"><?=$gab["desa1"];?></p>
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
                        <!-- MODAL DETAIL END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>