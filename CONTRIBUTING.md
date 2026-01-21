# Contributing to Display Informasi

Terima kasih atas minat Anda untuk berkontribusi pada project Display Informasi! 🎉

## Cara Berkontribusi

### 1. Fork Repository

Klik tombol "Fork" di pojok kanan atas halaman repository.

### 2. Clone Fork Anda

```bash
git clone https://github.com/your-username/display-informasi-v2.git
cd display-informasi-v2
```

### 3. Setup Development Environment

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
npm run dev
```

### 4. Create Feature Branch

```bash
git checkout -b feature/nama-fitur-anda
```

### 5. Make Your Changes

- Tulis kode yang clean dan readable
- Follow Laravel best practices
- Tambahkan komentar jika diperlukan
- Test perubahan Anda

### 6. Commit Changes

```bash
git add .
git commit -m "Add: deskripsi singkat perubahan"
```

**Commit Message Format:**
- `Add:` untuk fitur baru
- `Fix:` untuk bug fixes
- `Update:` untuk update fitur existing
- `Refactor:` untuk refactoring code
- `Docs:` untuk perubahan dokumentasi

### 7. Push to Your Fork

```bash
git push origin feature/nama-fitur-anda
```

### 8. Create Pull Request

1. Buka repository Anda di GitHub
2. Klik "Pull Request"
3. Pilih branch Anda
4. Tulis deskripsi yang jelas tentang perubahan Anda
5. Submit Pull Request

## Coding Standards

### PHP/Laravel

- Follow PSR-12 coding standard
- Use meaningful variable and function names
- Add docblocks untuk functions
- Keep functions small and focused

### JavaScript

- Use ES6+ syntax
- Use `const` dan `let`, hindari `var`
- Add comments untuk logic yang complex
- Keep functions pure when possible

### CSS

- Use BEM naming convention jika memungkinkan
- Organize styles logically
- Avoid !important unless absolutely necessary
- Use CSS variables untuk colors dan spacing

### Blade Templates

- Keep templates clean dan readable
- Extract reusable components
- Use proper indentation
- Avoid inline styles

## Testing

Sebelum submit PR, pastikan:

- [ ] Code berjalan tanpa error
- [ ] Semua fitur CRUD berfungsi dengan baik
- [ ] Responsive di berbagai ukuran layar
- [ ] Browser compatibility (Chrome, Firefox, Edge)
- [ ] No console errors

## Reporting Bugs

Jika menemukan bug, buat issue dengan informasi:

1. **Deskripsi bug** - Jelaskan apa yang terjadi
2. **Steps to reproduce** - Cara reproduce bug
3. **Expected behavior** - Apa yang seharusnya terjadi
4. **Screenshots** - Jika memungkinkan
5. **Environment** - OS, Browser, PHP version, etc.

## Feature Requests

Punya ide fitur baru? Buat issue dengan:

1. **Deskripsi fitur** - Jelaskan fitur yang diinginkan
2. **Use case** - Kapan fitur ini akan berguna
3. **Mockups** - Jika ada design/mockup

## Questions?

Jika ada pertanyaan, silakan:
- Buat issue dengan label "question"
- Contact maintainers

---

**Terima kasih atas kontribusi Anda! 🙏**
