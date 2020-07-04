<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container mt-4">

            <h3 class="pb-3 text-center">Daftar Survey Harga
                <hr>
            </h3>

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
                        <th>Surveyor</th>
                        <th>Status</th>
                        <th>Aksi</th>
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
                            <td><?= htmlentities($m['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlentities($m['market_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= $price ?></td>
                            <td><?= $date ?></td>
                            <td><?= htmlentities($m['surveyor'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlentities($m['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="/admin/updateCommodityStatus/<?= htmlentities($m['id'], ENT_QUOTES, 'UTF-8'); ?>" type="submit" class="btn btn-warning">Ubah</a>
                                <form action="/admin/deleteMarketCommodity/<?= htmlentities($m['id'], ENT_QUOTES, 'UTF-8'); ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>

<?php $this->endSection(); ?>