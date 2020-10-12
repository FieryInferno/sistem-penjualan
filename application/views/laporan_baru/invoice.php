<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Invoice</title>
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
		<strong>INVOICE</strong>
		<hr width="160px" style="margin-top:0px;margin-bottom:5px;"/>
	</div>
	<div class="text-center">
		<?php 
			$no	= str_split($invoice['no_invoice']); 
			echo 'Nomor : ' . $no[0] . '/' . $no[1]  . $no[2] . '/' . $no[3] . $no[4] . $no[5] . '/' . $no[6] . $no[7] . $no[8] . $no[9];
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
					<td style="width: 290px;line-height:20px;"><?= $invoice['nama_pelanggan']; ?></td>
				</tr>
				<tr>
					<td style="width: 290px;line-height:20px;"><?= $invoice['ship_to']; ?></td>
				</tr>
				<tr>
					<td style="width: 290px;line-height:20px;"><?= $invoice['no_telp']; ?></td>
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
		<?php $no	= 1; ?>
		<tr style="border:1px solid #000000;">
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $no++; ?></td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $invoice['nama_barang']; ?></td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $invoice['qty']; ?></td>
			<?php
				function rupiah($angka){
					$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
					return $hasil_rupiah;		
				}
			?>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($invoice['harga_barang']); ?></td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($invoice['harga_barang'] * $invoice['qty']); ?></td>
		</tr>
	</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table align="center" width="600px" cellspacing="3">
		<tr>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center" width="300px"><br></th>
			<td style="font-size:12px;" class="text-center">Hormat Kami,</td>
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
			<td style="font-size:12px;" class="text-center"><strong>Kinanti F. Mustika</strong></td>
		</tr>
	</table>
    <div>
		<table>
			<tbody>
				<tr>
					<td style="width: 290px;">Pembayaran Cash/Transfer Ke : </td>
				</tr>
				<tr>
					<td style="width: 290px;">BCA 3371904199</td>
				</tr>
				<tr>
					<td style="width: 290px;">A/N Yoon Kihan</td>
				</tr>
			</tbody>
		</table>
	</div>
	<footer></footer>
</body>
</html>