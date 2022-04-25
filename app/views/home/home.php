<h2><?= $title ?> </h2>

<div class="row">
    <?php if (isset($_SESSION['success_auth'])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success_auth']; ?>
        </div>
    <?php endif ?>
    <?php foreach ($products as $pro) :    ?>
        <div class="col-3 mb-5">
            <div class="card" style="width: auto">
                <img src="<?= IMAGE_URL . $pro->image ?>" class="card-img-top" alt="img">
                <div class="card-body">
                    <h5 class="card-title"><?= $pro->name ?></h5>
                    <p class="card-text"><?= number_format($pro->price, 0, ',', ',')  ?>đ</p>
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>