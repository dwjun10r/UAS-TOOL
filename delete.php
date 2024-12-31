<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM assignment WHERE id='$id'";

    if ($conn->query($sql)) {
        header("Location: uas.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>