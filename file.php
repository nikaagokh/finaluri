<?php
include './connection.php';

if(isset($_POST['submit'])) {
    $name = $_POST['title'];
    $avail = $_POST['available'];
    var_dump($name);
    var_dump($avail);
    if(isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $upload_dir = 'files/';

        $file_path = $upload_dir . basename($image_name);
        if(move_uploaded_file($image_tmp_name, $file_path)) {
            echo "uploaded";
        }
    }
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
    <form action="" method="post" enctype="multipart/form-data" style="display: flex; flex-direction:column; gap:0.5rem; width:400px;">

        <input type="text" name="title" class="napr-input-inner" autocomplete="off" placeholder="პროდუქტის სახელი">

        <input type="text" name="available" class="napr-input-inner" autocomplete="off" placeholder="მარაგები">

        <input type="text" name="condition" class="napr-input-inner" autocomplete="off" placeholder="მდგომარეობა">

        <input type="number" name="price" class="napr-input-inner" autocomplete="off" placeholder="ფასი">

        <input type="file" name="image" accept="image/*" required>
        <button type="submit" name="submit" class="napr-button button-primary">დამატება</button>
    </form>
</body>

</html>