<div class="content-body" style="margin-bottom:-9.6%;">
    <div class="container-fluid" style="margin-top:-4%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
        
                    </div>
                    <br>
                    <div class="basic-form">
                        <!-- <form action="<?=base_url('BerkasBaru/Edit_Berkas/'.$berkas['OVIDBUID'].'/'.$berkas['OVDOCNO'])?>" method="post"> -->
                        <form action="<?=base_url('BerkasBaru/Edit_Berkas/'.$berkas['OVDOCNO'].'/'.$berkas['OVDOCSQ'].'/'.$berkas['OVIDBUID'])?>" method="post">
                            <div class="card-body">
                                <?php if (validation_errors()): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo validation_errors(); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- NAV TABS START-->
                                <ul class="nav nav-tabs" role="tablist" style="margin-top:-40px;">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#umum" id="tab_umum">Umum
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" data-toggle="tab" href="#kendaraan" id="tab_kendaraan">Kendaraan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" data-toggle="tab" href="#tanah" id="tab_tanah">Tanah
                                        </a>
                                    </li>
                                </ul>
                                <!-- NAV TABS END -->
                                <div class="tab-content tabcontent-border">
                                    <!-- TAB UMUM START -->
                                    <div class="tab-pane fade show active" id="umum" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">EDIT BERKAS</h4></center><br>
                                            <input type="hidden" name="OVDOCTY" value="<?=$berkas["OVDOCTY"];?>">
                                            <input type="hidden" name="OVIDBUID" id="OVIDBUID" value="<?=$berkas["OVIDBUID"];?>">
                                            <input type="hidden" name="OVCOID" value="<?=$berkas["OVCOID"];?>">
                                            <input type="hidden" name="OVDOCNO" value="<?=$berkas["OVDOCNO"];?>">
                                            <input type="hidden" name="OVDOCSQ" value="<?=$berkas["OVDOCSQ"];?>">
                                            <input type="hidden" name="OVDOCDT" value="<?=$berkas["OVDOCDT"];?>">
                                            <input type="hidden" name="OVLST" value="<?=$berkas["OVLST"];?>">
                                            <input type="hidden" name="OVNST" value="<?=$berkas["OVNST"];?>">
                                            <input type="hidden" name="OVMSTY" value="<?=$berkas["OVMSTY"];?>">
                                            <input type="hidden" name="OVINUM" value="<?=$berkas["OVINUM"];?>">
                                            <!-- <input type="hidden" name="OVLOCID" value="<?=$berkas["OVLOCID"];?>"> -->
                                            
                                            <div class="form-row">
                                                <!-- <div class="form-group col-md-12">
                                                    <label>OPD</label>
                                                    <select class="form-control" name="OVIDBUID" id="opd">
                                                        <?php foreach($opd as $opd) : ?>
                                                            <?php if($opd["BNIDBUID"] == $berkas["OVIDBUID"]) {?>
                                                                <option value="<?=$opd["BNIDBUID"]?>" selected><?=$opd["BNDESB1"]?></option>
                                                            <?php } else {?>
                                                                <option value="<?=$opd["BNIDBUID"]?>"><?=$opd["BNDESB1"]?></option>
                                                            <?php }?>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div> -->
                                                <div class="form-group col-md-4">
                                                    <label>OPD</label>
                                                    <input type="text" class="form-control" name="OVIDBUID" value="<?=$berkas["BNDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Nomor Dokumen</label>
                                                    <input type="text" class="form-control" name="OVDOCNO" value="<?=$berkas["OVDOCNO"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Tanggal</label>
                                                    <input type="text" class="form-control" name="OVDOCDT" value="<?= date('d-m-Y', strtotime($berkas["OVDOCDT"])); ?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Jenis Berkas</label>
                                                    <input type="text" class="form-control" name="OVDOCNO" id="OVMSTY" value="<?=$berkas["DTDESC1"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Kode Barang</label>
                                                    <input type="text" class="form-control" name="OVDOCNO" value="<?=$berkas["AMDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Lokasi Barang</label>
                                                    <!-- <input type="text" class="form-control" name="OVLOCID" value="<?=$berkas["OVLOCID"];?>" style="background-color:#f2f2f2;"> -->
                                                    <select class="form-control" name="OVLOCID" id="OVLOCID" required>
                                                        <!-- <option value="" selected="true" disabled="disabled">- Pilih Lokasi Barang -</option> -->
                                                        <option value="<?=$berkas["OVLOCID"];?>" selected><?=$berkas["OVLOCID"];?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal</label>
                                                    <input type="date" class="form-control" name="OVDOCDT" id="OVDOCDT" value="<?php echo date('Y-m-d', strtotime($berkas["OVDOCDT"])) ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Jenis Berkas</label>
                                                    <select class="form-control" name="OVMSTY" id="jenis_berkas">
                                                        <?php foreach($jenis_berkas as $jb) : ?>
                                                            <?php if($jb["DTDC"] == $berkas["OVMSTY"]) {?>
                                                                <option value="<?=$jb["DTDC"]?>" selected><?=$jb["DTDESC1"]?></option>
                                                            <?php } else {?>
                                                                <option value="<?=$jb["DTDC"]?>"><?=$jb["DTDESC1"]?></option>
                                                            <?php }?>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-row">
                                                <!-- <div class="form-group col-md-6">
                                                    <label>Kode Barang</label>
                                                    <select class="form-control" name="OVINUM" id="kode_barang" required>
                                                        <?php foreach($kode_barang as $kb) : ?>
                                                            <?php if($kb["AMOBJ"] == $berkas["OVINUM"]) {?>
                                                                <option value="<?=$kb["AMOBJ"]?>" selected><?=$kb["AMDESB1"]?></option>
                                                            <?php } else {?>
                                                                <option value="<?=$kb["AMOBJ"]?>"><?=$kb["AMDESB1"]?></option>
                                                            <?php }?>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div> -->
                                                <div class="form-group col-md-12">
                                                    <label>Nama Barang</label>
                                                    <input type="text" class="form-control" name="OVDESB1" value="<?=$berkas["OVDESB1"];?>">
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- TAB UMUM END -->
                                    
                                    <!-- TAB TANAH START -->
                                    <div class="tab-pane fade" id="kendaraan" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">EDIT BERKAS</h4></center><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>No. BPKB</label>
                                                    <input type="text" class="form-control" name="OVCOMV" value="<?=$berkas["OVCOMV"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Merk</label>
                                                    <input type="text" class="form-control" name="OVBRAND" value="<?=$berkas["OVBRAND"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Warna</label>
                                                    <input type="text" class="form-control" name="OVCOLOR" value="<?=$berkas["OVCOLOR"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Kapasitas Mesin</label>
                                                    <input type="text" class="form-control" name="OVCILCAP" value="<?=$berkas["OVCILCAP"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>No. Rangka</label>
                                                    <input type="text" class="form-control" name="OVMFN" value="<?=$berkas["OVMFN"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>No. Mesin</label>
                                                    <input type="text" class="form-control" name="OVMACHNID" value="<?=$berkas["OVMACHNID"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>No. Polisi</label>
                                                    <input type="text" class="form-control" name="OVVHRN" value="<?=$berkas["OVVHRN"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal Akhir Pajak</label>
                                                    <input type="date" class="form-control" name="OVVHTAXDT" id="OVVHTAXDT" value="<?php echo date('Y-m-d', strtotime($berkas["OVVHTAXDT"])) ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal Akhir STNK</label>
                                                    <input type="date" class="form-control" name="OVVHRNTAXDT" id="OVVHRNTAXDT" value="<?php echo date('Y-m-d', strtotime($berkas["OVVHRNTAXDT"])) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB TANAH END -->

                                    <!-- TAB SERTIFIKAT START -->
                                    <div class="tab-pane fade" id="tanah" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">EDIT BERKAS</h4></center><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>No. Serifikat</label>
                                                    <input type="text" class="form-control" name="OVCRTFID" value="<?=$berkas["OVCRTFID"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Tanggal Serifikat</label>
                                                    <input type="date" class="form-control" name="OVCRTFDT" id="OVCRTFDT" value="<?php echo date('Y-m-d', strtotime($berkas["OVCRTFDT"])) ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Status Kepemilikan</label>
                                                    <input type="text" class="form-control" name="OVLNDOWNST" value="<?=$berkas["OVLNDOWNST"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Panjang</label>
                                                    <input type="text" class="form-control" name="OVLENGTH" value="<?=$berkas["OVLENGTH"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Lebar</label>
                                                    <input type="text" class="form-control" name="OVWIDTH" value="<?=$berkas["OVWIDTH"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Luas</label>
                                                    <input type="text" class="form-control" name="OVWIDE" value="<?=$berkas["OVWIDE"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Alamat</label>
                                                    <input type="text" class="form-control" name="OVASADDR" value="<?=$berkas["OVASADDR"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Kabupaten/Kota</label>
                                                    <select class="form-control" name="OVCITY" id="OVCITY">
                                                        <?php foreach($KabKota as $gkk) : ?>
                                                            <?php if($gkk["DTDC"] == $berkas["OVCITY"]) {?>
                                                                <option value="<?=$berkas["OVCITY"];?>" selected><?=$berkas["kabkota"];?></option>
                                                            <?php } else {?>
                                                                <option value="<?=$gkk["DTDC"];?>"><?=$gkk["DTDESC1"];?></option>
                                                            <?php }?>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Kecamatan</label>
                                                    <select class="form-control" name="OVDIST" id="OVDIST">
                                                        <option value="<?=$berkas["OVDIST"];?>" selected><?=$berkas["kecamatan"];?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Desa</label>
                                                    <select class="form-control" name="OVSUBDIST" id="OVSUBDIST">
                                                        <option value="<?=$berkas["OVSUBDIST"];?>" selected><?=$berkas["desa"];?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB SERTIFIKAT END -->     
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="<?=base_url()?>BerkasBaru/Tambah_Baru/<?=$berkas["OVDOCNO"]?>/<?=$berkas["OVIDBUID"]?>"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                        <!-- <p id="result"></p>
                                        <p id="result2"></p> -->
                                    </center>
                                    <!-- <p id="result2"></p> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#OVLOCID").select2();
</script> 

<!-- DOCUMENT JENIS BERKAS READY -->
<script>
    $(document).ready(function(){
        var result = $("#OVMSTY").val();
        // document.getElementById("result2").innerHTML = result;

        if(result == "1") {
            $('#tab_kendaraan').removeClass('disabled');
            $('#tab_tanah').addClass('disabled');
        }
        else {
            $('#tab_tanah').removeClass('disabled');
            $('#tab_kendaraan').addClass('disabled');
        }
    });
</script>

<!-- GET KECAMATAN DAN DESA DOCUMENT READY -->
<script>
    $(document).ready(function(){

        var e = document.getElementById("OVCITY");
        var a = document.getElementById("OVDIST");
        // var dtdc = a.options[e.selectedIndex].value;
        var dtdcx = e.options[e.selectedIndex].value;
        var a2 = a.options[a.selectedIndex].value;
        //35.16
        document.getElementById("result").innerHTML = dtdcx;
        document.getElementById("result2").innerHTML = a2;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Kecamatan/' + dtdcx,
            method : "POST",
            data : {dtdcx:dtdcx},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    // var x = data[i].DTDC;
                    // var y = x.substring(1,5);
                    if(a2 == data[i].DTDC) {
                        html += '<option value='+data[i].DTDC+' selected>'+data[i].DTDESC1+'</option>';
                    }
                    else {
                        html += '<option value='+data[i].DTDC+'>'+data[i].DTDESC1+'</option>';
                    }
                }
                $('#OVDIST').html(html);
            }
        });
    });

    $(document).ready(function(){

        // variabel dari nilai combo box kecamatan
        var b = document.getElementById("OVDIST");
        var b2 = b.options[b.selectedIndex].value;
        // document.getElementById("result2").innerHTML = b2;

        var osd = document.getElementById("OVSUBDIST");
        var osdx = osd.options[osd.selectedIndex].value;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Desa/' + b2,
            method : "POST",
            data : {b2:b2},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    if(osdx == data[i].DTDC) {
                        html += '<option value='+data[i].DTDC+' selected>'+data[i].DTDESC1+'</option>';
                    }
                    else {
                        html += '<option value='+data[i].DTDC+'>'+data[i].DTDESC1+'</option>';
                    }
                }
                $('#OVSUBDIST').html(html);

            }
        });
    });
</script>

<!-- CHANGE KECAMATAN DAN DESA -->
<script>
    $("#OVCITY").change(function(){

        // variabel dari nilai combo box kabupaten/kota
        var dtdc = $("#OVCITY").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Kecamatan/' + dtdc,
            method : "POST",
            data : {dtdc:dtdc},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].DTDC+'>'+data[i].DTDESC1+'</option>';
                }
                $('#OVDIST').html(html);

            }
        });
    });

    $("#OVDIST").change(function(){

        // variabel dari nilai combo box kecamatan
        var dtdc1 = $("#OVDIST").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Desa/' + dtdc1,
            method : "POST",
            data : {dtdc1:dtdc1},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].DTDC+'>'+data[i].DTDESC1+'</option>';
                }
                $('#OVSUBDIST').html(html);

            }
        });
    });
</script>

<!-- GET KODE BARANG -->
<script>
    $(document).ready(function(){

        var x = $("#OVIDBUID").val();
        // var x2 = x.options[x.selectedIndex].value;
        // document.getElementById("result2").innerHTML = x;

        var y = document.getElementById("OVLOCID");
        var y2 = y.options[y.selectedIndex].value;
        // document.getElementById("result2").innerHTML = y2;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Lokasi/' + x,
            method : "POST",
            data : {x:x},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    if(y2 == data[i].LMLOCID) {
                        html += '<option value='+data[i].LMLOCID+' selected>'+data[i].LMDESA2+'</option>';
                    }
                    else {
                        html += '<option value='+data[i].LMLOCID+'>'+data[i].LMDESA2+'</option>';
                    }
                }
                $('#OVLOCID').html(html);

            }
        });
    });
</script>