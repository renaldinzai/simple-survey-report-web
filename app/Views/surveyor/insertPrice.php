<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">

            <h3 class="pb-3 text-center">Input Harga Komoditas <b><?= $commodities['name']; ?></b> per Kg
                <hr>
            </h3>

            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form action="/surveyor/processInsertPrice/<?= htmlentities($commodities['slug'], ENT_QUOTES, 'UTF-8'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="market_name">Pilih Pasar</label>
                            <select class="form-control <?= ($validation->hasError('market_name')) ? 'is-invalid' : '' ?>" name="market_name" id="market_name">
                                <?php foreach ($market as $m) : ?>
                                    <option value="<?= htmlentities($m['name'], ENT_QUOTES, 'UTF-8');;
                                                    old('market_name'); ?>"><?= htmlentities($m['name'], ENT_QUOTES, 'UTF-8'); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback"><?= $validation->getError('market_name'); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" value="<?= old('date'); ?>" class="form-control <?= ($validation->hasError('date')) ? 'is-invalid' : '' ?>" name="date" id="date">
                            <div class="invalid-feedback"><?= $validation->getError('date'); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Komoditas (Rp)</label>
                            <input type="number" value="<?= old('price'); ?>" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" name="price" id="price" placeholder="Cth. 100000">
                            <div class="invalid-feedback"><?= $validation->getError('price'); ?></div>
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