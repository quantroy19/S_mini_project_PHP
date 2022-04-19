<h3><?= $title ?></h3>
<form action="<?= BASE_URL ?>products/submit-add-form" class="col-6 border p-3" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input id="name" type="text" class="form-control" name="name">
        <?php if (isset($_SESSION['error_name'])) : ?>
            <div class="text-danger">
                <?= $_SESSION['error_name'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="image">Ảnh</label>
        <input id="image" type="file" class="form-control" name="image">
        <?php if (isset($_SESSION['error_img'])) : ?>
            <div class="text-danger">
                <?= $_SESSION['error_img'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input id="price" type="number" class="form-control" name="price">
        <?php if (isset($_SESSION['error_price'])) : ?>
            <div class="text-danger">
                <?= $_SESSION['error_price'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="desription">Mô tả</label>
        <textarea id="desription" type="text" class="form-control" name="description"></textarea>
        <?php if (isset($_SESSION['error_des'])) : ?>
            <div class="text-danger">
                <?= $_SESSION['error_des'] ?>
            </div>
        <?php endif ?>
    </div>

    <div class="mt-3">
        <button name="submitAddForm" class="btn btn-sm btn-info">Lưu</button>&nbsp;
        <a class="btn btn-sm btn-dark" href="<?= BASE_URL ?>products">Huỷ</a>
    </div>
</form>