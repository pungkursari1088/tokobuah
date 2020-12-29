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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/buyer_addresses/') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/buyer_addresses") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $buyer_address->id_buyer?>" />

							<div class="form-group">
									<label for="book_name">Nama Pembeli*</label>
										<div>
											<select name="id_buyer">
											<?php
												foreach ($buyers as $buyer) {
													if ($buyer->id == $buyer_address->ba_id) {
														$selected = 'selected';
													} else {
														$selected = '';
													}
													echo '<option value="' . $buyer->id . '" '.$selected.'>' . $buyer->user_name . '</option>';
												}
												?>
											</select>
										</div>
								</div>
							
							<div class="form-group">
								<label for="alias">Tandai Sebagai *</label>
								<input class="form-control <?php echo form_error('alias') ? 'is-invalid':'' ?>"
								 type="text" name="alias" value="<?php echo $buyer_address->alias ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alias') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="address">Alamat*</label>
								<input class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
								 type="text" name="address" value="<?php echo $buyer_address->address ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('address') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="city">Kota*</label>
								<input class="form-control <?php echo form_error('city') ? 'is-invalid':'' ?>"
								 type="text" name="city" value="<?php echo $buyer_address->city ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('city') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="province">Provinsi*</label>
								<input class="form-control <?php echo form_error('province') ? 'is-invalid':'' ?>"
								 type="text" name="province" value="<?php echo $buyer_address->province ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('province') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pos_code">Kode_Pos*</label>
								<input class="form-control <?php echo form_error('pos_code') ? 'is-invalid':'' ?>"
								 type="text" name="pos_code" value="<?php echo $buyer_address->pos_code ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pos_code') ?>
								</div>
							</div>
	
							<input class="btn btn-success" type="submit" name="btn" value="Update" />
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
