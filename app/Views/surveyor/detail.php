<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">

            <div class="card">
                <div class="card-header">
                    Komoditas
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?= htmlentities($commodity['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p class="card-text">Data terakhir diperbaharui pada <?= htmlentities($commodity['updated_at'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <a href="/surveyor/insertPrice/<?= htmlentities($commodity['slug'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-success">Input Harga</a>
                </div>
            </div>

            <hr>

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

            <table id="surveyor-commodity" class="table table-striped table-bordered  text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Komoditas</th>
                        <th>Pasar</th>
                        <th>Harga (Rp)</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($market_commodity as $m) : ?>
                        <tr>
                            <?php

                            $date = date("d/m/Y", strtotime(htmlentities($m['survey_date'], ENT_QUOTES, 'UTF-8')));
                            $price = number_format(htmlentities($m['price'], ENT_QUOTES, 'UTF-8'), 0, ".", ".");

                            ?>
                            <td><?= $i++; ?></td>
                            <td><?= htmlentities($m['commodity_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlentities($m['market_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= $price ?></td>
                            <td><?= $date ?></td>
                            <td><?= htmlentities($m['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>