<?php
require 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Matkul = $_POST['Matkul'];
    $Deskripsi = $_POST['Deskripsi'];
    $Tenggat = $_POST['Tenggat'];
    $status = $_POST['status'];

    if (!empty($Matkul) && !empty($Deskripsi) && !empty($Tenggat) && !empty($status)) {

        $sql = $conn->prepare("INSERT INTO assignment (Matkul, Deskripsi, Tenggat, status) VALUES (?, ?, ?, ?)");
        if ($sql === false) {
            die('Error preparing the statement: ' . $conn->error);
        }
        $sql->bind_param("ssss", $Matkul, $Deskripsi, $Tenggat, $status);
    
        if ($sql->execute()) {
            header("Location: uas.php");
            exit;
        } else {
            echo "Error: " . $sql->error;
        }
    
        $sql->close();
    } else {
        echo "Data tidak lengkap!";
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignment</title>

    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Add New Assignment</h1>
    <form method="POST" action="">
        <label>Mata Kuliah:</label>
        <input type="text" name="Matkul" required><br>
        <label>Deskripsi:</label>
        <textarea name="Deskripsi" required></textarea><br>
        <label>Deadline:</label>
        <input type="date" name="Tenggat" required><br>
        <label>Status:</label>
        <select name="status">
            <option value="tertunda">Tertunda</option>
            <option value="selesai">Selesai</option>
        </select><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
