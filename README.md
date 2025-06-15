
# 📚 Laravel Course Management System

A Laravel-based Course Management System where you can create courses, add dynamic modules and content including videos, descriptions, and more.

---

## 🚀 Features

- Course creation with title, description, and category.
- Dynamic module support (add/remove).
- Content inside modules: title, video file/url, and duration.
- Clean UI using Bootstrap 5.

---

## 🛠️ Installation Guide

Follow these steps to install and run the project on your local machine.

---

### 1️⃣ Requirements

Make sure you have the following installed:

- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm (for assets)
- Laravel 10+

---

### 2️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

---

### 3️⃣ Install Dependencies

```bash
composer install
npm install
```

---

### 4️⃣ Create `.env` File

Copy the `.env.example` file and set your environment variables:

```bash
cp .env.example .env
```

Update the following fields in `.env`:

```env
APP_NAME=LaravelCMS
APP_URL=http://localhost:8000

DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

---

### 5️⃣ Generate Application Key

```bash
php artisan key:generate
```

---

### 6️⃣ Run Migrations

```bash
php artisan migrate
```

---

### 7️⃣ Link Storage (For File Uploads)

```bash
php artisan storage:link
```

---

### 8️⃣ Start Development Server

```bash
php artisan serve
```

Open your browser and go to:

```
http://localhost:8000
```

---

### 9️⃣ Compile Frontend Assets (Optional)

```bash
npm run dev
```

---

### ✅ Sample Admin Access (if applicable)

```env
Email: admin@example.com
Password: password
```

---

### 📁 Folder Structure Overview

- `/app/Models` — Contains `Course`, `Module`, `Content` models
- `/resources/views` — Blade views
- `/public/storage/videos` — Uploaded videos
- `/routes/web.php` — Routes
- `/database/migrations` — Migrations

---

### 📷 Screenshots

_Add screenshots here if available to show form UI, database results, etc._

---

### 🤝 Contributing

Feel free to fork and submit pull requests. For major changes, open an issue first to discuss.

---

### 📄 License

MIT License — free to use and modify.
