<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM recipes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: recipe_list.php');
    exit;
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}
?>
