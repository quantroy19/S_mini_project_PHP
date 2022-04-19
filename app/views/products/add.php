<h3><?= $title ?></h3>
<form action="<?= BASE_URL ?>products/submit-form-add" class="col-6 border p-3" method="post">
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input id="name" type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="image">Ảnh</label>
        <input id="image" type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input id="price" type="number" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="desription">Mô tả</label>
        <textarea id="desription" type="text" class="form-control" name="description"></textarea>
    </div>

    <div class="mt-3">
        <button class="btn btn-sm btn-info">Lưu</button>&nbsp;
        <a class="btn btn-sm btn-dark" href="<?= BASE_URL ?>products">Huỷ</a>
    </div>
</form>