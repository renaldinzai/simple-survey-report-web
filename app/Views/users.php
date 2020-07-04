<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm bg-overlay d-flex flex-column justify-content-center">
            <div class="h1 text-white ml-5">Halaman Login Staf</div>
            <p class="text-white ml-5">Silakan masuk menggunakan username dan<br> password yang telah didapatkan</p>
        </div>
        <div class="col align-items-end d-block d-sm-none">
            <div class="arrow">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="col-sm d-flex flex-column justify-content-center">
            <div class="card align-self-center mx-5 shadow bg-white rounded my-5">
                <div class="card-body" style="width: 25rem;">
                    <?php if (isset($_SESSION['message'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['message']; ?>
                        </div>
                    <?php endif; ?>
                    <form action="/users/login" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" name="username" id="username" value="<?= old('username'); ?>">
                            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password" id="password">
                            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Masuk" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>