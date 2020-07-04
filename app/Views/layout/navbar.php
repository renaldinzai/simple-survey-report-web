<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">Menu</button>

    <div class="ml-auto mt-2 mt-lg-0">
        <?= htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
</nav>