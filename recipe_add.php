<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO recipes (title, ingredients, instructions, user_id) VALUES ('$title', '$ingredients', '$instructions', $user_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Tarif başarıyla eklendi!";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yemek Tarifi Ekle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Yemek Tarifi Ekle</h2>
    <form method="POST">
        <div class="form-group">
            <label for="title">Başlık:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="ingredients">Malzemeler:</label>
            <textarea class="form-control" id="ingredients" name="ingredients" required></textarea>
        </div>
        <div class="form-group">
            <label for="instructions">Talimatlar:</label>
            <textarea class="form-control" id="instructions" name="instructions" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ekle</button>
    </form>
</div>
</body>
</html>


