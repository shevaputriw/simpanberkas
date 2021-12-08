<!DOCTYPE html>
<html>
	<head>
	<?php $no=1; foreach($getData as $gt):?>
		<?php
		$tanggal = $gt["ITDOCDT"];
		$split = explode("-", $tanggal);
		$y = $split[0];
		$m = $split[1];
		$d = $split[2];
		$date =  substr($d, 0, 2);
		
		switch ($m)
		{
			case "01":
			$bln="Januari";
			break;
			case "02":
			$bln="Februari";
			break;
			case "03":
			$bln="Maret";
			break;
			case "04":
			$bln="April";
			break;
			case "05":
			$bln="Mei";
			break;
			case "06":
			$bln="Juni";
			break;
			case "07":
			$bln="Juli";
			break;
			case "08":
			$bln="Agustus";
			break;
			case "09":
			$bln="September";
			break;
			case "10":
			$bln="Oktober";
			break;
			case "11":
			$bln="November";
			break;
			case "12":
			$bln="Desember";
			break;
		}
		?>
		<title><?=$title;?></title>
		<style type="text/css">
			.tabel_berkas {
				color: #232323;
				border-collapse: collapse;
			}
			.th1 {
				border: 1px solid #000000;
			}
			.td1 {
				border: 1px solid #000000;
				/* padding: 8px 10px; */
			}
		</style>
	</head>
<body>
	<div class="container" style="padding-left: 30px;padding-right: 30px;padding-top: 30px;padding-bottom: 30px;">
	<center>
		<table width="100%" style="color-border:black;">
			<tr>
				<td width="60">
					<img src="<?=base_url()?>/assets/focus/images/logo_kab.png" width="80" height="100">
				</td>
				<td>
				<center>
					<font size="4"><b>PEMERINTAH KABUPATEN MOJOKERTO</b></font><br>
					<font size="4" style=" ;"><b><?=$gt["BNDESB1"];?></b></font><br>
					<font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font><br>
					<font size="3"><b>MOJOKERTO</b></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		</table>
	</center>
	<center>
		<table style="float:right;">
			<tr>
				<td class="text2" id="ITDOCDT" style=" ;">Mojokerto, <?=$date; ?> <?=$bln; ?> <?=$y; ?></td>
			</tr>
		</table>
		<br><br><br><br>
		<table style="float:right;">
			<tr>
				<td class="text2" style=" ;float:right;">Kepada</td>
			</tr>
			<tr>
				<td class="text2" style=" ;"><b>Yth. Bapak <?=$jabatan->DTDESC1;?> <br> <?=$gt["BNDESB1"];?><b></td>
			</tr>
			<tr>
				<td class="text2" style=" ;">Kabupaten Mojokerto</td>
			</tr>
			<tr>
				<td class="text2" style=" ;"><b>di&nbsp;&nbsp;&nbsp;&nbsp; -<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mojokerto</b></td>
			</tr>
		</table>

		<br>
		<table>
			<tr class="text2">
				<td>Nomor </td>
				<td style=" ;">: <?=$gt["ITDOCNO"];?></td>
			</tr>
			<tr>
				<td>Sifat</td>
				<td>: Segera</td>
			</tr>
			<tr>
				<td>Lampiran</td>
				<td>: -</td>
			</tr>
			<tr>
				<td>Hal</td>
				<td width="90">: Berita Acara Pengajuan <br>&nbsp;&nbsp;Peminjaman</td>
			</tr>
		</table>
		<br><br><br><br>
		<table   >
			<tr>
		       <td style="text-align: justify;">
			       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Melalui surat ini, kami bermaksud untuk meminjam <?=$gt["total_berkas"];?> berkas yang akan digunakan untuk Perpanjangan XXX oleh <?=$gt["BNDESB1"];?>. Adapun berkas yang akan dipinjam adalah sebagai berikut:
	</td>
		    </tr>
			<tr>
				<td></td>
			</tr>
		</table>
		<br>
		<!-- <table>
			<tr class="text2">
				<td>Hari Tanggal</td>
				<td width="541">: <b>Selasa/16 mei 2019</b></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td width="525">: 08:30</td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td width="525">: Ruang lap komputer</td>
			</tr>
		</table> -->
        <table class="tabel_berkas" width="100%" style="text-align:center; ;">
			<tr>
				<th class="th1">No</th>
				<th class="th1">Jenis Berkas</th>
				<th class="th1">Nomor BPKB/Nomor Sertifikat</th>
				<th class="th1">Nama Barang</th>
				
			</tr>
			<?php $no=1; foreach($get_data_peminjaman as $gb):?>
				<tr>
					<td class="td1"><?=$no++;?></td>
					<td class="td1"><?=$gb["DTDESC1"];?></td>
					<?php if($gb["ITMSTY"] == "1"){?>
						<td class="td1"><?=$gb["ITCOMV"];?></td>
					<?php } else {?>
						<td class="td1"><?=$gb["ITCRTFID"];?></td>
					<?php }?>
					<td class="td1"><?=$gb["ITDESB1"];?></td>                      
				</tr>
			<?php endforeach;?>
		</table>
		<br>
		<table >
			<tr>
		       <td style="text-align: justify;">
			   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian untuk menjadikan periksa dan mohon persetujuannya. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.
		       </td>
		    </tr>
		</table>
		<br><br>
		<table  >
			<tr>
				<td width="300"><br><br><br><br></td>
				<td class="text" align="center">
					<p><b><?=$jabatan->DTDESC1;?> <br> <?=$gt["BNDESB1"];?></b></p>
					<br><br><br>
					<p><b><u><?=$pimpinan->ADNM?></u></b><br>NIP. <?=$nip?></p>
				</td>
				<br><br><br><br>
			</tr>
		</table>
	</center>
        <?php
	endforeach;
	?>
	</div>
</body>
</html>