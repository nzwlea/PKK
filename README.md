
# BaksoKu
## Website Pemesanan Bakso

BaksoKu adalah website pemesanan bakso yang dikembangkan untuk memudahkan pelanggan dalam melihat pilihan menu, melakukan kustomisasi pesanan, dan memesan bakso secara online. Website ini dirancang dengan tampilan yang sederhana, informatif, dan mudah digunakan.

Project BaksoKu dibuat sebagai bagian dari tugas mata pelajaran Produk Kreatif dan Kewirausahaan (PKK). Website ini diharapkan dapat membantu proses pemesanan dan pengelolaan menu pada usaha bakso agar lebih terstruktur dan praktis.

---

## 1. Tentang Project

BaksoKu merupakan sistem pemesanan berbasis website yang menyediakan informasi mengenai produk bakso, harga, serta pilihan kustomisasi menu. Pelanggan dapat memilih menu yang tersedia, menyesuaikan pesanan sesuai pilihan, kemudian memasukkannya ke dalam keranjang sebelum melanjutkan proses pemesanan.

Selain menyediakan fitur pemesanan untuk pelanggan, BaksoKu juga memiliki fitur pengelolaan menu untuk admin. Admin dapat mengelola informasi produk, mulai dari menambahkan menu baru, memperbarui informasi menu, hingga menghapus menu yang sudah tidak tersedia.

Sistem pemesanan BaksoKu menggunakan metode pengambilan langsung (pickup), sehingga pelanggan dapat mengambil pesanan secara langsung tanpa menggunakan layanan pengantaran.

## 2. Tujuan Pengembangan

Website BaksoKu dikembangkan dengan beberapa tujuan, yaitu:

- Memudahkan pelanggan dalam memperoleh informasi mengenai menu dan harga bakso.
- Memberikan kemudahan kepada pelanggan dalam memilih dan menyesuaikan pesanan.
- Menyediakan sistem keranjang untuk menampung menu yang dipilih pelanggan.
- Membantu admin dalam mengelola informasi menu secara lebih terstruktur.
- Memanfaatkan teknologi website untuk mendukung proses pemesanan pada usaha bakso.

## 3. Hak Akses Pengguna

Website BaksoKu memiliki dua jenis pengguna dengan fungsi yang berbeda.

### A. Customer

Customer merupakan pengguna yang mengakses website untuk melihat informasi produk dan melakukan pemesanan.

Fitur yang tersedia untuk customer meliputi:

1. **Beranda**
   Menampilkan halaman utama website yang berisi informasi dan pengenalan BaksoKu.

2. **Tentang BaksoKu**
   Menyediakan informasi mengenai usaha BaksoKu.

3. **Daftar Menu**
   Menampilkan pilihan menu bakso beserta nama, foto, dan harga produk.

4. **Kustomisasi Menu**
   Memberikan pilihan kepada pelanggan untuk menyesuaikan menu sesuai opsi kustomisasi yang tersedia.

5. **Keranjang**
   Menampilkan daftar menu yang telah dipilih pelanggan sebelum melanjutkan pemesanan.

6. **Pengelolaan Keranjang**
   Memungkinkan pelanggan menyesuaikan jumlah pesanan atau menghapus menu yang tidak jadi dipesan, sesuai fitur yang tersedia.

7. **Pemesanan**
   Memfasilitasi pelanggan untuk melanjutkan proses pemesanan dengan sistem pengambilan langsung (pickup).

### B. Admin

Admin merupakan pengguna yang bertugas mengelola informasi menu pada website BaksoKu.

Fitur yang tersedia untuk admin meliputi:

1. **Halaman Pengelolaan Menu**
   Menampilkan daftar menu yang tersimpan di dalam database.

2. **Tambah Menu**
   Memungkinkan admin menambahkan produk baru dengan mengisi informasi nama menu, harga, dan foto produk.

3. **Edit Menu**
   Memungkinkan admin memperbarui informasi produk yang sudah tersedia.

4. **Hapus Menu**
   Memungkinkan admin menghapus produk yang sudah tidak ingin ditampilkan.

5. **Pengelolaan Foto Menu**
   Memungkinkan admin menambahkan atau memperbarui foto produk agar informasi menu ditampilkan dengan sesuai.

## 4. Daftar Menu BaksoKu

BaksoKu menyediakan tiga pilihan menu utama dengan rincian sebagai berikut:

| No. | Nama Menu | Harga |
|---|---|---:|
| 1 | Bakso Urat | Rp15.000 |
| 2 | Bakso Telur | Rp15.000 |
| 3 | Bakso Urat + Telur | Rp22.000 |

Harga yang ditampilkan merupakan harga produk yang tersedia pada website BaksoKu.

## 5. Alur Penggunaan Website

### A. Alur Customer

1. Customer membuka website BaksoKu.
2. Customer melihat informasi pada halaman utama.
3. Customer membuka daftar menu yang tersedia.
4. Customer memilih salah satu menu bakso.
5. Customer melakukan kustomisasi sesuai pilihan yang tersedia.
6. Customer menambahkan menu ke keranjang.
7. Customer memeriksa daftar pesanan dan jumlah harga.
8. Customer melanjutkan proses pemesanan.
9. Customer mengambil pesanan secara langsung sesuai metode pickup.

### B. Alur Admin

1. Admin membuka halaman pengelolaan menu.
2. Admin melihat daftar menu yang tersedia.
3. Admin dapat menambahkan menu baru.
4. Admin dapat memperbarui informasi menu.
5. Admin dapat menghapus menu yang sudah tidak diperlukan.
6. Perubahan data menu disimpan ke dalam database dan ditampilkan pada halaman menu customer.

## 6. Teknologi yang Digunakan

Berikut merupakan teknologi dan perangkat lunak yang digunakan dalam pengembangan website BaksoKu.

| Teknologi | Kegunaan |
|---|---|
| PHP | Bahasa pemrograman untuk mengembangkan logika aplikasi. |
| Laravel 13 | Framework PHP yang digunakan untuk membangun aplikasi website. |
| MySQL | Sistem manajemen database untuk menyimpan data aplikasi. |
| Blade Template | Template engine Laravel untuk menyusun tampilan halaman website. |
| Bootstrap 5 | Framework CSS untuk membantu penyusunan tampilan website. |
| HTML | Bahasa markup untuk membangun struktur halaman website. |
| CSS | Digunakan untuk mengatur desain dan tampilan website. |
| JavaScript | Digunakan untuk mendukung interaksi pada halaman website. |
| Laragon | Lingkungan pengembangan lokal untuk menjalankan aplikasi dan database. |
| Visual Studio Code | Editor kode yang digunakan dalam proses pengembangan. |

## 7. Struktur Project

Project BaksoKu menggunakan struktur direktori Laravel dengan beberapa folder dan file utama berikut:

```text
BaksoKu/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── images/
│   └── favicon.ico
│
├── resources/
│   └── views/
│       ├── components/
│       └── welcome.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

Struktur tersebut merupakan gambaran umum direktori Laravel. File dan folder tambahan dapat disesuaikan dengan perkembangan project BaksoKu.

## 8. Database

Website BaksoKu menggunakan MySQL sebagai tempat penyimpanan data.

Database yang digunakan bernama:

```text
baksoku
```

Salah satu tabel utama yang digunakan untuk menyimpan informasi menu adalah tabel `menus`.

Tabel tersebut memiliki beberapa kolom berikut:

| Nama Kolom | Tipe Data | Keterangan |
|---|---|---|
| id | Big Integer | Primary key dan identitas menu. |
| nama_menu | Varchar | Menyimpan nama menu bakso. |
| harga | Integer | Menyimpan harga menu. |
| foto | Varchar, Nullable | Menyimpan nama file foto menu. |
| created_at | Timestamp | Mencatat waktu data dibuat. |
| updated_at | Timestamp | Mencatat waktu data diperbarui. |

Foto produk disimpan di dalam folder `public/images`, sedangkan database menyimpan nama file fotonya.

## 9. Persyaratan Sistem

Sebelum menjalankan project BaksoKu, pastikan perangkat telah memiliki:

- PHP 8.3 atau versi yang sesuai dengan kebutuhan Laravel.
- Composer.
- MySQL.
- Laragon atau lingkungan pengembangan PHP lainnya.
- Visual Studio Code atau editor kode lainnya.
- Web browser.

## 10. Cara Instalasi dan Menjalankan Project

Berikut langkah-langkah untuk menjalankan website BaksoKu pada perangkat lokal.

### A. Persiapan Project

1. Clone repository BaksoKu dari GitHub:

```bash
git clone URL_REPOSITORY
```

2. Masuk ke direktori project:

```bash
cd BaksoKu
```

3. Install dependency Laravel menggunakan Composer:

```bash
composer install
```

4. Salin file konfigurasi `.env.example` menjadi `.env`.

Pada Windows, file tersebut dapat disalin melalui File Explorer atau menggunakan perintah:

```bash
copy .env.example .env
```

5. Buat application key:

```bash
php artisan key:generate
```

### B. Konfigurasi Database

1. Jalankan Laragon dan aktifkan layanan MySQL.
2. Buka phpMyAdmin.
3. Buat database baru dengan nama:

```text
baksoku
```

4. Buka file `.env` pada folder utama project.
5. Sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=baksoku
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL pada perangkat masing-masing.

### C. Menjalankan Migration

Jalankan perintah berikut pada terminal VS Code:

```bash
php artisan migrate
```

Perintah tersebut digunakan untuk membuat tabel database berdasarkan file migration yang tersedia.

### D. Menjalankan Website

Setelah konfigurasi selesai, jalankan perintah:

```bash
php artisan serve
```

Kemudian buka alamat berikut melalui browser:

```text
http://127.0.0.1:8000
```

Website BaksoKu dapat diakses melalui alamat tersebut selama server lokal sedang berjalan.

## 11. Pengujian Website

Pengujian dilakukan untuk memastikan setiap fitur pada website BaksoKu dapat berjalan sesuai dengan fungsinya.

Pengujian mencakup:

- Pengujian tampilan halaman customer.
- Pengujian navigasi halaman customer dan admin.
- Pengujian daftar menu dan informasi produk.
- Pengujian kustomisasi menu.
- Pengujian penambahan dan pengelolaan keranjang.
- Pengujian proses pemesanan.
- Pengujian pengelolaan menu oleh admin.
- Pengujian penyimpanan dan perubahan data pada database.

Hasil pengujian dicatat dalam dokumen Testing Notes sebagai dokumentasi pemeriksaan fungsionalitas website.

## 12. Pengembang

**Nama Project:** BaksoKu  
**Kategori Project:** Website Pemesanan Bakso  
**Mata Pelajaran:** Produk Kreatif dan Kewirausahaan (PKK)  
**Framework:** Laravel 13  
**Database:** MySQL  

---

## Lisensi

Project BaksoKu dikembangkan untuk keperluan pembelajaran dan tugas sekolah.
