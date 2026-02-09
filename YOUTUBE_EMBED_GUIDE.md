# Panduan Video YouTube yang Bisa Di-Embed

## Masalah Umum
Banyak video YouTube **tidak bisa di-embed** karena pemilik video menonaktifkan fitur embedding.

## Cara Cek Video Bisa Di-Embed atau Tidak

### Metode 1: Test di test-youtube.html
1. Buka `http://localhost:8000/test-youtube.html`
2. Edit file `public/test-youtube.html`
3. Ganti video ID di Test 1 dengan video yang mau dicoba
4. Refresh browser
5. Kalau muncul "Video tidak tersedia" = tidak bisa di-embed

### Metode 2: Cek di YouTube Langsung
1. Buka video di YouTube
2. Klik **Share** → **Embed**
3. Kalau muncul kode `<iframe>` = bisa di-embed ✅
4. Kalau muncul pesan error = tidak bisa di-embed ❌

## Video YouTube yang PASTI Bisa Di-Embed

Gunakan salah satu dari video ini (sudah ditest):

```
https://www.youtube.com/watch?v=jNQXAC9IVRw  (Me at the zoo - video pertama YouTube)
https://www.youtube.com/watch?v=dQw4w9WgXcQ  (Rick Astley - Never Gonna Give You Up)
https://www.youtube.com/watch?v=9bZkp7q19f0  (Gangnam Style)
https://www.youtube.com/watch?v=kJQP7kiw5Fk  (Despacito)
```

## Cara Update Video di Admin Panel

1. Login ke `http://localhost:8000/admin`
2. Pilih menu **Video**
3. Edit video yang aktif
4. Paste URL YouTube yang sudah dicek bisa di-embed
5. Centang **Is Active**
6. Save

## Tips Mencari Video yang Bisa Di-Embed

✅ **Video yang biasanya bisa:**
- Video official dari channel besar (Vevo, official artist)
- Video dengan banyak views (biasanya owner mengizinkan embed)
- Video Creative Commons
- Video educational/tutorial

❌ **Video yang biasanya tidak bisa:**
- Video musik dari label tertentu
- Video dengan copyright ketat
- Video pribadi/private
- Video dengan pembatasan regional

## Alternatif Solusi

Jika video yang diinginkan tidak bisa di-embed:
1. **Download video** → upload ke server → gunakan sebagai file lokal
2. **Gunakan video alternatif** dengan konten serupa yang bisa di-embed
3. **Hubungi pemilik video** untuk request izin embedding
