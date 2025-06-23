<?php
    require_once 'config.php';

    // Fetch student data if ID is provided or exists in the URL
    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $student = $stmt->fetch();
    }

    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("UPDATE students SET first_name = ?, last_name = ?, email = ?, age = ? WHERE id = ?");
        $stmt->execute([
            $_POST['first_name'], 
            $_POST['last_name'], 
            $_POST['email'], 
            $_POST['age'], 
            $_POST['id']
        ]);
        // echo "<div class='alert alert-success mt-3'>Student updated successfully!</div>";
        header('Location: read.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Student</title>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Student</h2>
    <form method="post">
         <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" value="<?= $student['first_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?= $student['last_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $student['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age" value="<?= $student['age'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        <a href="read.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
    
</body>
</html>