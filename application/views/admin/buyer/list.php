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
						<a href="<?php echo site_url('admin/buyers/add') ?>"><i class="fas fa-plus"></i> Tambah Pembeli</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Pembeli</th>
										<th>Telephone</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($buyers as $buyer): ?>
									<tr>
										<td>
											<?php echo $buyer->user_name ?>
										</td>
										<td>
											<?php echo $buyer->telephone ?>
										</td>
										<td>
											<?php echo $buyer->email ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/buyers/edit/'.$buyer->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/buyers/delete/'.$buyer->id) ?>')"
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
