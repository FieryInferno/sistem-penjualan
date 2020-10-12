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
        <strong>
            <?php
                switch ($table) {
                    case 'sales_order':
                        $title  = 'SALES ORDER';
                        $nomor  = 'Nomor SO';
                        break;
                    case 'delivery_order':
                        $title  = 'DELIVERY ORDER';
                        $nomor  = 'Nomor DO';
                        break;
                    case 'invoice':
                        $title  = 'INVOICE';
                        $nomor  = 'Nomor Invoice';
                        break;
                    default:
                        # code...
                        break;
                }
                echo $judul;																	;
            ?>
        </strong>
	</div>
	<table style="border:1px solid #000000;" border="1" align="center" width="600px" cellspacing="3">
		<tr style="border:1px solid #000000;">
			<th style="font-size:12px;" class="text-center">No.</th>
			<th style="font-size:12px;" class="text-center"><?= $nomor; ?></th>
			<th style="font-size:12px;" class="text-center">Customer</th>
			<th style="font-size:12px;" class="text-center">Ship To</th>
			<th style="font-size:12px;" class="text-center">Kode Barang</th>
            <th style="font-size:12px;" class="text-center">Nama Barang</th>
            <th style="font-size:12px;" class="text-center">QTY (meter)</th>
            <th style="font-size:12px;" class="text-center">Harga</th>
            <th style="font-size:12px;" class="text-center">Total</th>
		</tr>
        <?php
            function rupiah($angka){
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;		
			}
			$total_semua	= 0;
			$no				= 1;
            foreach ($laporan as $key) { 
				$total			= $key->harga_barang * $key->qty; 
				$total_semua	+= $total;?>
                <tr style="border:1px solid #000000;">
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $no++; ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center">
                        <?php
                            switch ($table) {
                                case 'sales_order':
                                    echo $key->no_so;
                                    break;
                                case 'delivery_order':
                                    echo $key->no_do;
                                    break;
                                case 'invoice':
                                    echo $key->no_invoice;
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        ?>
                    </td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $key->nama_pelanggan; ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $key->ship_to; ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $key->kode_barang; ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $key->nama_barang; ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= $key->qty; ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($key->harga_barang); ?></td>
                    <td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($total); ?></td>
                </tr>
            <?php }
        ?>
		<tr style="border:1px solid #000000;">
			<td style="font-size:12px;border:1px solid #000000;" colspan="8" class="text-right">Total:</td>
			<td style="font-size:12px;border:1px solid #000000;" class="text-center"><?= rupiah($total_semua); ?></td>
		</tr>
	</table>
    <br><br><br><br><br>
	<table align="center" width="600px" cellspacing="3">
		<tr>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;" class="text-center"><br></td>
			<td style="font-size:12px;width:240px;" class="text-center">
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
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center"><br></th>
			<th style="font-size:12px;" class="text-center" width="300px"><br></th>
			<td style="font-size:12px;" class="text-center">Direktur</td>
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
			<?php
				$dataUser = $this->db->get_where('user', array('id' => $this->session->userdata('id_user')))->row_array();
				$nama_user = $dataUser['nama_user'];
			?>
			<td style="font-size:12px;" class="text-center"><strong><?= $nama_user; ?></strong></td>
		</tr>
	</table>
	<footer></footer>
</body>
</html>