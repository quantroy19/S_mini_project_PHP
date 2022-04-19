<h3><?= $title ?></h3>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>
            <a href="<?= BASE_URL ?>products/add" class="btn btn-sm btn-success">Thêm mới</a>
        </th>
    </tr>
    <tbody>
        <?php foreach ($listProduct as $pro) : ?>
            <tr>
                <td><?= $pro->id ?></td>
                <td><?= $pro->name ?></td>
                <td><img src="<?= $pro->image ?>" alt="img"> </td>
                <td><?= $pro->price ?></td>
                <td>
                    <a class="btn btn-sm btn-warning">Sửa</a>
                    <a class="btn btn-sm btn-danger" onclick='return confirm("Bạn có chắc chắn muốn xoá <?= $pro->name ?>")'>Xoá</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>