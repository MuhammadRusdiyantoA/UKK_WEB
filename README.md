## Tentang Aplikasi

Aplikasi dalam repositori github ini adalah aplikasi perpustakaan berbasis website yang dibangun menggunakan framework <a href="https://laravel.com/">Laravel 8</a>. Aplikasi ini dibangun dengan tujuan untuk persiapan dan pemantapan UKK (Ujian Kompetensi Keahlian) tahun pelajaran 2022/2023.

## Fitur Aplikasi

Terdapat beberapa fitur yang terdapat dalam aplikasi perpustakaan ini, diantara lain:
- Autentikasi Pengguna (Login, Register, dan Logout)
- Manajemen buku (lihat, tambah, ubah, dan hapus)
- Manajemen profil
- Pinjam buku & Rekap admin perpustakaan [Coming Soon]

## Cara Mengunduh atau Mendownload

1. Buka Terminal atau Command Prompt dan jalankan perintah berikut untuk pindah ke direktori atau folder dimana proyek ini akan diunduh
```
cd d:/direktori/pilihan/kamu
```

2. Clone atau download repositori ini dengan menjalankan
```
git clone https://github.com/MuhammadRusdiyantoA/UKK_WEB
```

3. Tunggu hingga proses pengunduhan repositori selesai

## Cara Menjalankan

1. Buka folder proyek menggunakan text editor favoritmu

2. Copy file `.env.example` di folder yang sama

3. Rename file hasil copy menjadi `.env`

4. Ubah isi file .env sesuai dengan keperluan (semisalkan nama database, user localhost, dan password localhost)

5. Tambahkan syntax ini dibagian paling bawah file `.env`
```
FILESYSTEM_DRIVER=public
```

4. Jalankan perintah ini di Terminal atau Command Prompt
```
composer update
```
atau
```
composer install
```

5. Lalu, masukkan dan jalankan perintah ini
```
php artisan key:generate
```

6. Jalankan perintah ini untuk membuat tabel dalam database (pastikan file `.env` sudah terkonfigurasi dengan benar)
```
php artisan migrate
```

7. Untuk menambahkan akun administrator, jalankan perintah dibawah ini
```
php artisan db:seed
```

8. Setelah itu, jalankan perintah ini untuk melakukan link storage supaya pengguna dapat mengakses gambar
```
php artisan storage:link
```

9. Terakhir, jalankan kedua perintah ini dan aplikasi dapat digunakan

Pada Terminal 1
```
php artisan serve
```
dan pada Terminal 2
```
npm run watch
```

## Solving Error
[Untuk Pengguna XAMPP]
Jika terdapat error yang muncul saat proses instalasi package `maatwebsite/excel`, maka ikuti langkah - langkah berikut,

1. Buka folder `XAMPP/PHP`

2. Cari file php dengan extension .ini

3. Buka file dengan notepad atau text editor lain

4. Tekan `ctrl + f` dan cari `extension=gd`

5. Hapus tanda titik koma `;` di awal baris

6. Tekan `ctrl + s` untuk menyimpan perubahan

7. Jalankan proses instalasi lagi
