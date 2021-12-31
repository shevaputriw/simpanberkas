<div class="content-body" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>MUTASI BERKAS</h4></center>
                    </div>
                    <br>
                    <div class="card-body">
                        <form action="<?=base_url()?>BerkasBaru/Mutasi/<?=$berkas_mutasi["FAICU"]?>" method="post">
                            <input type="hidden" name="FAICU" value="<?=$berkas_mutasi["FAICU"];?>">

                            <?php if($berkas_mutasi["OVMSTY"] == "1") {?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>OPD/ Pengurus Barang</b></label>
                                        <input type="text" class="form-control" name="opd" value="<?=$berkas_mutasi["BNDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Lokasi Barang</b></label>
                                        <input type="text" class="form-control" name="FAALOC" value="<?=$berkas_mutasi["LMDESA2"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Nomor Dokumen</b></label>
                                        <input type="text" class="form-control" name="OVDOCNO" value="<?=$berkas_mutasi["OVDOCNO"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Tanggal Dokumen</b></label>
                                        <input type="text" class="form-control" name="FADTAQU" value="<?= date('d-m-Y', strtotime($berkas_mutasi["FADTAQU"])); ?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Jenis Berkas</b></label>
                                        <input type="text" class="form-control" name="OVMSTY" value="<?=$berkas_mutasi["jenis_berkas"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Kode Barang</b></label>
                                        <input type="text" class="form-control" name="OVINUM" value="<?=$berkas_mutasi["OVINUM"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Nama Barang</b></label>
                                        <input type="text" class="form-control" name="FADESB1" value="<?=$berkas_mutasi["FADESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Nomor BPKB</b></label>
                                        <input type="text" class="form-control" name="FACOMV" value="<?=$berkas_mutasi["FACOMV"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Merk</b></label>
                                        <input type="text" class="form-control" name="FABRAND" value="<?=$berkas_mutasi["FABRAND"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Warna</b></label>
                                        <input type="text" class="form-control" name="FACOLOR" value="<?=$berkas_mutasi["FACOLOR"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Kapasitas Mesin</b></label>
                                        <input type="text" class="form-control" name="FACILCAP" value="<?=$berkas_mutasi["FACILCAP"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>No. Rangka</b></label>
                                        <input type="text" class="form-control" name="FAMFN" value="<?=$berkas_mutasi["FAMFN"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>No. Mesin</b></label>
                                        <input type="text" class="form-control" name="FAMACHNID" value="<?=$berkas_mutasi["FAMACHNID"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>No. Polisi</b></label>
                                        <input type="text" class="form-control" name="FAVHRN" value="<?=$berkas_mutasi["FAVHRN"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Tanggal Akhir Pajak</b></label>
                                        <input type="text" class="form-control" name="FAVHTAXDT" value="<?= date('d-m-Y', strtotime($berkas_mutasi["FAVHTAXDT"])); ?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Tanggal Akhir STNK</b></label>
                                        <input type="text" class="form-control" name="FAVHRNTAXDT" value="<?= date('d-m-Y', strtotime($berkas_mutasi["FAVHRNTAXDT"])); ?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Mutasi Barang Ke</b></label>
                                        <select class="form-control" name="FAMANAGE" id="FAMANAGE" required>
                                            <option value="" selected="true" disabled="disabled">- Pilih OPD -</option>
                                            <?php foreach($data_opd as $opd) : ?>
                                                <!-- <?php if($opd["BNIDBUID"] == $berkas_mutasi["FAMANAGE"]) {?> -->
                                                    <!-- <option value="<?=$berkas_mutasi["FAMANAGE"]?>" selected><?=$opd["BNDESB1"]?></option> -->
                                                <!-- <?php } else {?> -->
                                                    <option value="<?=$opd["BNIDBUID"];?>"><?=$opd["BNDESB1"];?></option>
                                                <!-- <?php }?> -->
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Lokasi Barang</b></label>
                                        <select class="form-control" name="FAALOC" id="FAALOC" required>
                                            <option value="" selected="true" disabled="disabled">- Pilih Lokasi Barang -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="submit" name="submit" class="btn btn-primary" style="float:right;">Mutasi&nbsp;&nbsp;<i class="fa fa-sign-out-alt"></i></button>
                                        </center>
                                    </div>
                                </div>
                            <?php }
                            else {?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>OPD/ Pengurus Barang</b></label>
                                        <input type="text" class="form-control" name="opd" value="<?=$berkas_mutasi["BNDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Lokasi Barang</b></label>
                                        <input type="text" class="form-control" name="FAALOC" value="<?=$berkas_mutasi["LMDESA2"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Nomor Dokumen</b></label>
                                        <input type="text" class="form-control" name="OVDOCNO" value="<?=$berkas_mutasi["OVDOCNO"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Tanggal Dokumen</b></label>
                                        <input type="text" class="form-control" name="FADTAQU" value="<?= date('d-m-Y', strtotime($berkas_mutasi["FADTAQU"])); ?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#313236"><b>Jenis Berkas</b></label>
                                        <input type="text" class="form-control" name="OVMSTY" value="<?=$berkas_mutasi["jenis_berkas"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Kode Barang</b></label>
                                        <input type="text" class="form-control" name="OVINUM" value="<?=$berkas_mutasi["OVINUM"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#2b2a28;"><b>Nama Barang</b></label>
                                        <input type="text" class="form-control" name="FADESB1" value="<?=$berkas_mutasi["FADESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#2b2a28;"><b>Nomor Sertifikat</b></label>
                                        <input type="text" class="form-control" name="FACRTFID" value="<?=$berkas_mutasi["FACRTFID"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#2b2a28;"><b>Tanggal Sertifikat</b></label>
                                        <input type="text" class="form-control" name="FACRTFDT" value="<?= date('d-m-Y', strtotime($berkas_mutasi["FACRTFDT"])); ?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#2b2a28;"><b>Status Kepemilikan</b></label>
                                        <input type="text" class="form-control" name="FALNDOWNST" value="<?=$berkas_mutasi["FALNDOWNST"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label style="color:#2b2a28;"><b>Panjang</b></label>
                                        <input type="text" class="form-control" name="FALENGTH" value="<?=$berkas_mutasi["FALENGTH"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#2b2a28;"><b>Lebar</b></label>
                                        <input type="text" class="form-control" name="FAWIDTH" value="<?=$berkas_mutasi["FAWIDTH"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label style="color:#2b2a28;"><b>Luas</b></label>
                                        <input type="text" class="form-control" name="FAWIDE" value="<?=$berkas_mutasi["FAWIDE"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#2b2a28;"><b>Alamat</b></label>
                                        <input type="text" class="form-control" name="FAASADDR" value="<?=$berkas_mutasi["FAASADDR"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Kabupaten/Kota</b></label>
                                        <input type="text" class="form-control" name="FACITY" value="<?=$berkas_mutasi["kabupaten"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Kecamatan</b></label>
                                        <input type="text" class="form-control" name="FADIST" value="<?=$berkas_mutasi["kecamatan"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Desa</b></label>
                                        <input type="text" class="form-control" name="FASUBDIST" value="<?=$berkas_mutasi["desa1"];?>" style="background-color:#f2f2f2;" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Mutasi Barang Ke</b></label>
                                        <select class="form-control" name="FAMANAGE" id="FAMANAGE" required>
                                            <option value="" selected="true" disabled="disabled">- Pilih OPD -</option>
                                            <?php foreach($data_opd as $opd) : ?>
                                                <!-- <?php if($opd["BNIDBUID"] == $berkas_mutasi["FAMANAGE"]) {?> -->
                                                    <!-- <option value="<?=$berkas_mutasi["FAMANAGE"]?>" selected><?=$opd["BNDESB1"]?></option> -->
                                                <!-- <?php } else {?> -->
                                                    <option value="<?=$opd["BNIDBUID"];?>"><?=$opd["BNDESB1"];?></option>
                                                <!-- <?php }?> -->
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236"><b>Pilih Lokasi Barang</b></label>
                                        <select class="form-control" name="FAALOC" id="FAALOC" required>
                                            <option value="" selected="true" disabled="disabled">- Pilih Lokasi Barang -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="submit" name="submit" class="btn btn-primary" style="float:right;">Mutasi&nbsp;&nbsp;<i class="fa fa-sign-out-alt"></i></button>
                                        </center>
                                    </div>
                                </div>
                            <?php }?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#FAMANAGE").select2();
</script>

<script type="text/javascript">
    $("#FAALOC").select2();
</script>

<!-- GET LOKASI BARANG -->
<script>
    $("#FAMANAGE").change(function(){

        // variabel dari nilai combo box kabupaten/kota
        var idbuid = $("#FAMANAGE").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Lokasi/' + idbuid,
            method : "POST",
            data : {idbuid:idbuid},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].LMLOCID+'>'+data[i].LMDESA2+'</option>';
                }
                $('#FAALOC').html(html);

            }
        });
    });
</script>