<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Beasiswa - Metode MFEP</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: rgba(0, 0, 50, 0.8);
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            color: #ffcc00;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px;
            font-size: 18px;
            border-bottom: 1px solid white;
            text-align: center;
        }

        .sidebar a:hover {
            background: #ffcc00;
            color: black;
        }

        /* Container */
        .container {
            margin-left: 270px;
            padding: 40px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #004080;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #004080;
            color: white;
        }

        /* Form Button */
        button {
            background-color: #004080;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            border-radius: 5px;
        }

        button:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="index.html">Beranda</a>
        <a href="#">Hitung Beasiswa</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </div>

    <!-- Container -->
    <div class="container">
        <h2>Sistem Pendukung Keputusan Beasiswa</h2>

        <form action="proses.php" method="post">
            <table>
                <tr>
                    <th>Kriteria</th>
                    <th>Bobot (NBF)</th>
                    <th>Student A</th>
                    <th>Student B</th>
                    <th>Student C</th>
                </tr>
                <?php
                $kriteria = ["Prestasi Akademik", "Keuangan", "Ekstrakurikuler", "Wawancara"];
                $bobot = [8, 6, 4, 8]; // Bobot masing-masing kriteria

                for ($i = 0; $i < count($kriteria); $i++) {
                    echo "<tr>";
                    echo "<td>{$kriteria[$i]}</td>";
                    echo "<td><input type='number' name='bobot[]' value='{$bobot[$i]}' readonly></td>";
                    for ($j = 0; $j < 3; $j++) {
                        echo "<td><input type='number' name='nilai[$i][]' required></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <button type="submit">Hitung</button>
        </form>
    </div>

</body>
</html>
