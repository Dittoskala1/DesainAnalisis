# Business Requirement Document (BRD)

## 1. Tujuan Proyek
Membangun sistem manajemen order sederhana berbasis web menggunakan Laravel, di mana:
- **Customer** dapat melihat daftar pesanan mereka.
- **Admin** dapat mengelola semua pesanan, termasuk melihat, membuat, memperbarui, dan menghapus data pesanan.

## 2. Fitur Utama

### 2.1 Manajemen Pesanan
- **Hanya data pemesanan** tanpa transaksi pemesanan.
- **Customer:** Melihat pesanan milik mereka sendiri.
- **Admin:** Melihat semua pesanan, menambah, memperbarui, dan menghapus pesanan.

### 2.2 Manajemen Pengguna
- **Admin:** Memiliki akses penuh, termasuk membuat dan mengelola data pesanan.
- **Customer:** Hanya dapat melihat data pesanan mereka.

### 2.3 Role & Permissions
Menggunakan paket **Spatie Laravel Permission** untuk mengelola akses.

---

## 3. Struktur Tabel Database

### 3.1 Tabel `users`
Berisi informasi pengguna dengan kolom utama seperti:
- `id`
- `name`
- `email`
- `password`

### 3.2 Tabel `roles` dan `permissions`
Mengelola data role dan permission untuk pengguna berdasarkan paket Spatie Laravel Permission.

### 3.3 Tabel `orders`
Berisi data pesanan dengan struktur:
- `customer_id`: ID pengguna yang membuat pesanan.
- `product_name`: Nama produk yang dipesan.
- `quantity`: Jumlah produk.
- `total_price`: Total harga pesanan.

---

## 4. Business Process Flow

### 4.1 Customer Process
1. Customer login ke sistem.
2. Customer hanya dapat melihat pesanan milik mereka melalui permission `view_order`.

### 4.2 Admin Process
1. Admin login ke sistem.
2. Admin dapat:
   - Melihat semua pesanan (`view_any_order`).
   - Menambah pesanan baru (`create_order`).
   - Memperbarui pesanan (`update_order`).
   - Menghapus pesanan (`delete_order`).

---

## 5. Analisis Kode

### 5.1 Database Migration
- Tabel `orders` memiliki hubungan **many-to-one** dengan `users` melalui kolom `customer_id`.
- Kolom `customer_id` berperan sebagai *foreign key* yang terhubung dengan `users.id`.

### 5.2 Seeder

#### 5.2.1 RoleSeeder
Membuat role `super_admin` dan `Customer` lalu mengasosiasikannya ke user tertentu berdasarkan email.

#### 5.2.2 PermissionSeeder
Membuat permissions dan mengasosiasikannya ke role sesuai kebutuhan.

**Error pada kode:**
```php
$role->givePermissionTo($permission); // harusnya $role->givePermissionTo($permissions);
