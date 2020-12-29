<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/book_comes/add') ?>"><i class="fas fa-plus"></i> Tambah Buku Masuk</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Buku</th>
										<th>Jumlah Buku Masuk</th>
										<th>Tanggal Masuk</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($book_comes as $book_come): ?>
									<tr>
										<td>
											<?php echo $book_come->book_name ?>
										</td>
										<td>
											<?php echo $book_come->book_order_in ?>
										</td>
										<td>
											<?php echo $book_come->date_come ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/book_comes/edit/'.$book_come->book_come_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/book_comes/delete/'.$book_come->book_come_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
