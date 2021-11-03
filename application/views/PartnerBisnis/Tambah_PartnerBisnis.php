<div class="content-body" style="margin-bottom:-8%;">
    <div class="container-fluid" style="margin-top:-4%;">
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center><h4>TAMBAH PARTNER BISNIS</h4></center>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?=base_url()?>PartnerBisnis/Tambah_PartnerBisnis" method="post">
                                    <?php foreach($tampil as $t):?>
                                        <?php 
                                            $nnseq= $t["NNSEQ"];
                                            $fzeropadded = sprintf("%07d", $nnseq);

                                            $tahun = $t["NNYR"];
                                            $pecah_tahun = substr($tahun, 2);
                                        ?>
                                        <input type="text" name="ADIDANUM" value="<?=$pecah_tahun?><?=$fzeropadded?>">
                                    <?php endforeach;?>  
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>No. Identitas (NIK/Passport/KTP)</label>
                                            <input type="text" class="form-control" name="ADANUM" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="ADNM" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tipe</label>
                                            <select class="form-control" name="ADST" required>
                                                <option value="" selected="true" disabled="disabled">- Pilih Tipe Partner Bisnis -</option>
                                                <?php foreach($tipe as $t) : ?>
                                                    <option value="<?=$t["DTDC"];?>"><?=$t["DTDESC1"];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Parent ID</label>
                                            <input type="text" class="form-control" name="ADPAN" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="ADADDR" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="ADEMAIL" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>No. Telp</label>
                                            <input type="text" class="form-control" name="ADPHNO1" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>N.P.W.P.</label>
                                            <input type="text" class="form-control" name="ADTAXID" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Hutang</label>
                                            <select class="form-control" name="ADAP">
                                                <option value="" selected="true" disabled="disabled">- Pilih -</option>
                                                <?php foreach($hutang as $h) : ?>
                                                    <option value="<?=$h?>"><?=$h?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Piutang</label>
                                            <select class="form-control" name="ADAR">
                                                <option value="" selected="true" disabled="disabled">- Pilih -</option>
                                                <?php foreach($piutang as $p) : ?>
                                                    <option value="<?=$p?>"><?=$p?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Karyawan</label>
                                            <select class="form-control" name="ADEMPL">
                                                <option value="" selected="true" disabled="disabled">- Pilih -</option>
                                                <?php foreach($karyawan as $k) : ?>
                                                    <option value="<?=$k?>"><?=$k?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Pimpinan</label>
                                            <select class="form-control" name="ADCC01">
                                                <option value="" selected="true" disabled="disabled">- Pilih Pimpinan -</option>
                                                <?php foreach($pimpinan as $pimpinan) : ?>
                                                    <option value="<?=$pimpinan['ADIDANUM'];?>"><?=$pimpinan['ADNM'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Jabatan</label>
                                            <select class="form-control" name="ADCC02" >
                                                <option value="" selected="true" disabled="disabled">- Pilih Jabatan -</option>
                                                <?php foreach($jabatan as $j) : ?>
                                                    <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Pengurus Barang</label>
                                            <select class="form-control" name="ADCC03">
                                                <option value="" selected="true" disabled="disabled">- Pilih Pengurus Barang -</option>
                                                <?php foreach($pengurus_barang as $pb) : ?>
                                                    <option value="<?=$pb['ADIDANUM'];?>"><?=$pb['ADNM'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <center>
                                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button>
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
    </div>
</div>