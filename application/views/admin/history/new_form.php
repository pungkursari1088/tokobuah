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
                                <label>Nama Pembeli*</label>
                                <div>
                                    <select name="id_buyer" id="id_buyer" onchange="GetSelectedBuyerValue(this)">
                                        <option>No Selected</option>
                                        <?php
                                        foreach ($buyers as $buyer) {
                                            echo "<option value=" . $buyer->id . ">" . $buyer->user_name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Alamat Pembeli*</label>
                                <div>
                                <select class="form-control" id="address" name="id_address" required>
                                    <!-- <option>No Selected</option> -->
                                </select>
                                </div>
					        </div>

							<div class="form-group">
								<label for="expedition">Ekspedisi*</label>
								<input class="form-control <?php echo form_error('expedition') ? 'is-invalid':'' ?>"
								 type="text" name="expedition"  placeholder="JNE, Si Cepat, Pos, dll" />
								<div class="invalid-feedback">
									<?php echo form_error('expedition') ?>
								</div>
                            </div>
                            
                            <div class="form-group">
								<label for="sending_price">Ongkos Kirim*</label>
								<input class="form-control <?php echo form_error('sending_price') ? 'is-invalid':'' ?>"
								 type="number" name="sending_price"  min="0" placeholder="0" />
								<div class="invalid-feedback">
									<?php echo form_error('sending_price') ?>
								</div>
                            </div>
                            
                            <div class="form-group">
								<label for="weight_packet">Berat Ongkir*</label>
								<input class="form-control <?php echo form_error('weight_packet') ? 'is-invalid':'' ?>"
								 type="number" name="weight_packet"  min="0" placeholder="0" />
								<div class="invalid-feedback">
									<?php echo form_error('weight_packet') ?>
								</div>
                            </div>
                            
                            <div class="form-group">
								<label for="date_order">Tanggal Order*</label>
								<input class="form-control <?php echo form_error('date_order') ? 'is-invalid':'' ?>"
								 type="date" name="date_order" />
								<div class="invalid-feedback">
									<?php echo form_error('date_order') ?>
								</div>
                            </div>
                            
                            <div class="form-group">
								<label for="date_send">Tanggal Kirim*</label>
								<input class="form-control <?php echo form_error('date_send') ? 'is-invalid':'' ?>"
								 type="date" name="date_send" />
								<div class="invalid-feedback">
									<?php echo form_error('date_send') ?>
								</div>
                            </div>
                            
                            <div class="form-group">
								<label for="payment_status">Status Pembayaran*</label>
								<input class="form-control <?php echo form_error('payment_status') ? 'is-invalid':'' ?>"
								 type="text" name="payment_status"  placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('payment_status') ?>
								</div>
                            </div>

                            <div class="form-group">
								<label for="buyer_status">Status Pembelian*</label>
								<input class="form-control <?php echo form_error('buyer_status') ? 'is-invalid':'' ?>"
								 type="text" name="buyer_status"  placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('buyer_status') ?>
								</div>
                            </div>

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
								<label for="book_order_out">Jumlah Buku*</label>
								<input class="form-control <?php echo form_error('book_order_out') ? 'is-invalid':'' ?>"
								 type="number" name="book_order_out"  min="0" placeholder="0" />
								<div class="invalid-feedback">
									<?php echo form_error('book_order_out') ?>
								</div>
                            </div>

                            <div class="form-group">
								<label for="id_group">Id Group*</label>
								<input class="form-control <?php echo form_error('id_group') ? 'is-invalid':'' ?>"
								 type="number" name="id_group"  min="0" placeholder="0" />
								<div class="invalid-feedback">
									<?php echo form_error('id_group') ?>
								</div>
                            </div>

                            <div class="form-group">
								<label for="order_group">Order Group*</label>
								<input class="form-control <?php echo form_error('order_group') ? 'is-invalid':'' ?>"
								 type="number" name="order_group"  min="0" placeholder="0" />
								<div class="invalid-feedback">
									<?php echo form_error('order_group') ?>
								</div>
                            </div>

                            <div class="form-group">
								<label for="description">Deskripsi</label>
								<input class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 type="text" name="description"  placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
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
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    function GetSelectedBuyerValue(id_buyer) {
        var selectedText = id_buyer.options[id_buyer.selectedIndex].innerHTML;
        var idBuyer = id_buyer.value;
		$('#category').html(idBuyer);
        $.ajax({
                    url : "<?php echo site_url('admin/buyer_addresses/get_buyer_address');?>",
                    method : "POST",
                    data : {id_buyer: idBuyer},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var buyer_address = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            buyer_address += '<option value='+data[i].id_buyer+'>'+data[i].address+'</option>';
                        }
                        
                        $('#address').html(buyer_address);
                        
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        }
                });
    }
</script>

</body>

</html>


