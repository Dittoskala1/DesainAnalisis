# Analisis Sistem Manajemen Pesanan

## Tujuan Utama
- Membuat sistem sederhana untuk manajemen pesanan berbasis web menggunakan Laravel.
- **Customer** hanya bisa melihat pesanan mereka.
- **Admin** memiliki akses penuh untuk mengelola semua pesanan.

## Fungsi Utama
- **Customer**: Melihat daftar pesanan mereka sendiri.
- **Admin**: Melihat, menambah, mengubah, dan menghapus semua data pesanan.

## Struktur Database
- **Tabel `users`**: Menyimpan data pengguna.
- **Tabel `roles` & `permissions`**: Mengelola hak akses menggunakan Spatie Laravel Permission.
- **Tabel `orders`**: Menyimpan data pesanan yang terkait dengan pengguna.

## Proses Bisnis
### Customer
1. Login ke sistem.
2. Melihat daftar pesanan pribadi berdasarkan izin `view_order`.

### Admin
1. Login ke sistem.
2. Mengelola semua data pesanan:
   - Melihat semua pesanan (`view_any_order`).
   - Menambah pesanan baru (`create_order`).
   - Memperbarui pesanan (`update_order`).
   - Menghapus pesanan (`delete_order`).

## Implementasi Utama
- Menggunakan **Spatie Laravel Permission** untuk mengatur peran dan hak akses.
- **Seeder**:
  - Membuat data role (`super_admin`, `Customer`) dan hak akses (seperti `view_order`).
  - Menghubungkan pengguna ke role yang sesuai.
  - Menambahkan data dummy pesanan untuk pengujian.

## Poin Penting
- Relasi antara tabel `users` dan `orders` menggunakan foreign key `customer_id`.
- Hanya pengguna dengan role `Customer` yang bisa mengakses data pesanan mereka sendiri.
- Sistem dirancang tanpa fitur transaksi pemesanan, hanya menampilkan data pesanan.

## Potensi Error & Solusi
1. **Error Penulisan Variabel**:
   - Kesalahan seperti penggunaan `$permission` harus diubah menjadi `$permissions`.
2. **PermissionSeeder**:
   - Pastikan semua izin diberikan ke role yang sesuai.

## Non-Fungsional
- Sistem mendukung **100 pengguna aktif** secara bersamaan.
- Tampilan responsif untuk semua perangkat.
