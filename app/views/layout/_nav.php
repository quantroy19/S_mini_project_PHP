<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #eeee;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="<?= BASE_URL ?>home">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="<?= BASE_URL ?>products">Quản lý sản phẩm</a>
                </li>
            </ul>
            <form class="d-flex">
                <?php if (isset($_SESSION['auth'])) : ?>
                    <a class="btn btn-secondary" href="<?= BASE_URL ?>logout">Đăng xuất</a>
                <?php elseif (!isset($_SESSION['auth'])) : ?>
                    <a class="btn btn-success" href="<?= BASE_URL ?>login">Đăng nhập</a>
                <?php endif ?>
            </form>
        </div>
    </div>
</nav>