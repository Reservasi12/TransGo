# DOKUMENTASI PROJEK: TRANSGO
**Aplikasi Manajemen Reservasi Transportasi (Kelas A)**

---

## 1. Deskripsi Projek
TransGo adalah aplikasi web full-stack untuk manajemen reservasi transportasi. Aplikasi ini memungkinkan pengguna untuk mencari, memesan, dan mengelola tiket transportasi secara online, sementara administrator dapat mengelola inventaris, reservasi, dan konten website.

**Tipe Aplikasi:** Web Aplikasi Full-Stack (User + Admin)  
**Fokus:** Transportasi (Kelas A)

---

## 3. Fitur Utama

### A. User / Pengunjung
1.  **Landing Page**: Informasi layanan, statistik real-time, dan testimoni.
2.  **Reservasi Online**: Form pemesanan dengan pemilihan kursi/penumpang dan kalkulasi harga otomatis.
3.  **Check-in Online**: Fitur konfirmasi keberangkatan mandiri.
4.  **Manajemen Tiket**: Lihat riwayat tiket, status pembayaran, dan cetak tiket.
5.  **Pengajuan Pembatalan**: Form untuk request refund/reschedule.
6.  **Blog Informasi**: Artikel seputar tips perjalanan dan info rute.

### B. Administrator
1.  **Dashboard Eksekutif**: Ringkasan statistik pendapatan & reservasi harian.
2.  **Manajemen Layanan**: CRUD data transportasi (Bus, Travel, Shuttle) beserta harga dan jadwal.
3.  **Approval System**: Verifikasi pembayaran dan persetujuan pembatalan tiket.
4.  **Manajemen User**: Mengelola data pengguna dan hak akses (Admin/Staff/User).
5.  **Manajemen Konten**: Tulis dan publikasi artikel blog.
6.  **Log Aktivitas**: Pantauan keamanan aktivitas admin.

---

## 4. Teknologi yang Digunakan (Tech Stack)
*   **Framework PHP**: Laravel 10.x / 11.x
*   **Database**: MySQL
*   **Frontend**: Blade Templating + Tailwind CSS
*   **Interaktivitas**: Alpine.js
*   **Charting**: ApexCharts
*   **Icon Set**: Heroicons & Tabler Icons

---

## 5. Cara Instalasi & Menjalankan (Localhost)

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username/transgo.git
    cd transgo
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    *   Duplikat file `.env.example` menjadi `.env`
    *   Atur konfigurasi database di file `.env`:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=transgo
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Key & Migrate**
    ```bash
    php artisan key:generate
    php artisan migrate:fresh --seed
    ```
    *(Command `--seed` wajib dijalankan untuk membuat akun demo)*

5.  **Jalankan Aplikasi**
    *   Terminal 1 (Backend): `php artisan serve`
    *   Terminal 2 (Frontend Asset): `npm run dev`
    *   Buka browser di: `http://127.0.0.1:8000`

---

## 6. Akun Demo (Credentials)
Gunakan akun berikut untuk login dan menguji sistem:

| Peran (Role) | Email | Password | Hak Akses |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin@transgo.test` | `password` | **Full Access** (Dashboard, User, Setting, dll) |
| **Staff** | `staff@transgo.test` | `password` | **Operational Access** (Reservasi, Blog, Layanan) - *Tanpa akses User Management* |
| **User (Customer)** | `john@transgo.test` | `password` | **Front-end Access** (Booking, Profile, History) |

---

## 7. Alur Kerja Reservasi (System Workflow)
Berikut adalah tahapan sistem reservasi dari sisi User hingga Admin:

### 1. Booking (User)
*   User memilih layanan transportasi di halaman utama.
*   User mengisi form reservasi (Jumlah penumpang, data diri).
*   Sistem membuat reservasi dengan status awal: `Booking: Pending` dan `Payment: Pending`.

### 2. Approval (Admin)
*   Admin mengecek menu **Reservations**.
*   Admin membuka detail reservasi yang berstatus `Pending`.
*   Admin menekan tombol **Approve** untuk menyetujui, atau **Reject** untuk membatalkan pesanan.

### 3. Payment Confirmation (Admin)
*   Setelah di-approve, User melakukan pembayaran (transfer manual).
*   Admin memverifikasi pembayaran di detail reservasi.
*   Admin menekan tombol **Confirm Payment**. Status berubah menjadi `Payment: Paid`.

### 4. Completion (Admin)
*   Setelah layanan transportasi selesai dilaksanakan.
*   Admin menekan tombol **Mark as Completed** untuk menutup transaksi.

---

## 8. Struktur Folder Penting
*   `app/Http/Controllers/`: Logika backend (Admin & User).
*   `resources/views/`: Tampilan antarmuka (Blade).
    *   `admin/`: Panel admin.
    *   `home/`: Landing page.
    *   `user/`: Dashboard user & booking flow.
*   `routes/web.php`: Definisi rute aplikasi.
*   `database/migrations/`: Skema database.

---
*Dibuat untuk memenuhi Tugas Besar Pemrograman Web.*
