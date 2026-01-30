<?php
include "includes/config.php";
include "includes/header.php";

$msg = "";

if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $desc  = $_POST['description'];
    $file  = $_FILES['image'];

    if ($file['size'] > 5000000) {
        $msg = "<div class='alert alert-danger'>File must be under 5MB</div>";
    } else {
        $name = time() . "_" . $file['name'];
        move_uploaded_file($file['tmp_name'], "assets/images/$name");

        $stmt = $pdo->prepare(
            "INSERT INTO images (title, description, filename)
             VALUES (?, ?, ?)"
        );
        $stmt->execute([$title, $desc, $name]);

        $msg = "<div class='alert alert-success'>Upload successful</div>";
    }
}
?>

<h3>Upload Image</h3>

<?= $msg ?>

<form method="POST" enctype="multipart/form-data">
    <input class="form-control mb-2" type="text" name="title" placeholder="Title" required>
    <textarea class="form-control mb-2" name="description" placeholder="Description"></textarea>
    <input class="form-control mb-2" type="file" name="image" required>
    <button class="btn btn-primary" name="upload">Upload</button>
</form>

<?php include "includes/footer.php"; ?>
