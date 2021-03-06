<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">

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

            <a href="/admin/createCommodity" class="btn btn-success">Tambah Komoditas</a>

            <hr>

            <table id="surveyor-commodity" class="table table-striped table-bordered  text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Komoditas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($commodity as $c) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= htmlentities($c['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>

<?php $this->endSection(); ?>