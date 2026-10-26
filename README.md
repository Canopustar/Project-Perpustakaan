# Project Perpustakaan

Aplikasi web perpustakaan sederhana berbasis Laravel untuk mengelola data buku, peminjaman, pengembalian, dan denda keterlambatan.

## Identitas

|                |                       |
| -------------- | --------------------- |
| Nama           | Amelia Rahmasari      |
| NIM            | 12240112              |
| Kelas          | 12.5A.12              |
| Mata Kuliah    | Web Programming II    |
| Dosen Pengampu | Arfhan Prasetyo M.Kom |

## Fitur

- Data Master : (tambah, ubah, hapus)
- Peminjaman buku
- Daftar buku yang sedang dipinjam
- Riwayat peminjaman

> Sesuaikan daftar fitur ini dengan yang sudah kamu kerjakan.

## Teknologi

- PHP & Laravel
- MySQL
- Blade Template
- Bootstrap 5
- Laragon (lingkungan pengembangan)

## Cara Menjalankan

1. Clone repository
    ```bash
    git clone https://github.com/Canopustar/project-perpustakaan.git
    cd project-perpustakaan
    ```
2. Install dependensi
    ```bash
    composer install
    npm install
    ```
3. Salin file environment dan buat app key
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Buat database baru (misalnya `perpustakaan`), lalu atur koneksi di file `.env`:
    ```env
    DB_DATABASE=perpustakaan
    DB_USERNAME=root
    DB_PASSWORD=
    ```
5. Jalankan migrasi (dan seeder jika ada)
    ```bash
    php artisan migrate --seed
    ```
6. Jalankan aplikasi
    ```bash
    php artisan serve
    ```
    Buka `http://127.0.0.1:8000` di browser.

## Log Progres Mingguan

| Minggu | Tanggal | Yang Dikerjakan                             | Status  |
| ------ | ------- | ------------------------------------------- | ------- |
| 1      |         | Setup project Laravel dan repository GitHub | Selesai |
| 2      |         |                                             |         |
| 3      |         |                                             |         |
| 4      |         |                                             |         |

> Update tabel ini setiap akhir minggu, lalu tandai dengan `git tag minggu-N`.

## Rencana Selanjutnya

- [ ] (tulis fitur yang akan dikerjakan berikutnya)
- [ ] (tulis fitur lainnya)
