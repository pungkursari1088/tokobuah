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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/buyers/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="book_name">Nama Pembeli*</label>
								<input class="form-control <?php echo form_error('user_name') ? 'is-invalid':'' ?>"
								 type="text" name="user_name" placeholder="Nama Pembeli" />
								<div class="invalid-feedback">
									<?php echo form_error('user_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="book_price">Telephone*</label>
								<input class="form-control <?php echo form_error('telephone') ? 'is-invalid':'' ?>"
								 type="tel" name="telephone" placeholder="085123456789" minlength=11/>
								<div class="invalid-feedback">
									<?php echo form_error('telephone') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Telephone*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="email" name="email" placeholder="contoh@gmail.com"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* harus diisi
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
