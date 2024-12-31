<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM assignment WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $Matkul = $_POST['Matkul'];
    $Deskripsi = $_POST['Deskripsi'];
    $Tenggat = $_POST['Tenggat'];
    $status = $_POST['status'];

    $sql = "UPDATE assignment SET Deskripsi='$Deskripsi', Tenggat='$Tenggat', status='$status' WHERE id='$id'";
    if ($conn->query($sql)) {
        header("Location: uas.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <h1>Update Assignment</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label>Mata Kuliah:</label>
        <input type="text" name="Matkul" value="<?= $data['Matkul'] ?>" readonly><br>
        <label>Deskripsi:</label>
        <textarea name="Deskripsi"><?= $data['Deskripsi'] ?></textarea><br>
        <label>Deadline:</label>
        <input type="date" name="Tenggat" value="<?= $data['Tenggat'] ?>"><br>
        <label>Status:</label>
        <select name="status">
            <option value="tertunda" <? $data['status'] == 'tertunda' ? 'selected' : '' ?>>Tertunda</option>
            <option value="selesai" <? $data['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
        </select><br>
        <button type ="submit">Update</button>
    </form>
</body>
</html>