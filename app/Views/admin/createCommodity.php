<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">
            <h3 class="pb-3 text-center">Tambah Komoditas Baru</h3>

            <?php if (isset($_SESSION['successMessage'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['successMessage']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['failMessage'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['failMessage']; ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form action="/admin/processCreateCommodity" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="commodity_name">Nama Komoditas</label>
                            <input type="text" class="form-control <?= ($validation->hasError('commodity_name')) ? 'is-invalid' : '' ?>" id="commodity_name" name="commodity_name">
                            <div class="invalid-feedback"><?= $validation->getError('commodity_name'); ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>

        </div>
    </div>
</div>

</div>

<?php $this->endSection(); ?>