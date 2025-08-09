# Laravel TALL Stack + Filament Project

Proyek ini dibangun menggunakan Laravel dengan TALL Stack (Tailwind CSS, Alpine.js, Laravel, Livewire) dan Filament sebagai admin panel.

## 🚀 Tech Stack

-   **Laravel** - PHP Framework
-   **Tailwind CSS** - Utility-first CSS framework
-   **Alpine.js** - Lightweight JavaScript framework
-   **Livewire** - Full-stack framework untuk Laravel
-   **Filament** - Admin panel untuk Laravel

## 📋 Requirements

-   PHP >= 8.1
-   Composer
-   Node.js >= 16.x
-   NPM atau Yarn
-   MySQL/PostgreSQL/SQLite
-   Git

## 🛠️ Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/Fardan-Nurhidayat/pkm-kampung-kepiting.git
cd pkm-kampung-kepiting
```

### 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install Node.js dependencies:

```bash
npm install
# atau
yarn install
```

### 3. Environment Setup

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Database Configuration

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 5. Database Migration & Seeding

Jalankan migration:

```bash
php artisan migrate
```

Jalankan seeder (opsional):

```bash
php artisan db:seed
```

### 6. Storage Link

Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

### 7. Build Assets

Compile assets untuk development:

```bash
npm run dev
```

Atau untuk production:

```bash
npm run build
```

## 🏃‍♂️ Menjalankan Aplikasi

### Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

### Asset Development

Untuk development dengan hot reload:

```bash
npm run dev
```

## 📁 Struktur Direktori

```
project-name/
├── app/
│   ├── Filament/           # Filament resources, pages, widgets
│   ├── Http/
│   │   └── Livewire/       # Livewire components
│   ├── Models/             # Eloquent models
│   └── ...
├── resources/
│   ├── views/
│   │   └── livewire/       # Livewire views
│   ├── css/                # Tailwind CSS files
│   └── js/                 # Alpine.js components
├── database/
│   ├── migrations/
│   └── seeders/
└── ...
```

## 🎨 Base Color
- Primary Color : #D94336
- Secondary Color : ##FDF8F0
- Third Color : #3A5A40
- Text Color : #333333
- Background Primary : ##EDEFEF 

## 🔧 Konfigurasi

### Filament

Admin panel dapat diakses di `/admin`. Konfigurasi Filament dapat ditemukan di:

-   `config/filament.php`
-   `app/Providers/FilamentServiceProvider.php`

### Tailwind CSS

Konfigurasi Tailwind CSS dapat ditemukan di:

-   `tailwind.config.js`
-   `resources/css/app.css`

### Livewire

Konfigurasi Livewire dapat ditemukan di:

-   `config/livewire.php`

## 🚀 Deployment

### Production Build

```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Clear dan cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build assets
npm run build
```

### Environment Production

Pastikan untuk mengatur environment variables yang sesuai:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

## 📝 Development Guide

### Membuat Livewire Component

```bash
php artisan make:livewire ComponentName
```

### Membuat Filament Resource

```bash
php artisan make:filament-resource ModelName
```

### Membuat Filament Page

```bash
php artisan make:filament-page PageName
```

### Membuat Filament Widget

```bash
php artisan make:filament-widget WidgetName
```

## 🔍 Useful Commands

```bash
# Check error logs
/storage/logs

# Clear all cache
php artisan optimize:clear

# Run tests
php artisan test
```

## 🛡 Shield Install 
Shield Intsall 
```bash
php artisan shield:install
```

Atau 

```bash
php artisan shield:generate --all --ignore-existing-policies
```

```bash 
php artisan shield:super-admin --user=1
```



## 📦 Package Utama

-   `laravel/framework` - Laravel framework
-   `livewire/livewire` - Full-stack framework
-   `filamentphp/filament` - Admin panel
-   `tailwindcss` - CSS framework
-   `alpinejs` - JavaScript framework

## 🤝 Contributing

1. Fork repository
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 License

Proyek ini menggunakan [MIT License](LICENSE).

## 🐛 Bug Reports

Jika menemukan bug, silakan buat issue di [GitHub Issues](https://github.com/username/project-name/issues).

## 📞 Support

Untuk bantuan dan pertanyaan:

-   Email: fardannurhidayat07.stu@pnc.ac.id
-   Documentation: [Laravel](https://laravel.com/docs), [Livewire](https://livewire.laravel.com), [Filament](https://filamentphp.com/docs)

---

**Happy Coding! 🎉**
