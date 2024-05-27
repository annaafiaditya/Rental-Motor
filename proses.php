<?php

class Motor {
    public $jenis;
    public $jumlah;
    public $isMember;
    public function cetakHasil() {
        $hargaPerHari = 70000; // Harga rental motor per hari 
        $diskonMember = 0.05; // Persentase diskon untuk member 
        $pajak = 10000; // Besar pajak 
        // Menghitung total biaya rental sebelum diskon 
        $totalBiaya = $this->jumlah * $hargaPerHari; 
        // Menambahkan pajak 
        $totalBiaya += $pajak; 
        if ($this->isMember) { // Mengurangi diskon untuk member jika ada 
            $totalBiaya -= $totalBiaya * $diskonMember; } 
            // Menampilkan hasil 
            echo "<center>";
            echo $_POST['nama'] . " bersetatus sebagai " . ($this->isMember ? "MMEMBER mendapatkan diskon 5%" : "BUKAN MEMBER tidak dapat diskon") ."<br>";
            echo "Jenis Motor yang dirental : " . $this->jenis . ", selama " . $this->jumlah . " Hari<br>";
            echo "Harga rental perhari nya: " . $hargaPerHari . ". Pajaknya: " . $pajak . "<br>";
            echo "Total Biaya yang harus dibayarkan adalah: Rp. " . number_format($totalBiaya, 2, ',', '.') . "<br>"; 
            echo "</center>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head> <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rental Motor</title>
    <style>
        .output{
            border-style:solid;
        }
    </style>
</head>

<body>
<center> 
<h4>RENTAL MOTOR</h4>
    <form action="" method="post"> 
        <table> 
            <tr>
                <td>
                    <label for="nama">Nama Pelanggan: </label>
                    <input type="text" name="nama" id="nama" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jumlah">Lama Waktu Rental (Per Hari): </label>
                    <input type="number" name="jumlah" id="jumlah" min="1" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis">Jenis Motor: </label>
                    <select name="jenis" id="jenis" required>
                        <option value="bebek">Bebek</option>
                        <option value="supraBapak">Supra-Bapak</option>
                        <option value="C70">C70</option>
                        <option value="CRF">CRF</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="member">Member: </label>
                        <input type="checkbox" name="member" id="member">
                    </td>
                </tr>
            </table>
            <button type="submit" name="submit">Submit</button>
        </table>
    </form>
    <br>
</center>
</body>

<div class="output">
<?php

if (isset($_POST["submit"])) { $proses = new Motor(); $proses->jenis = $_POST['jenis']; $proses->jumlah = $_POST['jumlah']; $proses->isMember = isset($_POST['member']); $proses->cetakHasil();
}

?>
</div>

</html>