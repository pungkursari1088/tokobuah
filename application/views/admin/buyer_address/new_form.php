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
						<a href="<?php echo site_url('admin/buyer_addresses/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
                                <label>Nama Pembeli*</label>
                                <div>
                                    <select name="id_buyer">
                                        <?php
                                        foreach ($buyers as $buyer) {
                                            echo "<option value=" . $buyer->id . ">" . $buyer->user_name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
							</div>
							
							<div class="form-group">
								<label for="alias">Tandai Sebagai *</label>
								<input class="form-control <?php echo form_error('alias') ? 'is-invalid':'' ?>"
								 type="text" name="alias" placeholder="Rumah, Kantor , Kos2an , dll" />
								<div class="invalid-feedback">
									<?php echo form_error('alias') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="address">Alamat*</label>
								<input class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
								 type="text" name="address" placeholder="Tempat Tinggal"/>
								<div class="invalid-feedback">
									<?php echo form_error('address') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="city">Kota*</label>
								<input class="form-control <?php echo form_error('city') ? 'is-invalid':'' ?>"
								 type="text" name="city" placeholder="Kota"/>
								<div class="invalid-feedback">
									<?php echo form_error('city') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="province">Provinsi*</label>
								<input class="form-control <?php echo form_error('province') ? 'is-invalid':'' ?>"
								 type="text" name="province" placeholder="Provinsi"/>
								<div class="invalid-feedback">
									<?php echo form_error('province') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pos_code">Kode_Pos*</label>
								<input class="form-control <?php echo form_error('pos_code') ? 'is-invalid':'' ?>"
								 type="text" name="pos_code" placeholder="Kode Pos"/>
								<div class="invalid-feedback">
									<?php echo form_error('pos_code') ?>
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
