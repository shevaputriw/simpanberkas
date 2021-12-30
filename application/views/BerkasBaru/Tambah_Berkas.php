<?php if($this->session->userdata('SCUSG') == 'BPKAD') { ?>
    <div class="content-body" style="margin-bottom:-9.6%;">
        <div class="container-fluid" style="margin-top:-4%;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center>
                                <div class="stepwizard col-md-offset-3" style="margin-top:-10px;">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>
                                            <p>Step 1</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-file"></i></a>
                                            <p>Step 2</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-upload"></i></a>
                                            <p>Step 3</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-chevron-circle-right"></i></a>
                                            <p>Step 4</p>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <br>
                        <div class="basic-form">
                            <form action="<?=base_url()?>BerkasBaru/Halaman_Tambah" method="post">
                                <div class="card-body">
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
                                                <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                                <input type="hidden" class="form-control" name="OVCOID" value="<?=$kodekab->CNCOID;?>">
                                                <input type="hidden" class="form-control" name="OVLST" value="400">
                                                <input type="hidden" class="form-control" name="OVNST" value="440">
                                                <?php foreach($tampil as $t):?>
                                                    <?php 
                                                        $nnseq= $t["NNSEQ"];
                                                        $fzeropadded = sprintf("%05d", $nnseq);

                                                        $tahun = $t["NNYR"];
                                                        $pecah_tahun = substr($tahun, 2);

                                                        $bulan = $t["NNMO"];
                                                        $fzeropadded2 = sprintf("%02d", $bulan); 
                                                    ?>
                                                    <input type="hidden" name="OVDOCNO" value="<?=$pecah_tahun?><?=$fzeropadded2?><?=$fzeropadded?>">
                                                <?php endforeach;?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tanggal</label>
                                                        <input type="date" class="form-control" name="OVDOCDT" value="<?php echo date('Y-m-d') ?>" style="background-color:#f2f2f2;">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">OPD</label>
                                                        <select class="form-control" name="OVIDBUID" id="OVIDBUID" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih OPD -</option>
                                                            <?php foreach($opd as $opd) : ?>
                                                                <option value="<?=$opd["BNIDBUID"]?>"><?=$opd["BNDESB1"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Jenis Berkas</label>
                                                        <select class="form-control" name="OVMSTY" id="OVMSTY">
                                                            <option value="" selected="true" disabled="disabled">- Pilih Jenis Berkas -</option>
                                                            <?php foreach($jenis_berkas as $jb) : ?>
                                                                <option value="<?=$jb["DTDC"]?>"><?=$jb["DTDESC1"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kode Barang</label>
                                                        <select class="form-control" name="OVINUM" id="OVINUM" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Kode Barang -</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Lokasi Barang</label>
                                                        <select class="form-control" name="OVLOCID" id="OVLOCID" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Lokasi Barang -</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Nama Barang</label>
                                                        <input type="text" class="form-control" name="OVDESB1" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <!-- TAB UMUM END -->
                                        
                                        <!-- TAB TANAH START -->
                                        <div class="tab-pane fade" id="kendaraan" role="tabpanel">
                                            <div class="pt-4">
                                                <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">No. BPKB</label>
                                                        <input type="text" class="form-control" name="OVCOMV" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Merk</label>
                                                        <input type="text" class="form-control" name="OVBRAND" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Warna</label>
                                                        <input type="text" class="form-control" name="OVCOLOR" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kapasitas Mesin</label>
                                                        <input type="text" class="form-control" name="OVCILCAP" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Rangka</label>
                                                        <input type="text" class="form-control" name="OVMFN" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Mesin</label>
                                                        <input type="text" class="form-control" name="OVMACHNID" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Polisi</label>
                                                        <input type="text" class="form-control" name="OVVHRN" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tanggal Akhir Pajak</label>
                                                        <input type="date" class="form-control" name="OVVHTAXDT" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tanggal Akhir STNK</label>
                                                        <input type="date" class="form-control" name="OVVHRNTAXDT" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- TAB TANAH END -->

                                        <!-- TAB SERTIFIKAT START -->
                                        <div class="tab-pane fade" id="tanah" role="tabpanel">
                                            <div class="pt-4">
                                                <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Serifikat</label>
                                                        <input type="text" class="form-control" name="OVCRTFID" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Tanggal Serifikat</label>
                                                        <input type="date" class="form-control" name="OVCRTFDT" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Status Kepemilikan</label>
                                                        <input type="text" class="form-control" name="OVLNDOWNST" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Panjang</label>
                                                        <input type="text" class="form-control" name="OVLENGTH" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Lebar</label>
                                                        <input type="text" class="form-control" name="OVWIDTH" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Luas</label>
                                                        <input type="text" class="form-control" name="OVWIDE" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Alamat</label>
                                                        <input type="text" class="form-control" name="OVASADDR" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kabupaten/Kota</label>
                                                        <select class="form-control" name="OVCITY" id="OVCITY">
                                                            <option value="" selected="true" disabled="disabled">- Pilih Kabupaten/Kota -</option>
                                                            <?php foreach($getKabKota as $gkk) : ?>
                                                                <option value="<?=$gkk["DTDC"]?>"><?=$gkk["DTDESC1"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kecamatan</label>
                                                        <select class="form-control" name="OVDIST" id="OVDIST">
                                                        <option value="" selected="true" disabled="disabled">- Pilih Kecamatan -</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Desa</label>
                                                        <select class="form-control" name="OVSUBDIST" id="OVSUBDIST">
                                                        <option value="" selected="true" disabled="disabled">- Pilih Desa -</option>
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
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan dan Keluar</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary" formaction="<?=base_url()?>BerkasBaru/Simpan_Tambah"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan dan Tambah</button>
                                            &nbsp;&nbsp;
                                            <a href="<?=base_url()?>BerkasBaru/index"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                        </center>
                                    </div>
                                </div>
                                <!-- <p id="result2"></p> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $("#OVIDBUID").select2();
    </script>

    <script type="text/javascript">
        $("#OVINUM").select2();
    </script>

    <script type="text/javascript">
        $("#OVLOCID").select2();
    </script>

    <script>
        $('#OVMSTY').change(function(){
            var responseID = $("#OVMSTY").val();

            if(responseID == "1") {
                $('#tab_kendaraan').removeClass('disabled');
                $('#tab_tanah').addClass('disabled');
            }
            else {
                $('#tab_tanah').removeClass('disabled');
                $('#tab_kendaraan').addClass('disabled');
            }
        });
    </script>

    <!-- GET KECAMATAN DAN DESA -->
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

    <!-- GET LOKASI BARANG -->
    <script>
        $("#OVIDBUID").change(function(){
        // $(document).ready(function(){

            // variabel dari nilai combo box kabupaten/kota
            var idbuid = $("#OVIDBUID").val();
            // var idbuid = <?php echo $this->session->userdata('SCIDBUID')?>;

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
                    $('#OVLOCID').html(html);

                }
            });
        });
    </script>

    <!-- GET KODE BARANG -->
    <script>
        $("#OVMSTY").change(function(){

            // variabel dari nilai combo box kabupaten/kota
            var msty = $("#OVMSTY").val();
            // document.getElementById("result2").innerHTML = msty;
            if (msty == 1) {
                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url: '<?= base_url() ?>BerkasBaru/get_Kendaraan/',
                    method : "POST",
                    // data : ,
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].AMOBJ+'>'+data[i].AMDESB1+'</option>';
                        }
                        $('#OVINUM').html(html);
                    }
                });
            }
            else {
                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url: '<?= base_url() ?>BerkasBaru/get_Sertifikat/',
                    method : "POST",
                    // data : ,
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;

                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].AMOBJ+'>'+data[i].AMDESB1+'</option>';
                        }
                        $('#OVINUM').html(html);
                    }
                });
            }
        });
    </script>
<?php } else if($this->session->userdata('SCUSG') == 'OPD') {?>
    <div class="content-body" style="margin-bottom:-9.6%;">
        <div class="container-fluid" style="margin-top:-4%;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center>
                                <div class="stepwizard col-md-offset-3" style="margin-top:-10px;">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>
                                            <p>Step 1</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-file"></i></a>
                                            <p>Step 2</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-upload"></i></a>
                                            <p>Step 3</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-chevron-circle-right"></i></a>
                                            <p>Step 4</p>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <br>
                        <div class="basic-form">
                            <form action="<?=base_url()?>BerkasBaru/Halaman_Tambah" method="post">
                                <div class="card-body">
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
                                                <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU <?php echo $this->session->userdata('SCIDBUID')?></h4></center><br>
                                                <input type="hidden" class="form-control" name="OVCOID" value="<?=$kodekab->CNCOID;?>">
                                                <input type="hidden" class="form-control" name="OVLST" value="400">
                                                <input type="hidden" class="form-control" name="OVNST" value="440">
                                                <input type="hidden" class="form-control" name="OVIDBUID" value="<?php echo $this->session->userdata('SCIDBUID')?>">
                                                <?php foreach($tampil as $t):?>
                                                    <?php 
                                                        $nnseq= $t["NNSEQ"];
                                                        $fzeropadded = sprintf("%05d", $nnseq);

                                                        $tahun = $t["NNYR"];
                                                        $pecah_tahun = substr($tahun, 2);

                                                        $bulan = $t["NNMO"];
                                                        $fzeropadded2 = sprintf("%02d", $bulan); 
                                                    ?>
                                                    <input type="hidden" name="OVDOCNO" value="<?=$pecah_tahun?><?=$fzeropadded2?><?=$fzeropadded?>">
                                                <?php endforeach;?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tanggal</label>
                                                        <input type="date" class="form-control" name="OVDOCDT" value="<?php echo date('Y-m-d') ?>" style="background-color:#f2f2f2;">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">OPD</label>
                                                        <input type="text" class="form-control" value="<?php echo $this->session->userdata('SCBUID')?>" readonly style="background-color:#f2f2f2;">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Jenis Berkas</label>
                                                        <select class="form-control" name="OVMSTY" id="OVMSTY">
                                                            <option value="" selected="true" disabled="disabled">- Pilih Jenis Berkas -</option>
                                                            <?php foreach($jenis_berkas as $jb) : ?>
                                                                <option value="<?=$jb["DTDC"]?>"><?=$jb["DTDESC1"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kode Barang</label>
                                                        <select class="form-control" name="OVINUM" id="OVINUM" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Kode Barang -</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Lokasi Barang</label>
                                                        <select class="form-control" name="OVLOCID" id="OVLOCID" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Lokasi Barang -</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Nama Barang</label>
                                                        <input type="text" class="form-control" name="OVDESB1" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <!-- TAB UMUM END -->
                                        
                                        <!-- TAB TANAH START -->
                                        <div class="tab-pane fade" id="kendaraan" role="tabpanel">
                                            <div class="pt-4">
                                                <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">No. BPKB</label>
                                                        <input type="text" class="form-control" name="OVCOMV" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Merk</label>
                                                        <input type="text" class="form-control" name="OVBRAND" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Warna</label>
                                                        <input type="text" class="form-control" name="OVCOLOR" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kapasitas Mesin</label>
                                                        <input type="text" class="form-control" name="OVCILCAP" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Rangka</label>
                                                        <input type="text" class="form-control" name="OVMFN" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Mesin</label>
                                                        <input type="text" class="form-control" name="OVMACHNID" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Polisi</label>
                                                        <input type="text" class="form-control" name="OVVHRN" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tanggal Akhir Pajak</label>
                                                        <input type="date" class="form-control" name="OVVHTAXDT" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tanggal Akhir STNK</label>
                                                        <input type="date" class="form-control" name="OVVHRNTAXDT" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- TAB TANAH END -->

                                        <!-- TAB SERTIFIKAT START -->
                                        <div class="tab-pane fade" id="tanah" role="tabpanel">
                                            <div class="pt-4">
                                                <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">No. Serifikat</label>
                                                        <input type="text" class="form-control" name="OVCRTFID" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Tanggal Serifikat</label>
                                                        <input type="date" class="form-control" name="OVCRTFDT" autocomplete="off" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Status Kepemilikan</label>
                                                        <input type="text" class="form-control" name="OVLNDOWNST" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Panjang</label>
                                                        <input type="text" class="form-control" name="OVLENGTH" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Lebar</label>
                                                        <input type="text" class="form-control" name="OVWIDTH" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Luas</label>
                                                        <input type="text" class="form-control" name="OVWIDE" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Alamat</label>
                                                        <input type="text" class="form-control" name="OVASADDR" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kabupaten/Kota</label>
                                                        <select class="form-control" name="OVCITY" id="OVCITY">
                                                            <option value="" selected="true" disabled="disabled">- Pilih Kabupaten/Kota -</option>
                                                            <?php foreach($getKabKota as $gkk) : ?>
                                                                <option value="<?=$gkk["DTDC"]?>"><?=$gkk["DTDESC1"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Kecamatan</label>
                                                        <select class="form-control" name="OVDIST" id="OVDIST">
                                                        <option value="" selected="true" disabled="disabled">- Pilih Kecamatan -</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Desa</label>
                                                        <select class="form-control" name="OVSUBDIST" id="OVSUBDIST">
                                                        <option value="" selected="true" disabled="disabled">- Pilih Desa -</option>
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
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan dan Keluar</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary" formaction="<?=base_url()?>BerkasBaru/Simpan_Tambah"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan dan Tambah</button>
                                            &nbsp;&nbsp;
                                            <a href="<?=base_url()?>BerkasBaru/index"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                        </center>
                                    </div>
                                </div>
                                <!-- <p id="result2"></p> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $("#OVIDBUID").select2();
    </script>

    <script type="text/javascript">
        $("#OVINUM").select2();
    </script>

    <script type="text/javascript">
        $("#OVLOCID").select2();
    </script>

    <script>
        $('#OVMSTY').change(function(){
            var responseID = $("#OVMSTY").val();

            if(responseID == "1") {
                $('#tab_kendaraan').removeClass('disabled');
                $('#tab_tanah').addClass('disabled');
            }
            else {
                $('#tab_tanah').removeClass('disabled');
                $('#tab_kendaraan').addClass('disabled');
            }
        });
    </script>

    <!-- GET KECAMATAN DAN DESA -->
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

    <!-- GET LOKASI BARANG -->
    <script>
        // $("#OVIDBUID").change(function(){
        $(document).ready(function(){

            // variabel dari nilai combo box kabupaten/kota
            // var idbuid = $("#OVIDBUID").val();
            var idbuid = <?php echo $this->session->userdata('SCIDBUID')?>;

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
                    $('#OVLOCID').html(html);

                }
            });
        });
    </script>

    <!-- GET KODE BARANG -->
    <script>
        $("#OVMSTY").change(function(){

            // variabel dari nilai combo box kabupaten/kota
            var msty = $("#OVMSTY").val();
            // document.getElementById("result2").innerHTML = msty;
            if (msty == 1) {
                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url: '<?= base_url() ?>BerkasBaru/get_Kendaraan/',
                    method : "POST",
                    // data : ,
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].AMOBJ+'>'+data[i].AMDESB1+'</option>';
                        }
                        $('#OVINUM').html(html);
                    }
                });
            }
            else {
                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url: '<?= base_url() ?>BerkasBaru/get_Sertifikat/',
                    method : "POST",
                    // data : ,
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;

                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].AMOBJ+'>'+data[i].AMDESB1+'</option>';
                        }
                        $('#OVINUM').html(html);
                    }
                });
            }
        });
    </script>
<?php }?>