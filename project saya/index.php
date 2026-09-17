<?php
/**
 * TUGAS PBO — ENKAPSULASI PHP
 * Studi Kasus: Class Produk
 *
 * Ketentuan:
 * 1. Minimal 4 property (private)
 * 2. Setiap property punya getter
 * 3. Setiap property punya setter
 * 4. Minimal 2 validasi pada setter
 * 5. Buat object Produk
 * 6. Tampilkan data menggunakan getter
 */

class Produk
{
    // 1. Minimal 4 property, semua private (sesuai catatan tugas)
    private $nama;
    private $harga;
    private $stok;
    private $kategori;

    // ================= GETTER (poin 2) =================

    public function getNama()
    {
        return $this->nama;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function getStok()
    {
        return $this->stok;
    }

    public function getKategori()
    {
        return $this->kategori;
    }

    // ================= SETTER + VALIDASI (poin 3 & 4) =================

    // Setter nama - validasi: tidak boleh kosong
    public function setNama($nama)
    {
        if (empty(trim($nama))) {
            echo "Nama produk tidak boleh kosong.<br>";
        } else {
            $this->nama = $nama;
        }
    }

    // Setter harga - validasi: harus angka & tidak boleh negatif/nol
    public function setHarga($harga)
    {
        if (!is_numeric($harga)) {
            echo "Harga harus berupa angka.<br>";
        } elseif ($harga <= 0) {
            echo "Harga harus lebih besar dari 0.<br>";
        } else {
            $this->harga = $harga;
        }
    }

    // Setter stok - validasi: tidak boleh negatif (contoh dari tugas)
    public function setStok($stok)
    {
        if ($stok >= 0) {
            $this->stok = $stok;
        } else {
            echo "Stok tidak boleh negatif.<br>";
        }
    }

    // Setter kategori - validasi: hanya kategori tertentu yang diizinkan
    public function setKategori($kategori)
    {
        $kategoriValid = ["Elektronik", "Fashion", "Makanan", "Kesehatan", "Lainnya"];

        if (in_array($kategori, $kategoriValid)) {
            $this->kategori = $kategori;
        } else {
            echo "Kategori tidak valid. Pilih salah satu: " . implode(", ", $kategoriValid) . "<br>";
        }
    }
}

// ================= 5. Buat Object Produk =================

$produk = new Produk();

// Isi data produk menggunakan setter (bukan akses langsung ke property)
$produk->setNama("Laptop");
$produk->setHarga(7500000);
$produk->setStok(10);
$produk->setKategori("Elektronik");

// ================= 6. Tampilkan Data Produk menggunakan getter =================

echo "===== DATA PRODUK =====<br>";
echo "Nama: " . $produk->getNama() . "<br>";
echo "Harga: Rp" . number_format($produk->getHarga(), 0, ',', '.') . "<br>";
echo "Stok: " . $produk->getStok() . "<br>";
echo "Kategori: " . $produk->getKategori() . "<br>";

echo "<br>===== CONTOH VALIDASI SETTER (data tidak valid) =====<br>";
$produk->setHarga(-5000);      // akan gagal, harga negatif
$produk->setStok(-2);          // akan gagal, stok negatif
$produk->setKategori("Mainan"); // akan gagal, kategori tidak ada di daftar
