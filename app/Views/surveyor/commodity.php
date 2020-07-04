<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">
            <table id="surveyor-commodity" class="table table-striped table-bordered  text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($commodities as $c) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><a href="/surveyor/commodity/<?= htmlentities($c['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities($c['name'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>