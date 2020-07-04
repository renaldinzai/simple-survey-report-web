<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">

            <h3 class="pb-4 text-center">Masukan pasar baru yang telah divalidasi sebelumnya</h3>

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
                    <form action="/admin/processCreateMarket" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="market_name">Nama Pasar</label>
                                <input value="<?= old('market_name'); ?>" type="text" class="form-control <?= ($validation->hasError('market_name')) ? 'is-invalid' : '' ?>" id="market_name" name="market_name">
                                <div class="invalid-feedback"><?= $validation->getError('market_name'); ?></div>
                            </div>
                            <div class="form-group">
                                <label for="market_address">Alamat Pasar</label>
                                <input value="<?= old('market_address'); ?>" type="text" class="form-control <?= ($validation->hasError('market_address')) ? 'is-invalid' : '' ?>" id="market_address" name="market_address">
                                <div class="invalid-feedback"><?= $validation->getError('market_address'); ?></div>
                            </div>
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