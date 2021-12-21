<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">BERKAS YANG DIPINJAM</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>OPD</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($berkas_dipinjam as $bd):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?= date('d-m-Y', strtotime($bd["ITDOCDT"])); ?></td>
                                            <td><?=$bd["BNDESB1"];?></td>
                                            <td><?=$bd["jenis_berkas"];?></td>
                                            <td><?=$bd["FADESB1"];?></td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?php $now = time();
                                                    $your_date = strtotime($bd["FADTLU"]);
                                                    $datediff = $now - $your_date;

                                                    echo round($datediff / (60 * 60 * 24)); ?>
                                                    hari
                                                </span>
                                            </td>
                                            <?php if($bd["ITPOST"] == "7") {?>
                                                <td>
                                                    <span class="badge badge-danger"><?=$bd["berkas_keluar"];?></span>
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$bd["ITDOCNO"];?><?=$bd["FAICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-warning">Lihat</span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/form_perubahan_data/<?=$bd["FAICU"];?>/<?=$bd["ITDOCNO"];?>"><span class="badge badge-primary">Kembali</span></a>
                                                </td>
                                            <?php } else if($bd["ITPOST"] == "11") {?>
                                                <td>
                                                    <span class="badge badge-danger"><?=$bd["finish"];?></span>
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$bd["ITDOCNO"];?><?=$bd["FAICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-warning">Lihat</span></a>
                                                </td>
                                            <?php }?>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->

                        <!-- COBA MODAL DETAIL START -->
                        <?php foreach($berkas_dipinjam as $bd):?>
                        <div class="modal fade" id="basicModal<?=$bd["ITDOCNO"];?><?=$bd["FAICU"];?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Berkas</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($bd["ITMSTY"] == 1) {?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                    <p style="color:#313236"><?=$bd["BNDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                    <p style="color:#313236"><?=$bd["jenis_berkas"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITINUM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                    <p style="color:#313236"><?=$bd["LMDESA2"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($bd["ITDOCDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                    <p style="color:#313236"><?=$bd["FACOMV"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITBRAND"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITCOLOR"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITCILCAP"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITMFN"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITMACHNID"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                    <p style="color:#313236"><?=$bd["FAVHRN"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($bd["FAVHTAXDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($bd["FAVHRNTAXDT"])); ?></p>
                                                </div>
                                            </div>
                                        <?php } else {?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                    <p style="color:#313236"><?=$bd["BNDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                    <p style="color:#313236"><?=$bd["jenis_berkas"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITINUM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                    <p style="color:#313236"><?=$bd["LMDESA2"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($bd["ITDOCDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                    <p style="color:#313236"><?=$bd["FACRTFID"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($bd["FACRTFDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                    <p style="color:#313236"><?=$bd["FALNDOWNST"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITLENGTH"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITWIDTH"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITWIDE"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                    <p style="color:#313236"><?=$bd["ITASADDR"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                    <p style="color:#313236"><?=$bd["kabupaten"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                    <p style="color:#313236"><?=$bd["kecamatan"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                    <p style="color:#313236"><?=$bd["desa1"];?></p>
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

<script>
    window.onload = function() {
    // Month Day, Year Hour:Minute:Second, id-of-element-container
    countUpFromTime("Jan 1, 2014 12:00:00", 'countup<?=$no;?>'); // ****** Change this line!
    };

    function countUpFromTime(countFrom, id) {
    countFrom = new Date(countFrom).getTime();
    var now = new Date(),
        countFrom = new Date(countFrom),
        timeDifference = (now - countFrom);
        
    var secondsInADay = 60 * 60 * 1000 * 24,
        secondsInAHour = 60 * 60 * 1000;
        
    days = Math.floor(timeDifference / (secondsInADay) * 1);
    hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);
    mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);
    secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);

    var idEl = document.getElementById(id);
    idEl.getElementsByClassName('days')[0].innerHTML = days;
    idEl.getElementsByClassName('hours')[0].innerHTML = hours;
    idEl.getElementsByClassName('minutes')[0].innerHTML = mins;
    idEl.getElementsByClassName('seconds')[0].innerHTML = secs;

    clearTimeout(countUpFromTime.interval);
    countUpFromTime.interval = setTimeout(function(){ countUpFromTime(countFrom, id); }, 1000);
    }
</script>