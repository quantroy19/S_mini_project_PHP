<?php if (isset($_SESSION['success'])) : ?>
    <div class="alter alter-success">
        <?= $_SESSION['success']; ?>
    </div>
<?php endif ?>
<?php if (isset($_SESSION['notAuth'])) : ?>
    <div class="alert alert-warning" role="alert">
        <?= $_SESSION['notAuth']; ?>
    </div>
<?php endif ?>
<div class="row ">
    <h3 class="mt-2"><?= $title ?></h2>
        <div class="col-6 m-4 p-3 border mx-auto">
            <form action="<?= BASE_URL ?>submit-login" method="post">
                <?php if (isset($_SESSION['error_auth'])) : ?>
                    <div class="text-danger">
                        <?= $_SESSION['error_auth'] ?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email">
                    <?php if (isset($_SESSION['error_email'])) : ?>
                        <div class="text-danger">
                            <?= $_SESSION['error_email'] ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group my-2">
                    <label for="password">Mật khẩu</label>
                    <input id="password" type="password" class="form-control" name="password">
                    <?php if (isset($_SESSION['error_pass'])) : ?>
                        <div class="text-danger">
                            <?= $_SESSION['error_pass'] ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="mb-3 form-check">
                        <input <?php if (isset($_COOKIE['email'])) echo 'checked' ?> type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                        <label class="form-check-label" for="exampleCheck1">Ghi nhớ</label>
                    </div>
                    <div class="mb-3">
                        <span>Bạn chưa có tài khoản <a href="<?= BASE_URL ?>register">Đăng kí</a></span>
                    </div>
                </div>
                <button type="submit" name="submitFormLogin" class="btn btn-info btn-sm">Đăng nhập</button>
            </form>
        </div>
</div>