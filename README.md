
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
git clone https://github.com/sazzadhossainshifat/softve.git
cd softve
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

DB_DATABASE=softvence_exam
DB_USERNAME=root
DB_PASSWORD=
```

---


### 6️⃣ Run Migrations

```bash
php artisan migrate
```

---

### 8️⃣ Start Development Server

```bash
php artisan serve
```

Open your browser and go to:

```
http://localhost:8000




