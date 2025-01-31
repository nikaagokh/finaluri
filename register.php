<?php
include './connection.php';

if(isset($_POST['register'])) {
    $name = $_POST['company_name'];
    $number = $_POST['company_number'];
    $email = $_POST['company_email'];
    $password = $_POST['company_password'];
    $sql = "INSERT INTO companies (company_name, company_number, email, password) VALUES ('$name', $number, '$email', '$password')";
    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/finaluri/styles.css">
</head>
<body>
    <form class="register-form" action="" method="post">
        <label>სახელი</label>
        <input type="text" name="company_name" class="register-input">
        <label>ნომერი</label>
        <input type="number" name="company_number" class="register-input">
        <label>ემაილი</label>
        <input type="text" name="company_email" class="register-input">
        <label>პაროლი</label>
        <input type="password" name="company_password" class="register-input">
        <button name="register" class="register-button">რეგისტრაცია</button>
    </form>
</body>
</html>