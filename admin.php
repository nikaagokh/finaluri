<?php
include './connection.php';

if(isset($_POST['add'])) {
    $name = $_POST['company_name'];
    $number = $_POST['company_number'];
    $email = $_POST['company_email'];
    $password = $_POST['company_password'];
    $sql = "INSERT INTO companies (company_name, company_number, email, password) VALUES ('$name', $number, '$email', '$password')";
    $result = mysqli_query($conn, $sql);
}

if(isset($_POST['edit'])) {
    $company_id = $_POST['company_id'];
    $company_name = $_POST['company_name'];
    $company_number = $_POST['company_number'];
    $email = $_POST['company_email'];
    $password = $_POST['company_password'];
    $sql = "UPDATE companies SET company_name = '$company_name', company_number = $company_number, email = '$email', password = '$password' WHERE company_id = $company_id";
    $result = mysqli_query($conn, $sql);
}

if (isset($_GET['del'])) {
    $company_id = $_GET['del'];
    $sql = "DELETE FROM companies WHERE company_id = $company_id";
    $result = mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM companies";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

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
    <a href="?add">კომპანიის დამატება</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>სახელი</th>
                <th>ნომერი</th>
                <th>ემაილი</th>
                <th>პაროლი</th>
                <th>მოდიფიკაცია</th>
                <th>წაშლა</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $index => $company) {
            ?>
                <tr>
                    <th><?= $index + 1 ?></th>
                    <td><?= $company['company_name'] ?></td>
                    <td><?= $company['company_number'] ?></td>
                    <td><?= $company['email'] ?></td>
                    <td><?= $company['password'] ?></td>
                    <td>
                        <a href="?edit=<?= $company['company_id'] ?>">ცვლილება</a>
                    </td>
                    <td>
                        <a href="?del=<?= $company['company_id'] ?>">წაშლა</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php
    if (isset($_GET['edit'])) {
        $company_id = $_GET['edit'];
        $sql = "SELECT * FROM companies WHERE company_id = $company_id";
        $query = mysqli_query($conn, $sql);
        $company = mysqli_fetch_assoc($query);
    ?>
        <form action="" method="post" class="register-form">
            <label>სახელი</label>
            <input type="text" name="company_name" class="edit-input" value="<?= $company['company_name']?>">
            <label>ნომერი</label>
            <input type="number" name="company_number" class="edit-input" value="<?= $company['company_number']?>">
            <label>ემაილი</label>
            <input type="text" name="company_email" class="edit-input" value="<?= $company['email']?>">
            <label>პაროლი</label>
            <input type="password" name="company_password" class="edit-input" value="<?= $company['password']?>">
            <input type="hidden" name="company_id" value="<?=$company['company_id']?>">
            <button name="edit" class="register-button">ცვლილება</button>
        </form>
    <?php
    }
    ?>

<?php
    if (isset($_GET['add'])) {
    ?>
        <form action="" method="post" class="register-form">
            <label>სახელი</label>
            <input type="text" name="company_name" class="edit-input">
            <label>ნომერი</label>
            <input type="number" name="company_number" class="edit-input">
            <label>ემაილი</label>
            <input type="text" name="company_email" class="edit-input">
            <label>პაროლი</label>
            <input type="password" name="company_password" class="edit-input">
            <button name="add" class="register-button">დამატება</button>
        </form>
    <?php
    }
    ?>
</body>

</html>