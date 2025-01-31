<?php
session_start();

include "./connection.php";

if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form class="register-form" action="" method="post">
        <label>ემაილი</label>
        <input type="text" name="email" class="register-input">
        <label>პაროლი</label>
        <input type="password" name="password" class="register-input">
        <button name="register" class="register-button">რეგისტრაცია</button>
    </form>
</body>

</html>