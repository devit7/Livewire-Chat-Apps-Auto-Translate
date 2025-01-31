
# Aplikasi Chat dengan Fitur Translate Otomatis

Aplikasi chat ini dibangun dengan menggunakan Laravel, Livewire, Tailwind, dan MySQL. Aplikasi ini memungkinkan pengguna untuk mengirim pesan tanpa loading (menggunakan `wire:poll`) dan memiliki fitur translate otomatis. Pesan yang diterima dapat diterjemahkan ke bahasa yang telah diatur oleh pengguna (contoh: Bahasa Indonesia) dengan sekali klik.

## Fitur Utama

- **Kirim Pesan Tanpa Loading**: Menggunakan Livewire's `wire:poll` untuk memperbarui pesan secara real-time tanpa perlu me-refresh halaman.
- **Translate Otomatis**: Pesan yang diterima dapat diterjemahkan ke bahasa yang telah diatur oleh pengguna (contoh: Bahasa Indonesia) dengan sekali klik.
- **Multi-bahasa**: Mendukung penerjemahan dari berbagai bahasa (contoh: Jepang ke Indonesia).

## Teknologi yang Digunakan

- **Laravel**: Framework PHP untuk backend.
- **Livewire**: Library untuk membuat komponen dinamis dengan PHP.
- **Tailwind CSS**: Framework CSS untuk styling.
- **MySQL**: Database untuk menyimpan data pengguna dan pesan.

## Demo

### Demo Aplikasi Chat
[![YouTube](http://i.ytimg.com/vi/k2OPAn3UdMg/hqdefault.jpg)](https://www.youtube.com/watch?v=k2OPAn3UdMg)

### Demo Fitur Translate
[![YouTube](http://i.ytimg.com/vi/Klg4VLU4ZQ8/hqdefault.jpg)](https://www.youtube.com/watch?v=Klg4VLU4ZQ8)

## Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/repository-name.git
   cd repository-name
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   - Buat file `.env` dari `.env.example`
   - Konfigurasi database di `.env`
   ```env
   DB_DATABASE=nama_database
   DB_USERNAME=username
   DB_PASSWORD=password
   ```

4. **Generate Key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   npm run dev
   ```

## Penggunaan

1. **Registrasi/Login**: Buat akun baru atau login dengan akun yang sudah ada.
2. **Mulai Chat**: Pilih kontak dan mulai mengirim pesan.
3. **Translate Pesan**: Klik pada pesan yang diterima untuk menerjemahkannya ke bahasa yang telah diatur.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buka issue atau pull request. Kami sangat menghargai kontribusi Anda!

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

Dibuat dengan ❤️ oleh [Nama Anda](https://github.com/username)
```

