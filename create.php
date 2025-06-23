<?php require_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Student</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age">
            </div>
             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php 
            if (isset($_POST['submit'])) {
               $stmt = $pdo->prepare("INSERT INTO students (first_name, last_name, email, age) VALUES (?, ?, ?, ?)");
               $stmt->execute([
                    $_POST['first_name'], 
                    $_POST['last_name'], 
                    $_POST['email'], 
                    $_POST['age']  // Handle age as nullable 
               ]);
               echo "<div class='alert alert-success mt-3'>Student added successfully!</div>";
            }

        // if (isset($_POST['submit'])) {
        //     $first_name = $_POST['first_name'];
        //     $last_name = $_POST['last_name'];
        //     $email = $_POST['email'];
        //     $age = $_POST['age'];

        //     // Prepare and execute the SQL statement
        //     $stmt = $pdo->prepare("INSERT INTO students (first_name, last_name, email, age) VALUES (?, ?, ?, ?)");
        //     if ($stmt->execute([$first_name, $last_name, $email, $age])) {
        //         echo "<div class='alert alert-success mt-3'>Student added successfully!</div>";
        //     } else {
        //         echo "<div class='alert alert-danger mt-3'>Error adding student.</div>";
        //     }
        // }
        ?>
    </div>
    
</body>
</html>