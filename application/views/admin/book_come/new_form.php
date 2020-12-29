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
						<a href="<?php echo site_url('admin/books_come/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
                                <label>Buku*</label>
                                <div>
                                    <select name="id_book">
                                        <?php
                                        foreach ($books as $book) {
                                            echo "<option value=" . $book->id . ">" . $book->book_name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
								<label for="book_order_in">Jumlah Buku Masuk*</label>
								<input class="form-control <?php echo form_error('book_order_in') ? 'is-invalid':'' ?>"
								 type="number" name="book_order_in" min="0" placeholder="0" />
								<div class="invalid-feedback">
									<?php echo form_error('book_order_in') ?>
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
