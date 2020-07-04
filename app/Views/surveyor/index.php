<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="container-fluid">
            <h1 class="mt-4">Selamat datang!</h1>
            <div class="alert alert-info" role="alert">
                Anda masuk sebagai <b><?= htmlentities($_SESSION['role'], ENT_QUOTES, 'UTF-8'); ?></b>
            </div>
            <p>Surveyor bertugas untuk melaporkan hasil survey harga komoditas di pasar tertentu pada hari tertentu.</p>
            <p>Pastikan untuk selalu mengecek halaman <code>Komoditas</code>. Validator akan menghubungi surveyor jika terdapat perubahan.</p>
        </div>
    </div>
</div>

</div>

<?php $this->endSection(); ?>