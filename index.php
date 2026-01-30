<?php
include "includes/config.php";
include "includes/header.php";

$data = $pdo->query("SELECT * FROM images ORDER BY upload_date DESC")->fetchAll();
?>

<div class="row">
<?php foreach ($data as $img): ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="assets/images/<?= $img['filename'] ?>"
                 class="card-img-top"
                 style="height:250px; object-fit:cover;">
            <div class="card-body">
                <h5><?= $img['title'] ?></h5>
                <small><?= $img['upload_date'] ?></small>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?php include "includes/footer.php"; ?>
