<div class="content-body" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>MUTASI</h4></center>
                    </div>
                    <br>
                    <div class="card-body">
                        <?php foreach($data_mutasi as $dm):?>
                            <form action="<?=base_url()?>BerkasBaru/Mutasi/<?=$dm["ILIDBUID"];?>/<?=$dm["ILIDINUM"];?>/<?=$dm["ILINUM"];?>/<?=$dm["ILLOCID"];?>" method="post">
                                <input type="text" value="<?=$dm["ILIDBUID"];?>">
                                <input type="text" value="<?=$dm["ILIDINUM"];?>">
                                <input type="text" value="<?=$dm["ILINUM"];?>">
                                <input type="text" value="<?=$dm["ILLOCID"];?>">
                                <input type="text" value="<?=$dm["ILMANAGE"];?>">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#2b2a28;"><b>OVMANAGE :</b></label>
                                        <select class="form-control" name="ILMANAGE" id="ILMANAGE" required>
                                            <option value="" selected="true" disabled="disabled">- Pilih OPD -</option>
                                            <?php foreach($opd as $opd) : ?>
                                                <?php if($opd["BNIDBUID"] == $dm["ILMANAGE"]) {?>
                                                    <option value="<?=$dm["ILMANAGE"]?>" selected><?=$opd["BNDESB1"]?></option>
                                                <?php } else {?>
                                                    <option value="<?=$opd["BNIDBUID"];?>"><?=$opd["BNDESB1"];?></option>
                                                <?php }?>
                                            <?php endforeach;?>
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
                            <?php endforeach;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#ILMANAGE").select2();
</script>