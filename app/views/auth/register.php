<div class="row ">
    <h3 class="mt-2"><?= $title ?></h2>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
                <?= unsetSessionMess('success'); ?>
            </div>
        <?php endif ?>
        <div class="col-6 m-4 p-3 border mx-auto">
            <form action="<?= BASE_URL ?>submit-register" method="post">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input id="username" type="text" class="form-control" name="username">
                    <?php if (isset($_SESSION['error_username'])) : ?>
                        <div class="text-danger">
                            <?= $_SESSION['error_username'] ?>
                        </div>
                    <?php endif ?>
                </div>
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
                    <label for="pass">Mật khẩu</label>
                    <input id="pass" type="password" class="form-control" name="password">
                    <?php if (isset($_SESSION['error_pass'])) : ?>
                        <div class="text-danger">
                            <?= $_SESSION['error_pass'] ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group my-2">
                    <label for="repass">Nhập lại mật khẩu</label>
                    <input id="repass" type="password" class="form-control" name="repassword">
                    <?php if (isset($_SESSION['error_repass'])) : ?>
                        <div class="text-danger">
                            <?= $_SESSION['error_repass'] ?>
                        </div>
                    <?php endif ?>
                </div>
                <button type="submit" name="submitFormRegister" class="btn btn-info btn-sm">Đăng kí</button>
            </form>
        </div>
</div>