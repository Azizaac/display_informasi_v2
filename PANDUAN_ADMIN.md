# 📖 Panduan Singkat Display Informasi Solo Technopark

Dokumen ini panduan praktis untuk admin (Sekretariat) dalam mengelola konten pada layar Display Informasi.

---

## 🌐 Cara Akses

### 1. Menampilkan Informasi (Layar Utama)
Untuk melihat tampilan yang muncul di layar TV/Monitor:
1. Buka browser (Chrome/Edge/Firefox).
2. Ketik alamat: `http://localhost:8000/`
   
![Tampilan Layar Utama](docs/img/display_home.png)

### 2. Mengatur Konten (Halaman Admin)
Untuk masuk ke halaman pengaturan:
1. Buka browser, ketik: `http://localhost:8000/admin`
2. Masukkan email dan password berikut:
   - **Email**: `admin@admin.com`
   - **Password**: `password`
3. Klik **Login**.

![Halaman Login Admin](docs/img/login_page.png)

---

## 👨‍💼 Cara Mengatur Konten

### 1️⃣ Menambah Jadwal Kegiatan
Menampilkan daftar acara/agenda pada tabel berjalan (running text/scroll).

1. Klik menu **Jadwal** di sidebar kiri.
2. Klik tombol **+ Tambah Jadwal**.
   
   ![Tombol Tambah Jadwal](docs/img/jadwal_menu.png)

3. Isi data kegiatan:
   - **Tanggal**: Pilih tanggal acara.
   - **Waktu**: Masukkan jam pelaksanaan (contoh: `09:00 - 11:00`).
   - **Agenda**: Nama kegiatan (contoh: `"Workshop AI"`).
   - **Lokasi**: Tempat pelaksanaan.
4. Klik **Simpan**.

![Form Tambah Jadwal](docs/img/add_schedule.png)

### 2️⃣ Menambah Video YouTube
Menampilkan video dari YouTube di layar sebelah kanan atas.

1. Klik menu **Video**.
2. Klik tombol **+ Tambah Video**.
3. **Copy link video** dari YouTube (contoh: `https://www.youtube.com/watch?v=xxxxx`).
   > ⚠️ **Penting**: Pastikan video bisa di-embed (Boleh dishare/ditempel di web lain). Caranya: Di YouTube klik *Share* → *Embed*. Jika muncul kode, berarti aman.
4. **Paste** link tersebut di kolom **Video URL**.
5. Centang **Is Active** agar video langsung muncul.
6. Klik **Simpan**.

![Form Tambah Video](docs/img/add_video.png)

### 3️⃣ Menambah Gambar Slideshow (Carousel)
Menampilkan gambar slide bergantian di layar kanan bawah.

1. Klik menu **Carousel**.
2. Klik tombol **+ Tambah Carousel**.
3. **Upload Gambar**: Pilih gambar dari komputer.
   > 💡 **Tips**: Gunakan gambar landscape ukuran **1920x1080 px** agar tampilan maksimal.
4. **Order Index**: Isi angka urutan (1, 2, 3...) untuk menentukan gambar mana yang muncul duluan.
5. Centang **Is Active**.
6. Klik **Simpan**.

![Form Tambah Carousel](docs/img/add_carousel.png)

### 4️⃣ Mengubah Background Layar
Mengganti gambar latar belakang seluruh layar.

1. Klik menu **Background**.
2. Klik tombol **+ Tambah Background**.
3. **Upload Gambar Background**.
4. **Posisi**: Pilih posisi gambar (tengah/atas/bawah) - biasanya pilih `center`.
5. Centang **Is Active**.
   > 📝 **Catatan**: Hanya boleh ada **1 background** yang aktif. Jika menambah baru yang aktif, background lama otomatis mati.
6. Klik **Simpan**.

![Form Tambah Background](docs/img/add_background.png)

### 5️⃣ Mengubah Judul Header
Mengganti teks judul besar di bagian atas layar.

1. Klik menu **Settings**.
2. Ubah isian:
   - **Header Title**: Judul Utama (misal: "SOLO TECHNOPARK").
   - **Header Subtitle**: Sub-judul (misal: "Kawasan Sains dan Teknologi").
   - **Running Text**: Teks berjalan di bawah (jika ada fiturnya).
3. Klik **Update**.

![Halaman Settings](docs/img/settings.png)

---

## 📺 Penjelasan Tampilan Layar

Layar informasi terbagi menjadi 4 bagian utama:

1. **Header (Atas)**: Menampilkan Logo, Jam Digital, Tanggal, dan Judul.
2. **Kiri**: **Jadwal Kegiatan** yang berjalan otomatis (scrolling up).
3. **Kanan Atas**: **Video YouTube** yang diputar berulang (loop).
4. **Kanan Bawah**: **Slideshow Gambar** (Carousel) info/poster yang berganti tiap 5 detik.

![Penjelasan Layout Layar](docs/img/display_layout_explanation.png)
