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

                <?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/buyers') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/buyers/add') ?>" method="post" enctype="multipart/form-data" >
                        
                            <div class="form-group">
                                <label>Nama*</label>
                                <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Pembeli" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat*</label>
                                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="Alamat" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kota*</label>
                                <input class="form-control <?php echo form_error('kota') ? 'is-invalid' : '' ?>" type="text" name="kota" placeholder="Surabaya, Bandung, dll" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('kota') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Provinsi*</label>
                                <input class="form-control <?php echo form_error('provinsi') ? 'is-invalid' : '' ?>" type="text" name="provinsi" placeholder="Jakarta, Jawa Timur, dll" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('provinsi') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kode Pos*</label>
                                <input class="form-control <?php echo form_error('kode_pos') ? 'is-invalid' : '' ?>" type="number" name="kode_pos" placeholder="50745" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('kode_pos') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ekspedisi*</label>
                                <input class="form-control <?php echo form_error('ekspedisi') ? 'is-invalid' : '' ?>" type="text" name="ekspedisi" placeholder="JNE, Tiki, SiCepat" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('ekspedisi') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ongkos Kirim*</label>
                                <input class="form-control <?php echo form_error('ongkos_kirim') ? 'is-invalid' : '' ?>" type="number" name="ongkos_kirim" placeholder="15000" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('ongkos_kirim') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Berat Kiriman*</label>
                                <input class="form-control <?php echo form_error('berat_kiriman') ? 'is-invalid' : '' ?>" type="number" name="berat_kiriman" placeholder="15" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('berat_kiriman') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal*</label>
                                <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" type="date" name="tanggal" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tanggal') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>telepone*</label>
                                <input class="form-control <?php echo form_error('telepone') ? 'is-invalid' : '' ?>" type="number" name="telepone" placeholder="085640777888" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('telepone') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email*</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="contoh@gmail.com"></input>
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status*</label>
                                <input class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" type="text" name="status" placeholder="baru booking, gagal, dll"></input>
                                <div class="invalid-feedback">
                                    <?php echo form_error('status') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Buku*</label>
                                <div>
                                    <select name="id_buku">
                                        <?php
                                        foreach ($books as $book) {
                                            echo "<option value=" . $book->id . ">" . $book->nama . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Order*</label>
                                <input class="form-control <?php echo form_error('jumlah_order') ? 'is-invalid' : '' ?>" type="number" name="jumlah_order" placeholder="1,2,3. . ."></input>
                                <div class="invalid-feedback">
                                    <?php echo form_error('jumlah_order') ?>
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