# Quick Setup Guide

Panduan singkat untuk setup project Display Informasi.

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL atau SQLite

## Quick Start

```bash
# 1. Clone repository
git clone https://github.com/yourusername/display-informasi-v2.git
cd display-informasi-v2

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database
# Edit .env untuk konfigurasi database
php artisan migrate

# 5. Create storage link
php artisan storage:link

# 6. Build assets
npm run build

# 7. Run application
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

## Default URLs

- **Display:** http://localhost:8000/
- **Admin Panel:** http://localhost:8000/admin

## Troubleshooting

### Permission Error
```bash
chmod -R 775 storage bootstrap/cache
```

### Storage Link Error
```bash
php artisan storage:link
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

Untuk dokumentasi lengkap, lihat [README.md](README.md)
