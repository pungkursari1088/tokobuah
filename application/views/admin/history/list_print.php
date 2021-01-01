<!DOCTYPE html>
<html lang="en">

<head>
    <title>History Pembelian</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/animate/animate.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/select2/select2.min.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/table/util.css') ?>"> -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('css/table/table.css') ?>">
    <!--===============================================================================================-->

</head>

<body>
    <div class="address">
        <img src="<?= base_url(); ?>assets/images/tmc.png" width="100" height="40">
        <div>Tabel History TMC Management</div>
        <div>Jalan Pattimura no 12 Jakarta</div>
        <div>Memberi Pelayanan terbaik</div>
    </div>

    <!-- <hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Pembeli</th>
		<th>Alamat</th>
		<th>Ekspedisi</th>
		<th>Berat Paket</th>
		<th>Buku</th>	
		<th>Jmlh Buku</th>
	</tr>
	<?php
    $no = 1;
    foreach ($historys as $history) {
    ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $history->user_name; ?></td>
			<td><?php echo $history->address; ?></td>
			<td><?php echo $history->expedition; ?></td>
            <td><?php echo $history->weight_packet; ?></td>
            <td><?php echo $history->book_name; ?></td>
            <td><?php $history->book_order_out; ?></td>
		</tr>
		<?php
    }
        ?>
</table> -->

    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">No</th>
                                <th class="column2">Pembeli</th>
                                <th class="column3">Alamat</th>
                                <th class="column4">Ekspedisi</th>
                                <th class="column5">Berat Paket</th>
                                <th class="column6">Buku</th>
                                <th class="column7">Jmlh Buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($historys as $history) {
                            ?>
                                <tr>
                                    <td class="column1"><?php echo $no++; ?></td>
                                    <td class="column2"><?php echo $history->user_name; ?></td>
                                    <td class="column3"><?php echo $history->address; ?></td>
                                    <td class="column4"><?php echo $history->expedition; ?></td>
                                    <td class="column5"><?php echo $history->weight_packet; ?></td>
                                    <td class="column6"><?php echo $history->book_name; ?></td>
                                    <td class="column7"><?php echo $history->book_order_out; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('vendor/select2/select2.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('js/main.js') ?>"></script>

</body>

</html>