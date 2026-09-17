<?php
// Parent Class
class Produk {
    protected $nama;
    protected $merek;
    protected $harga;

    public function __construct($nama, $merek, $harga) {
        $this->nama = $nama;
        $this->merek = $merek;
        // Validasi harga di constructor
        if ($harga < 0) {
            throw new Exception("Harga tidak boleh bernilai negatif");
        }
        $this->harga = $harga;
    }

    public function getInfo() {
        return "Merek: " . $this->merek . "\n" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }
}

// Child Class - Makanan
class Makanan extends Produk {
    private $tanggalKadaluarsa;

    public function __construct($nama, $merek, $harga, $tanggalKadaluarsa) {
        parent::__construct($nama, $merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    // Override getInfo() dari parent
    public function getInfo() {
        $status = (strtotime($this->tanggalKadaluarsa) >= strtotime(date('Y-m-d')))
            ? "Segar" : "Kadaluarsa";

        return "Produk: Makanan - " . $this->nama . "\n" .
               parent::getInfo() . "\n" .
               "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "\n" .
               "Status: " . $status;
    }
}

// Child Class - Elektronik
class Elektronik extends Produk {
    private $garansi; // dalam bulan

    public function __construct($nama, $merek, $harga, $garansi) {
        parent::__construct($nama, $merek, $harga);
        $this->garansi = $garansi;
    }

    // Override getInfo() dari parent
    public function getInfo() {
        return "Produk: Elektronik - " . $this->nama . "\n" .
               parent::getInfo() . "\n" .
               "Garansi: " . $this->garansi . " bulan";
    }
}

// Penggunaan
$makanan = new Makanan("Mie Instan", "Indomie", 3500, "2025-06-30");
echo $makanan->getInfo();
echo "\n\n";

$elektronik = new Elektronik("Smart TV", "Samsung", 5000000, 12);
echo $elektronik->getInfo();
echo "\n";
?>