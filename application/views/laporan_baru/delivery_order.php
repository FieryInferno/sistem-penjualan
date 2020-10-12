<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Sales Order</title>
	<style type="text/css">
		body{
			font-family: 'Calibri' !important;
			font-size: 16px;
			line-height: 13.5px;
		}
		@page {
			margin-top: 1.27cm;
			margin-bottom: 1.4cm;
			margin-left: 1.4cm;
			margin-right: 1.4cm;
		}
		table{
			width: 100%;
			border:0px solid transparent;
			border-collapse:collapse;
		}
		table tr td{
			vertical-align: top;
		}
		table tr td{
			border:0px solid transparent;
			font-family: 'Calibri';
		}

		.text-left{
			text-align: left !important;
		}
		.text-center{
			text-align: center !important;
		}
		.text-right{
			text-align: right !important;
		}
		.text-justify{
			text-align: justify !important;
		}
		@media print
		{
			table { page-break-after:auto }
			tr    { page-break-inside:avoid; page-break-after:auto }
			td    { page-break-inside:avoid; page-break-after:auto }
			tdead { display:table-header-group }
			tfoot { display:table-footer-group }
		}
		footer{
			break-after: page;
			/* for Firefox : */
			page-break-after: always;
			/* for WebKit : */
			-webkit-break-after: page;
		}
	</style>
</head>
<body>
	<div>
		<img src="<?= base_url('assets/kop_surat.png'); ?>" alt="Logo" width="100%">
	</div>
	<div>
	<br>
	<br>
		<div class="text-center">
			<strong>DELIVERY ORDER</strong>
			<hr width="160px" style="margin-top:0px;margin-bottom:5px;"/>
		</div>
		<div class="text-center">
			<?php 
			$no	= str_split($do['no_do']); 
			echo 'Nomor : ' . $no[0] . $no[1] . '/' . $no[2] . $no[3] . '/' . $no[4] . $no[5] . $no[6] . '/' . $no[7] . $no[8] . $no[9] . $no[10];
			?>
		</div>
		<br>
		<br>
		<br>
	</div>
	<div>
		<table>
			<tbody>
				<tr>
					<td colspan="3" class="text-right">
						<?php
                            function tgl_indo($tanggal){
                                $bulan = array (
                                    1 =>   'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                );
                                $pecahkan = explode('-', $tanggal);
                                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                            }
                        ?>
                        Bandung, <?= tgl_indo(date('Y-m-d')); ?>
					</td>
				</tr>
				<tr>
					<td style="width: 290px;">Pelanggan/Consigne Name : </td>
				</tr>
				<tr>
					<td style="width: 290px;line-height:20px;"><?= $do['nama_pelanggan']; ?></td>
				</tr>
				<tr>
					<td style="width: 290px;line-height:20px;"><?= $do['ship_to']; ?></td>
				</tr>
				<tr>
					<td style="width: 290px;line-height:20px;"><?= $do['no_telp']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<br>
	<br>
	<br>
	<table style="border:1px solid #000000;" border="1" align="center" width="600px" cellspacing="3">
		<tr style="border:1px solid #000000;">
			<th style="font-size:12px;" class="text-center">No.</th>
			<th style="font-size:12px;" class="text-center">Nama Barang</th>
			<th style="font-size:12px;" class="text-center">QTY</th>
			<th style="font-size:12px;" class="text-center">Harga</th>
			<th style="font-size:12px;" class="text-center">Jumlah</th>
		</tr>
		<tr style="border:1px solid #000000;">
			<?php $no	= 1; ?>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $no++; ?></td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $do['nama_barang']; ?></td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $do['qty']; ?></td>
			<?php
				function rupiah($angka){
					$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
					return $hasil_rupiah;		
				}
			?>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($do['harga_barang']); ?></td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($do['harga_barang'] * $do['qty']); ?></td>
		</tr>
	</table>
    <br>
	<br>
	<br>
    <table style="border:1px solid #000000;" border="1" align="center" width="600px" cellspacing="3">
		<tr style="border:1px solid #000000;">
			<th style="font-size:12px;" class="text-center">Nama Barang</th>
			<th style="font-size:12px;" class="text-center">1</th>
			<th style="font-size:12px;" class="text-center">2</th>
            <th style="font-size:12px;" class="text-center">3</th>
            <th style="font-size:12px;" class="text-center">4</th>
            <th style="font-size:12px;" class="text-center">5</th>
            <th style="font-size:12px;" class="text-center">6</th>
            <th style="font-size:12px;" class="text-center">7</th>
            <th style="font-size:12px;" class="text-center">8</th>
            <th style="font-size:12px;" class="text-center">9</th>
            <th style="font-size:12px;" class="text-center">10</th>
			<th style="font-size:12px;" class="text-center">Total</th>
		</tr>
		<?php
			if (count($rincian_barang) !== 0) {
				$a             		= [];
				$panjang_row    	= 9;
				$index_array    	= 0;
				$total_total    	= 0;
				$isi_tbody			= "";
				$a[$index_array]	= [];
				for ($i=0; $i < count($rincian_barang); $i++) { 
					if ($i > $panjang_row) {
						$panjang_row		+= 9;
						$index_array		+= 1;
						$a[$index_array]	= [];
					}
					array_push($a[$index_array], $rincian_barang[$i]);
				}
				// print_r($a);die();
				for ($i = 0; $i < (count($a) + 1); $i++) {
					$r  	= "";
					$total  = 0;
					if ($i !== count($a)) {
						for ($j = 0; $j < count($a[$i]); $j++) {
						$r		.= '<td style="font-size:12px;border:1px solid #000000;" class="text-center">' . $a[$i][$j]['panjang'] . '</td>';
						$total  += $a[$i][$j]['panjang'];
						}
						if (count($a[$i]) < 10) {
							for ($k = 0; $k < (10 - count($a[$i])); $k++) {
								$r  .= '<td style="font-size:12px;border:1px solid #000000;" class="text-center"></td>';
							}
						}
						$nama_barang = '<td style="font-size:12px;border:1px solid #000000;" class="text-center">' . $a[$i][0]['nama_barang'] . '</td>';
						if ($i > 0) {
							$nama_barang = '<td style="font-size:12px;border:1px solid #000000;" class="text-center"></td>';
						}
						$isi_tbody .= 	'<tr style="border:1px solid #000000;">' .
											$nama_barang .
											$r .
											'<td style="font-size:12px;border:1px solid #000000;" class="text-center">' . $total . '</td>' .
										'</tr>';
						$total_total += $total;
					} else {
						$kosong  = "";
						for ($l = 0; $l < 11; $l++) {
						$kosong .= '<td style="font-size:12px;border:1px solid #000000;" class="text-center"></td>';
						}
						$isi_tbody .= 	'<tr style="border:1px solid #000000;">' . 
											$kosong .
											'<td style="font-size:12px;border:1px solid #000000;" class="text-center">' . $total_total . '</td>' . 
										'</tr>';
						}
				}
				echo $isi_tbody;
			} else { ?>
				<tr style="border:1px solid #000000;">
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
					<td style="font-size:12px;border:1px solid #000000;" class="text-center"><br></td>
				</tr>
			<?php }
		?>
	</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table align="center" width="600px" cellspacing="3">
		<tr>
			<th style="font-size:12px;" class="text-center">Yang Menerima,</th>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center">Supir,</th>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center">Hormat Kami,</th>
		</tr>
		<tr>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
		</tr>
		<tr>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
		</tr>
		<tr>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
		</tr>
		<tr>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
		</tr>
		<tr>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
		</tr>
	</table>
	<footer></footer>
</body>
</html>