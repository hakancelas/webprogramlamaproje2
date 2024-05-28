<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "UPDATE recipes SET title='$title', ingredients='$ingredients', instructions='$instructions' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: recipe_list.php');
        exit;
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM recipes WHERE id=$id";
    $result = $conn->query($sql);
    $recipe = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yemek Tarifini Düzenle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Yemek Tarifini Düzenle</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
        <div class="form-group">
            <label for="title">Başlık:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $recipe['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="ingredients">Malzemeler:</label>
            <textarea class="form-control" id="ingredients" name="ingredients" required><?php echo $recipe['ingredients']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="instructions">Talimatlar:</label>
            <textarea class="form-control" id="instructions" name="instructions" required><?php echo $recipe['instructions']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
</body>
</html>
