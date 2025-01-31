<?php

include './connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $req = "INSERT INTO companies (company_name, company_number, email, password) VALUES ('')";
      $query = mysqli_query($conn, $req);
      $result = mysqli_fetch_all($query);
      var_dump($result);
    ?>
</body>
</html>