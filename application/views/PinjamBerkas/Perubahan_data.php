<div class="content-body" style="margin-bottom:-9.6%;">
    <div class="container-fluid" style="margin-top:-4%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
        
                    </div>
                    <br>
                    <div class="basic-form">
                        <form action="<?=base_url('PinjamBerkas/Perubahan_data/'.$perubahan['ITIDBUID'].'/'.$perubahan['ITDOCNO'].'/'.$perubahan['ITDOCSQ'])?>" method="post">
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
                                            <center><h4 class="card-title" style="margin-top:-10px;">PERUBAHAN DATA</h4></center><br>
                                            <input type="hidden" name="ITDOCTY" value="<?=$perubahan["ITDOCTY"];?>">
                                            <input type="hidden" name="ITIDBUID" id="ITIDBUID" value="<?=$perubahan["ITIDBUID"];?>">
                                            <input type="hidden" name="ITCOID" value="<?=$perubahan["ITCOID"];?>">
                                            <input type="hidden" name="ITDOCNO" value="<?=$perubahan["ITDOCNO"];?>">
                                            <input type="hidden" name="ITDOCSQ" value="<?=$perubahan["ITDOCSQ"];?>">
                                            <input type="hidden" name="ITDOCDT" value="<?=$perubahan["ITDOCDT"];?>">
                                            <input type="text" id="ITMSTY" name="ITMSTY" value="<?=$perubahan["ITMSTY"];?>">
                                            <input type="hidden" name="ITINUM" value="<?=$perubahan["ITINUM"];?>">
                                            <input type="text" name="ITPOST" value="<?=$perubahan["ITPOST"];?>">
                                            <input type="text" name="ITLNTY" value="<?=$perubahan["ITLNTY"];?>">
                                            <input type="text" name="ITICU" value="<?=$perubahan["ITICU"];?>">
                                            <input type="text" name="ITUOM1" value="<?=$perubahan["ITUOM1"];?>">
                                            <input type="text" name="ITGLCLS" value="<?=$perubahan["ITGLCLS"];?>">
                                            <input type="text" name="ITLOCID" value="<?=$perubahan["ITLOCID"];?>">
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">OPD</label>
                                                    <input type="text" class="form-control" name="ITIDBUID" value="<?=$perubahan["BNDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Nomor Dokumen</label>
                                                    <input type="text" class="form-control" name="ITDOCNO" value="<?=$perubahan["ITDOCNO"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Tanggal</label>
                                                    <input type="text" class="form-control" name="ITDOCDT" value="<?= date('d-m-Y', strtotime($perubahan["ITDOCDT"])); ?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                            </div> 
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Jenis Berkas</label>
                                                    <input type="text" class="form-control" name="ITMSTY" value="<?=$perubahan["DTDESC1"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kode Barang</label>
                                                    <input type="text" class="form-control" name="ITINUM" value="<?=$perubahan["AMDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Lokasi Barang</label>
                                                    <input type="text" class="form-control" name="ITLOCID" value="<?=$perubahan["LMDESA2"];?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236">Nama Barang</label>
                                                    <input type="text" class="form-control" name="ITDESB1" value="<?=$perubahan["ITDESB1"];?>">
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- TAB UMUM END -->
                                    
                                    <!-- TAB TANAH START -->
                                    <div class="tab-pane fade" id="kendaraan" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">PERUBAHAN DATA</h4></center><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236">No. BPKB</label>
                                                    <input type="text" class="form-control" name="ITCOMV" value="<?=$perubahan["ITCOMV"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Merk</label>
                                                    <input type="text" class="form-control" name="ITBRAND" value="<?=$perubahan["ITBRAND"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Warna</label>
                                                    <input type="text" class="form-control" name="ITCOLOR" value="<?=$perubahan["ITCOLOR"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kapasitas Mesin</label>
                                                    <input type="text" class="form-control" name="ITCILCAP" value="<?=$perubahan["ITCILCAP"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Rangka</label>
                                                    <input type="text" class="form-control" name="ITMFN" value="<?=$perubahan["ITMFN"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Mesin</label>
                                                    <input type="text" class="form-control" name="ITMACHNID" value="<?=$perubahan["ITMACHNID"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Polisi</label>
                                                    <input type="text" class="form-control" name="ITVHRN" value="<?=$perubahan["ITVHRN"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#313236">Tanggal Akhir Pajak</label>
                                                    <input type="date" class="form-control" name="ITVHTAXDT" id="ITVHTAXDT" value="<?php echo date('Y-m-d', strtotime($perubahan["ITVHTAXDT"])) ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#313236">Tanggal Akhir STNK</label>
                                                    <input type="date" class="form-control" name="ITVHRNTAXDT" id="ITVHRNTAXDT" value="<?php echo date('Y-m-d', strtotime($perubahan["ITVHRNTAXDT"])) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB TANAH END -->

                                    <!-- TAB SERTIFIKAT START -->
                                    <div class="tab-pane fade" id="tanah" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">PERUBAHAN DATA</h4></center><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Serifikat</label>
                                                    <input type="text" class="form-control" name="ITCRTFID" value="<?=$perubahan["ITCRTFID"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Tanggal Serifikat</label>
                                                    <input type="date" class="form-control" name="ITCRTFDT" id="ITCRTFDT" value="<?php echo date('Y-m-d', strtotime($perubahan["ITCRTFDT"])) ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Status Kepemilikan</label>
                                                    <input type="text" class="form-control" name="ITLNDOWNST" value="<?=$perubahan["ITLNDOWNST"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Panjang</label>
                                                    <input type="text" class="form-control" name="ITLENGTH" value="<?=$perubahan["ITLENGTH"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Lebar</label>
                                                    <input type="text" class="form-control" name="ITWIDTH" value="<?=$perubahan["ITWIDTH"];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Luas</label>
                                                    <input type="text" class="form-control" name="ITWIDE" value="<?=$perubahan["ITWIDE"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236">Alamat</label>
                                                    <input type="text" class="form-control" name="ITASADDR" value="<?=$perubahan["ITASADDR"];?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kabupaten/Kota</label>
                                                    <select class="form-control" name="ITCITY" id="ITCITY">
                                                        <?php foreach($KabKota as $gkk) : ?>
                                                            <?php if($gkk["DTDC"] == $perubahan["ITCITY"]) {?>
                                                                <option value="<?=$perubahan["ITCITY"];?>" selected><?=$perubahan["kabkota"];?></option>
                                                            <?php } else {?>
                                                                <option value="<?=$gkk["DTDC"];?>"><?=$gkk["DTDESC1"];?></option>
                                                            <?php }?>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kecamatan</label>
                                                    <select class="form-control" name="ITDIST" id="ITDIST">
                                                        <option value="<?=$perubahan["ITDIST"];?>" selected><?=$perubahan["kecamatan"];?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Desa</label>
                                                    <select class="form-control" name="ITSUBDIST" id="ITSUBDIST">
                                                        <option value="<?=$perubahan["ITSUBDIST"];?>" selected><?=$perubahan["desa"];?></option>
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
                                        <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                        <!-- <p id="result"></p>
                                        <p id="result2"></p> -->
                                    </center>
                                    <p id="result2"></p>
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
    $("#ITLOCID").select2();
</script> 

<!-- DOCUMENT JENIS perubahan READY -->
<script>
    $(document).ready(function(){
        var result = $("#ITMSTY").val();
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

        var e = document.getElementById("ITCITY");
        var a = document.getElementById("ITDIST");
        // var dtdc = a.options[e.selectedIndex].value;
        var dtdcx = e.options[e.selectedIndex].value;
        var a2 = a.options[a.selectedIndex].value;
        //35.16
        document.getElementById("result").innerHTML = dtdcx;
        document.getElementById("result2").innerHTML = a2;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>PinjamBerkas/get_Kecamatan/' + dtdcx,
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
                $('#ITDIST').html(html);
            }
        });
    });

    $(document).ready(function(){

        // variabel dari nilai combo box kecamatan
        var b = document.getElementById("ITDIST");
        var b2 = b.options[b.selectedIndex].value;
        // document.getElementById("result2").innerHTML = b2;

        var osd = document.getElementById("ITSUBDIST");
        var osdx = osd.options[osd.selectedIndex].value;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>PinjamBerkas/get_Desa/' + b2,
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
                $('#ITSUBDIST').html(html);

            }
        });
    });
</script>

<!-- CHANGE KECAMATAN DAN DESA -->
<script>
    $("#ITCITY").change(function(){

        // variabel dari nilai combo box kabupaten/kota
        var dtdc = $("#ITCITY").val();
        // document.getElementById("result2").innerHTML = dtdc;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>PinjamBerkas/get_Kecamatan/' + dtdc,
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
                $('#ITDIST').html(html);

            }
        });
    });

    $("#ITDIST").change(function(){

        // variabel dari nilai combo box kecamatan
        var dtdc1 = $("#ITDIST").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>PinjamBerkas/get_Desa/' + dtdc1,
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
                $('#ITSUBDIST').html(html);

            }
        });
    });
</script>

<!-- GET KODE BARANG -->
<script>
    $(document).ready(function(){

        var x = $("#ITIDBUID").val();
        // var x2 = x.options[x.selectedIndex].value;
        // document.getElementById("result2").innerHTML = x;

        var y = document.getElementById("ITLOCID");
        var y2 = y.options[y.selectedIndex].value;
        // document.getElementById("result2").innerHTML = y2;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>PinjamBerkas/get_Lokasi/' + x,
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
                $('#ITLOCID').html(html);

            }
        });
    });
</script>