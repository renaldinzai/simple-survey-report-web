<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Web Survey Harga</div>
    <div class="list-group list-group-flush">
        <a href="/users" class="list-group-item list-group-item-action bg-light">Beranda</a>
        <?php if (htmlentities($_SESSION['role'], ENT_QUOTES, 'UTF-8') == 'admin') : ?>
            <a href="/admin/commodity" class="list-group-item list-group-item-action bg-light">Komoditas</a>
            <a href="/admin/market" class="list-group-item list-group-item-action bg-light">Pasar</a>
            <a href="/admin/marketCommodity" class="list-group-item list-group-item-action bg-light">Survey Harga</a>
            <a href="/users/logout" onclick="return confirm('Apakah Anda yakin?');" class="list-group-item list-group-item-action bg-light">Keluar</a>
        <?php endif; ?>
        <?php if (htmlentities($_SESSION['role'], ENT_QUOTES, 'UTF-8') == 'surveyor') : ?>
            <a href="/surveyor/commodity" class="list-group-item list-group-item-action bg-light">Komoditas</a>
            <a href="/users/logout" onclick="return confirm('Apakah Anda yakin?');" class="list-group-item list-group-item-action bg-light">Keluar</a>
        <?php endif; ?>
    </div>
</div>