<div class="content-body" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>Konfirmasi Data</h4></center>
                    </div>
                    <br>
                    <div class="card-body">
                        <?php foreach($getData as $gt):?>
                            <form action="<?=base_url()?>PinjamBerkas/Print/<?=$gt["ITIDBUID"];?>/<?=$gt["ITDOCNO"];?>" method="post">
                                <!-- <input type="hidden" value="<?=$gt["ITIDBUID"];?>">
                                <input type="hidden" value="<?=$gt["ITDOCNO"];?>">
                                <input type="hidden" value="<?=$gt["BNCC01"];?>">
                                <input type="hidden" value="<?=$gt["BNCC02"];?>"> -->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Nomor Dokuman :</b></label>
                                        <p style="color:#313236"><?=$gt["ITDOCNO"];?></p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["ITDOCDT"])); ?></p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Ditujukan Kepada :</b></label>
                                        <p style="color:#313236"><?=$gt["BNDESB1"];?></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Pimpinan :</b></label>
                                        <select class="form-control" name="BNCC01" id="BNCC01" required>
                                        <?php
                                            if($gt["BNCC01"] == NULL || $gt["BNCC01"] == 0) {?>
                                                <option value="<?=$gt["BNCC01"];?>" selected>Belum Dipilih</option>
                                                <?php foreach($pimpinan as $p) : ?>
                                                    <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                <?php endforeach;?>
                                            <?php } else {?>
                                                <?php foreach($pimpinan as $p) : ?>
                                                    <?php if($p['ADIDANUM'] == $gt["BNCC01"]) {?>
                                                        <option value="<?=$gt["BNCC01"];?>" selected><?=$gt["pimpinan"];?></option>
                                                    <?php } else {?>
                                                        <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                    <?php }?>
                                                <?php endforeach;?>
                                            <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>Jabatan :</b></label>
                                        <select class="form-control" name="BNCC02" id="BNCC02" required>
                                        <?php
                                            if($gt["BNCC02"] == NULL || $gt["BNCC02"] == 0) {?>
                                                <option value="<?=$gt["BNCC02"];?>" selected>Belum Dipilih</option>
                                                <?php foreach($jabatan as $j) : ?>
                                                    <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                <?php endforeach;?>
                                            <?php } else {?>
                                                <?php foreach($jabatan as $j) : ?>
                                                    <?php if($j['DTIDDC'] == $gt["BNCC02"]) {?>
                                                        <option value="<?=$gt["BNCC02"];?>" selected><?=$gt["jabatan"];?></option>
                                                    <?php } else {?>
                                                        <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                    <?php }?>
                                                <?php endforeach;?>
                                            <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>NIP :</b></label>
                                        <input class="form-control" type="text" name="nip" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label style="color:#2b2a28;"><b>Detail Berkas :</b></label>
                                        <?php $no=1; foreach($get_berkas2 as $gb2):?>
                                            <p style="color:#313236">
                                                <?=$no++?>. <?=$gb2["ITDESB1"];?>
                                            </p>
                                            <p style="color:#313236">
                                                Keterangan : <?=$gb2["ITDESB2"];?>
                                            </p>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="submit" name="submit" class="btn btn-primary" style="float:right;"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</button>
                                        </center>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#BNCC01").select2();
</script>

<script type="text/javascript">
    $("#BNCC02").select2();
</script>