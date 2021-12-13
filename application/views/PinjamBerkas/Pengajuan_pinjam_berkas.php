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
                            <form action="<?=base_url()?>PinjamBerkas/pengajuan_pinjam_berkas" method="post">
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
                                            <?php foreach($get_berkas_t1201 as $x) : ?>
                                                <option value="<?=$x["FAICU"]?>"><?=$x["FAICU"]?> - <?=$x["FADESB1"]?></option>
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
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan dan Keluar</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary" formaction="<?=base_url()?>PinjamBerkas/simpan_tambah"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan dan Tambah</button>
                                            &nbsp;&nbsp;
                                            <a href="<?=base_url()?>PinjamBerkas/index"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                        </center>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $("#BNCC01").select2();
</script>

<script type="text/javascript">
    $("#BNCC02").select2();
</script> -->

<!-- GET KODE BARANG -->
<!-- <script>
    $("#ILMSTY").change(function(){

        // variabel dari nilai combo box kabupaten/kota
        var msty = $("#ILMSTY").val();
        // document.getElementById("result2").innerHTML = msty;
        if (msty == 1) {
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: '<?= base_url() ?>PinjamBerkas/get_Kendaraan/',
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
                    $('#ILINUM').html(html);
                }
            });
        }
        else {
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: '<?= base_url() ?>PinjamBerkas/get_Sertifikat/',
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
                    $('#ILINUM').html(html);
                }
            });
        }
    });
</script> -->