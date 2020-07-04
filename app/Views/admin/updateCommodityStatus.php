<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">

            <h3 class="pb-3">Ubah Status Harga Komoditas</h3>

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

            <div class="row mb-5">
                <div class="col"></div>
                <div class="col-8">
                    <form action="/admin/processUpdateCommStatus/<?= htmlentities(($mart_comm['id']), ENT_QUOTES, 'UTF-8'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <?php $status = $mart_comm['status']; ?>
                                <option value="verified" <?= $status == 'verified' ? 'selected' : '' ?>>Terverifikasi</option>
                                <option value="unverified" <?= $status == 'unverified' ? 'selected' : '' ?>>Tidak terverifikasi</option>
                                <option value="pending" <?= $status == 'pending' ? 'selected' : '' ?>>Ditunda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="commodity_name">Nama Komoditas</label>
                            <input disabled type="text" class="form-control" id="commodity_name" name="commodity_name" value="<?= htmlentities($mart_comm['commodity_name'], ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="market_name">Nama Pasar</label>
                            <input disabled type="text" class="form-control" id="market_name" name="market_name" value="<?= htmlentities($mart_comm['market_name'], ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input disabled type="text" class="form-control" id="price" name="price" value="<?= htmlentities($mart_comm['price'], ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="surveyor">Surveyor</label>
                            <input disabled type="text" class="form-control" id="surveyor" name="surveyor" value="<?= htmlentities($mart_comm['surveyor'], ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="survey_date">Tanggal</label>
                            <input disabled type="text" class="form-control" id="survey_date" name="survey_date" value="<?= htmlentities($mart_comm['survey_date'], ENT_QUOTES, 'UTF-8'); ?>">
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