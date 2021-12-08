<div class="content-body" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>DETAIL PEMINJAMAN BERKAS</h4></center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label style="color:#2b2a28;"><b>Dari :</b></label>
                                <p style="color:#313236"><?=$get_berkas["BNDESB1"];?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="color:#2b2a28;"><b>Nomor Dokumen :</b></label>
                                <p style="color:#313236"><?=$get_berkas["ITDOCNO"];?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                <p style="color:#313236"><?= date('d-m-Y', strtotime($get_berkas["ITDOCDT"])); ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label style="color:#2b2a28;"><b>Detail Berkas :</b></label>
                                <?php $no=1; foreach($get_berkas2 as $gb2):?>
                                    <p style="color:#313236">
                                        <?=$no++?>. <?=$gb2["ITDESB1"];?>
                                    </p>
                                    <label style="color:#2b2a28;"><b>Keterangan :</b></label>
                                    <p style="color:#313236"><?=$gb2["ITDESB2"];?></p>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <a href="<?=base_url()?>PinjamBerkas/index"><button type="button" class="btn btn-secondary" style="float:right;"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>