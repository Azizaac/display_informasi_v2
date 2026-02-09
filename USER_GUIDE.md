# 📖 Panduan Penggunaan Display Informasi - Solo Technopark

## Daftar Isi
1. [Pengenalan Aplikasi](#pengenalan-aplikasi)
2. [Akses Aplikasi](#akses-aplikasi)
3. [Panduan Admin Panel](#panduan-admin-panel)
4. [Panduan Penggunaan Display](#panduan-penggunaan-display)
5. [Tips & Troubleshooting](#tips--troubleshooting)

---

## 📱 Pengenalan Aplikasi

**Display Informasi** adalah aplikasi untuk menampilkan informasi digital di Solo Technopark yang terdiri dari:
- **Display Utama**: Layar informasi yang menampilkan jadwal, video, dan carousel
- **Admin Panel**: Dashboard untuk mengelola konten yang ditampilkan

### Fitur Utama
- ✅ Jadwal kegiatan dengan auto-scroll
- ✅ Video YouTube dengan autoplay
- ✅ Carousel gambar otomatis
- ✅ Background custom
- ✅ Header yang dapat disesuaikan
- ✅ Jam dan tanggal real-time

---

## 🌐 Akses Aplikasi

### URL Aplikasi
- **Display Utama**: `http://localhost:8000/`
- **Admin Panel**: `http://localhost:8000/admin`

### Login Admin (Default)
```
Username: admin
Password: admin123
```

> ⚠️ **PENTING**: Ganti password default setelah instalasi pertama!

---

## 👨‍💼 Panduan Admin Panel

### 1. Dashboard
Halaman utama yang menampilkan:
- Ringkasan jumlah data (jadwal, video, carousel, dll)
- Quick access ke semua modul
- Statistik penggunaan

### 2. Mengelola Jadwal Kegiatan

#### Menambah Jadwal Baru
1. Klik menu **Jadwal** di sidebar
2. Klik tombol **+ Tambah Jadwal**
3. Isi form:
   - **Tanggal**: Pilih tanggal kegiatan
   - **Waktu Mulai**: Jam mulai (format 24 jam, contoh: 09:00)
   - **Waktu Selesai**: Jam selesai (contoh: 11:00)
   - **Agenda**: Nama kegiatan (contoh: "Workshop Teknologi")
   - **Lokasi**: Tempat kegiatan (contoh: "Ruang Seminar")
   - **PIC**: Penanggung jawab (opsional)
4. Klik **Simpan**

#### Mengedit Jadwal
1. Di halaman **Jadwal**, klik tombol **Edit** (ikon pensil) pada jadwal yang ingin diubah
2. Ubah data yang diperlukan
3. Klik **Update**

#### Menghapus Jadwal
1. Klik tombol **Hapus** (ikon tempat sampah) pada jadwal yang ingin dihapus
2. Konfirmasi penghapusan

> 💡 **Tips**: Jadwal akan otomatis scroll di display utama. Urutkan berdasarkan tanggal dan waktu.

---

### 3. Mengelola Video YouTube

#### Menambah Video
1. Klik menu **Video** di sidebar
2. Klik tombol **+ Tambah Video**
3. Isi form:
   - **Judul**: Nama video (opsional)
   - **Deskripsi**: Keterangan video (opsional)
   - **Video URL**: Paste URL YouTube
     ```
     Contoh URL yang valid:
     https://www.youtube.com/watch?v=jNQXAC9IVRw
     https://youtu.be/jNQXAC9IVRw
     https://www.youtube.com/embed/jNQXAC9IVRw
     ```
   - **Is Active**: Centang untuk menampilkan di display
4. Klik **Simpan**

#### ⚠️ PENTING: Cek Video Bisa Di-Embed
Sebelum menambahkan video, **pastikan video bisa di-embed**:

**Cara 1: Cek di YouTube**
1. Buka video di YouTube
2. Klik **Share** → **Embed**
3. Jika muncul kode `<iframe>` = **BISA** ✅
4. Jika ada pesan error = **TIDAK BISA** ❌

**Cara 2: Test di Aplikasi**
1. Buka `http://localhost:8000/test-youtube.html`
2. Edit file dan ganti video ID
3. Refresh dan lihat hasilnya

**Video yang PASTI Bisa:**
```
https://www.youtube.com/watch?v=jNQXAC9IVRw  (Me at the zoo)
https://www.youtube.com/watch?v=dQw4w9WgXcQ  (Rick Astley)
https://www.youtube.com/watch?v=9bZkp7q19f0  (Gangnam Style)
```

#### Mengaktifkan/Menonaktifkan Video
- **Hanya 1 video yang bisa aktif** di display
- Untuk ganti video: Edit video lama → uncheck "Is Active" → Edit video baru → check "Is Active"

---

### 4. Mengelola Carousel (Slideshow Gambar)

#### Menambah Gambar Carousel
1. Klik menu **Carousel** di sidebar
2. Klik tombol **+ Tambah Carousel**
3. Isi form:
   - **Caption**: Teks yang muncul di bawah gambar (opsional)
   - **Order Index**: Urutan tampil (angka kecil = tampil duluan)
   - **Gambar**: 
     - **Upload File**: Pilih gambar dari komputer (max 5MB)
     - **ATAU Image URL**: Paste URL gambar dari internet
   - **Is Active**: Centang untuk menampilkan
4. Klik **Simpan**

#### Tips Carousel
- Format gambar: JPG, PNG, GIF
- Ukuran ideal: 1920x1080px (landscape)
- Carousel akan auto-rotate setiap **5 detik**
- Bisa menampilkan **multiple gambar** sekaligus

#### Mengatur Urutan Carousel
- Gunakan **Order Index** untuk mengatur urutan
- Contoh: Order 1, 2, 3, 4 akan tampil berurutan

---

### 5. Mengelola Informasi/Pengumuman

#### Menambah Informasi
1. Klik menu **Informasi** di sidebar
2. Klik tombol **+ Tambah Informasi**
3. Isi form:
   - **Judul**: Judul pengumuman
   - **Isi**: Konten informasi
   - **Kategori**: Jenis informasi (Pengumuman/Berita/Event)
   - **Gambar**: Upload gambar pendukung (opsional)
   - **Video URL**: Link video terkait (opsional)
   - **Is Active**: Centang untuk publish
4. Klik **Simpan**

> 📝 **Note**: Fitur ini untuk data informasi, belum ditampilkan di display utama (untuk pengembangan future).

---

### 6. Mengelola Background Display

#### Mengatur Background
1. Klik menu **Background** di sidebar
2. Klik tombol **+ Tambah Background**
3. Isi form:
   - **Background Image**:
     - **Upload File**: Pilih gambar (max 10MB)
     - **ATAU Image URL**: Paste URL gambar
   - **Position**: Posisi gambar
     - `center` (tengah)
     - `top` (atas)
     - `bottom` (bawah)
     - `left` (kiri)
     - `right` (kanan)
   - **Is Active**: Centang untuk mengaktifkan
4. Klik **Simpan**

#### Tips Background
- **Hanya 1 background aktif** di display
- Ukuran ideal: 1920x1080px atau lebih besar
- Gunakan gambar dengan kontras rendah agar teks tetap terbaca
- Jika tidak ada background, akan muncul gradient biru default

---

### 7. Pengaturan Header (Settings)

#### Mengubah Header Display
1. Klik menu **Settings** di sidebar
2. Edit pengaturan yang tersedia:
   - **Header Title**: Judul utama display
     - Default: "DISPLAY INFORMASI - SOLO TECHNOPARK"
   - **Header Subtitle**: Alamat/subtitle
     - Default: "Jl. Slamet Riyadi No. 582, Surakarta, Jawa Tengah 57143"
3. Klik **Update**

> 💡 **Tips**: Gunakan `\n` untuk line break di subtitle

---

## 📺 Panduan Penggunaan Display

### Akses Display
Buka browser dan akses: `http://localhost:8000/`

### Komponen Display

#### 1. Header (Bagian Atas)
- **Kiri**: Tanggal dan hari (update otomatis)
- **Tengah**: Judul dan alamat Solo Technopark
- **Kanan**: Jam (update setiap detik)

#### 2. Jadwal Kegiatan (Kiri)
- Menampilkan tabel jadwal dengan kolom:
  - Tanggal
  - Waktu
  - Agenda
  - Lokasi
- **Auto-scroll** infinite loop
- Hover mouse untuk pause scroll

#### 3. Video YouTube (Kanan Atas)
- Autoplay dengan mute
- Loop otomatis
- Jika tidak ada video: tampil placeholder

#### 4. Carousel Gambar (Kanan Bawah)
- Auto-rotate setiap 5 detik
- Navigasi manual dengan arrow kiri/kanan
- Indicator dots di bawah
- Caption muncul di bawah gambar

### Fitur Display
- ✅ **Responsive**: Menyesuaikan ukuran layar
- ✅ **Real-time**: Jam dan tanggal update otomatis
- ✅ **Auto-refresh**: Tidak perlu reload manual
- ✅ **Full-screen**: Tekan F11 untuk mode full screen

---

## 🔧 Tips & Troubleshooting

### Tips Umum

#### Untuk Admin
1. **Backup data** secara berkala
2. **Test konten** sebelum set active
3. **Gunakan gambar berkualitas** tapi tidak terlalu besar
4. **Cek video YouTube** bisa di-embed sebelum upload
5. **Atur jadwal** berdasarkan tanggal terdekat

#### Untuk Display
1. **Gunakan browser modern** (Chrome/Firefox/Edge terbaru)
2. **Full screen mode** (F11) untuk pengalaman terbaik
3. **Disable screensaver** di komputer display
4. **Auto-start browser** saat komputer nyala
5. **Bookmark URL** display untuk akses cepat

---

### Troubleshooting

#### ❌ Video YouTube Tidak Muncul
**Penyebab**: Video tidak mengizinkan embedding

**Solusi**:
1. Cek video di YouTube → Share → Embed
2. Jika tidak bisa, gunakan video alternatif
3. Lihat daftar video yang pasti bisa di `YOUTUBE_EMBED_GUIDE.md`

#### ❌ Gambar Tidak Muncul
**Penyebab**: Storage link belum dibuat

**Solusi**:
```bash
php artisan storage:link
```

#### ❌ Jadwal Tidak Auto-scroll
**Penyebab**: JavaScript error atau data kosong

**Solusi**:
1. Buka Console browser (F12)
2. Cek error JavaScript
3. Pastikan ada minimal 1 jadwal
4. Clear cache browser (Ctrl+Shift+Del)

#### ❌ Display Tidak Update
**Penyebab**: Cache browser

**Solusi**:
- Hard refresh: `Ctrl + Shift + R` atau `Ctrl + F5`
- Clear cache dan reload

#### ❌ Lupa Password Admin
**Solusi**:
```bash
php artisan tinker
$user = App\Models\User::first();
$user->password = bcrypt('password_baru');
$user->save();
```

---

## 📞 Bantuan Lebih Lanjut

### Dokumentasi Teknis
- `README.md` - Dokumentasi instalasi dan fitur
- `SETUP.md` - Panduan setup cepat
- `CHANGELOG.md` - Riwayat perubahan
- `YOUTUBE_EMBED_GUIDE.md` - Panduan khusus YouTube

### Kontak Support
Untuk bantuan teknis, hubungi:
- **Email**: support@solotechnopark.id
- **Website**: https://solotechnopark.id

---

## 📝 Checklist Harian Admin

### Setiap Hari
- [ ] Cek jadwal hari ini sudah benar
- [ ] Pastikan video masih bisa diputar
- [ ] Cek carousel gambar up-to-date
- [ ] Monitor display berjalan normal

### Setiap Minggu
- [ ] Update jadwal minggu depan
- [ ] Hapus jadwal yang sudah lewat
- [ ] Backup database
- [ ] Cek storage space

### Setiap Bulan
- [ ] Review dan arsip data lama
- [ ] Update background jika perlu
- [ ] Cek performa aplikasi
- [ ] Update konten informasi

---

**Selamat menggunakan Display Informasi Solo Technopark!** 🎉

Dibuat dengan ❤️ untuk Solo Technopark
