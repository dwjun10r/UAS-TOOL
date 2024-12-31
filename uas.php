<?php
require 'config.php';

// Ambil data proyek dari database
$sql = "SELECT * FROM assignment ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lacquer&family=Monda:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="personal logo.png" alt="Personal Logo" width="100px" height="auto">
        <nav> 
            <ul> 
                <li><a href="#Home" class="navigasi">Home</a></li>
                <li><a href="#About" class="navigasi">About</a></li>
                <li><a href="#Assignment" class="navigasi">Assignment</a></li>
                <li><a href="#Sosmed" class="navigasi">Sosmed</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="Home"> 
        <article class="text">
            <p>Hello, I'm</p> 
            <h1>Dewa Junior</h1> 
            <p>I am a student of Udayana University</p>
        </article>

        <img src="personal.jpg" alt="Personal Photo">
    </section>

    <section class="About"> 
        <article class="image"> 
            <img src="personal2.jpg" alt="Identitas">
            </article>
        <article class="Identitas">
            <h1>About Me</h1>
            <p><strong>Nama</strong>          : Dewa Gede Junior Satria Erlangga</p> <br>
            <p><strong>NIM</strong>           : 2405551096</p> <br>
            <p><strong>Kelas</strong>         : Tool Teknologi Informasi D</p> <br>
            <p><strong>Prodi</strong>         : Teknologi Informasi</p> <br>
            <p><strong>Fakultas</strong>      : Teknik</p> <br>
            <p><strong>Universitas</strong>   : Universitas Udayana</p>
        </article>

    </section>

    <section class="Assignment">
        <h1 class="HS">Assignment List</h1>
        <a href="tambah.php" class="tambah">Add</a>

        <article class="tableass">
        <table border="1">
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th style="text-align: right;"></th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . (isset($row["Matkul"]) ? $row["Matkul"] : 'Tidak ada data') . "</td>";
                        echo "<td>" . (isset($row["Deskripsi"]) ? $row["Deskripsi"] : 'Tidak ada data') . "</td>";
                        echo "<td>" . (isset($row["Tenggat"]) ? $row["Tenggat"] : 'Tidak ada data') . "</td>";
                        echo "<td>" . (isset($row["status"]) ? $row["status"] : 'Tidak ada data') . "</td>";
                        echo "<td>" . (isset($row["created_at"]) ? $row["created_at"] : 'Tidak ada data') . "</td>";
                        
                        echo "<td>
                                <a href='edit.php?id={$row['id']}' class='edit'>Edit</a>  
                                <a href='delete.php?id={$row['id']}' class='delete' onclick='return confirm(\"Apakah anda yakin?\")'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {

                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>

            </tbody>
        </table>
        </article>
    </section>

    <section class="Sosmed">
        <article class="Judul">
        <h1><span class="sosmed1">Social</span> <span class="sosmed2">Media</span></h1>
        </article>

        <article class="logo">
        <a href="https://www.instagram.com/juniiorrrs_?igsh=M3J2cjBjMTRyazZr" target="_blank" class="instagram">
            <img src="instagram logo.png" alt="instagram icon" width="60px" height="auto">
        </a>

        <a href="https://www.tiktok.com/@nyongzz3?_t=ZS-8sFAVPizkzI&_r=1" target="_blank" class="tiktok"> 
            <img src="tiktok logo.png" alt="Tiktok icon" width="60px" height="auto">
        </a>
        </article>
    </section>
</body>
</html>