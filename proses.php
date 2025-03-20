<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan MFEP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Hasil Perhitungan SPK Beasiswa - Metode MFEP</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bobot = $_POST['bobot'];
        $nilai = $_POST['nilai'];

        $total_alternatif = count($nilai[0]); // Jumlah mahasiswa
        $total_kriteria = count($bobot);

        // Array untuk menyimpan hasil TBE tiap mahasiswa
        $TBE = array_fill(0, $total_alternatif, 0);

        echo "<table border='1'>";
        echo "<tr><th>Kriteria</th><th>Bobot (NBF)</th><th>Student A</th><th>Student B</th><th>Student C</th></tr>";

        for ($i = 0; $i < $total_kriteria; $i++) {
            echo "<tr>";
            echo "<td>Kriteria " . ($i + 1) . "</td>";
            echo "<td>{$bobot[$i]}</td>";

            for ($j = 0; $j < $total_alternatif; $j++) {
                $NBE = $bobot[$i] * $nilai[$i][$j];
                $TBE[$j] += $NBE;
                echo "<td>{$NBE}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Menentukan alternatif terbaik
        $max_TBE = max($TBE);
        $best_index = array_search($max_TBE, $TBE);
        $alternatif = ["Student A", "Student B", "Student C"];
        $best_choice = $alternatif[$best_index];

        echo "<h3>Rekomendasi Penerima Beasiswa: <strong>{$best_choice}</strong> (TBE: {$max_TBE})</h3>";
    }
    ?>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>