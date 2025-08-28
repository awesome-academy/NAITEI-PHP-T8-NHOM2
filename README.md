# NAITEI-PHP-T8-NHOM2
# 🏀 Sportswear E-Commerce (Laravel 12)

## 👥 Members
- Trần Quang Huy
- Lê Công Hoài Nam
- Đặng Văn Quốc Bảo

---

## 📌 Features

### Authentication & Users
- Register, Login, Forgot Password (Laravel Authentication)
- Google Login (Laravel Socialite)
- Roles: **Admin / User**
- Authorization: **Policy / Gate**
- Localization: **English / Vietnamese**

### Admin
- CRUD: Categories, Products, Users (**Repository Pattern** for Category)
- Manage Orders: view details, change status (Cancel, Processing, Shipping)
- Dashboard with statistics
- Daily revenue report (cronjob + download)
- Notifications for new orders
- Shipping fee calculation service (Service Container + DI)
- Email notifications for order confirmation

### User
- Browse products (optimized queries, prevent **N+1**)
- Shopping cart: add / update / remove (database-backed)
- Place orders, view order history
- Manage shipping addresses
- Filter products (by category, price, name search)
- Review products after purchase
- Receive email updates for order status

### Developer Tools
- Seeder & Factory for sample data
- Custom Artisan Command:
  ```bash
  php artisan report:revenue --date=YYYY-MM-DD
  ```
- Mail logs at: `storage/logs/laravel.log`

---

## ⚙️ Requirements
- **Laravel** 12.25.0  
- **PHP** 8.4.10  
- **Composer** 2.8.10  
- **MySQL**  
- **Node.js** (>= 20 LTS) + **npm**  

---

## 🧭 Installation (Manual)

```bash
# 1) Clone repository

# 2) Install PHP dependencies
composer install

# 3) Environment & App Key
cp .env.example .env
php artisan key:generate

# 4) Database migration & seeding
php artisan migrate --seed

# 5) Install frontend dependencies (Vite)
npm install

# 6) Build assets
npm run build

# 7) Start development server
php artisan serve
```

---

## 📊 Cronjob & Reports

### Generate revenue report
```bash
php artisan report:revenue --date=YYYY-MM-DD
```
- If date has orders → returns total revenue.  
- If no orders on that date → revenue = 0.  

### View & Download report
- Go to `/admin/reports` → see list of reports → **Download**  

---

## 📧 Mail Testing
Check logs at:
```
storage/logs/laravel.log
```

---

## 🏗️ Architecture
- Category CRUD → **Repository Pattern**  
- Authorization → **Policy / Gate**  
- Shipping fee calculation → **Service Container + DI**  

---

## 🌐 Localization
- English (`en`)  
- Vietnamese (`vn`)  

---

## 🚀 Run
- php artisan serve  
