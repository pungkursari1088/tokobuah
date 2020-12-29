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

						<a href="<?php echo site_url('admin/book_comes/') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
						<div class="card-body">

							<form action="<?php base_url("admin/book_comes") ?>" method="post"
								enctype="multipart/form-data" >

								<input type="hidden" name="id" value="<?php echo $book_come->id?>" />

								<div class="form-group">
									<label for="book_name">Nama Buku*</label>
										<div>
											<select name="id_book">
											<?php
												foreach ($books as $book) {
													if ($book->id == $book_come->id_book) {
														$selected = 'selected';
													} else {
														$selected = '';
													}
													echo '<option value="' . $book->id . '" '.$selected.'>' . $book->book_name . '</option>';
												}
												?>
											</select>
										</div>
								</div>

								<div class="form-group">
									<label for="book_order_in">Jumlah Buku Masuk</label>
									<input class="form-control <?php echo form_error('book_order_in') ? 'is-invalid':'' ?>"
									type="number" name="book_order_in" min="0" placeholder="0" value="<?php echo $book_come->book_order_in ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('book_order_in') ?>
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
