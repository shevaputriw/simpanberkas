<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PINJAM BERKAS</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Jenis Berkas</th>
                                        <th>Nama Barang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($berkas as $b):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$b["BNDESB1"];?></td>
                                            <td><?=$b["DTDESC1"];?></td>
                                            <td><?=$b["ITDESB1"];?></td>
                                            <td><span class="badge badge-warning"><?=$b["d"];?></span></td>
                                            <td>
                                                <a href="<?=base_url()?>PinjamBerkas/Pinjam/<?=$b["ITIDBUID"];?>/<?=$b["ITDOCNO"];?>/<?=$b["ITDOCTY"];?>/<?=$b["ITDOCSQ"];?>" style="color:#000000;"><span class="badge badge-primary"><i class="fa fa-check" aria-hidden="true"></i></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- source: https://guwii.com/bytes/count-date-time-javascript/ -->
<!-- <div class="countup" id="countup1">
  <span class="timeel days">00</span>
  <span class="timeel timeRefDays">days</span>
  <span class="timeel hours">00</span>
  <span class="timeel timeRefHours">hours</span>
  <span class="timeel minutes">00</span>
  <span class="timeel timeRefMinutes">minutes</span>
  <span class="timeel seconds">00</span>
  <span class="timeel timeRefSeconds">seconds</span>
</div> -->

<!-- <script>
    window.onload = function() {
        // Month Day, Year Hour:Minute:Second, id-of-element-container
        var currentdate = new Date(); 
        countUpFromTime(currentdate, 'countup1'); // ****** Change this line!
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
</script> -->