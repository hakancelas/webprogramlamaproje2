<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM recipes WHERE user_id=$user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yemek Tarifleri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Yemek Tarifleri</h2>
    <a href="recipe_add.php" class="btn btn-primary">Yeni Tarif Ekle</a>
    <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Malzemeler</th>
                <th>Talimatlar</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['title']}</td>
                            <td>{$row['ingredients']}</td>
                            <td>{$row['instructions']}</td>
                            <td>
                                <a href='recipe_edit.php?id={$row['id']}' class='btn btn-warning'>Düzenle</a>
                                <a href='recipe_delete.php?id={$row['id']}' class='btn btn-danger'>Sil</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Hiç tarif bulunamadı.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>


