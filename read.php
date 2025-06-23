<?php
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h2>Student List</h2>  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">FIRST_NAME</th>
        <th scope="col">LAST_NAME</th>
        <th scope="col">EMAIL</th>
        <th scope="col">AGE</th>
        <th scope="col">REGISTRATION_DATE</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $stmt = $pdo->query("SELECT * FROM students");
        while ($row = $stmt->fetch()) {
          echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['first_name']}</td>
              <td>{$row['last_name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['age']}</td>
              <td>{$row['registration_date']}</td>
              <td>
                <a href='update.php?id={$row['id']}' class='btn btn-primary btn-sm'>Update</a>
                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
              </td>
            </tr>
          ";
        } 
      ?>
    </tbody>
</table>
    
</body>
</html>