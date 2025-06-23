<?php
    require_once 'config.php';

    if ( isset($_GET['id'])) {
        $stmt = $pdo->prepare('DELETE FROM students WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        header('Location: read.php');
        exit();
    }
?>