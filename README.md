# Todo project (backend)


A Laravel-based project using PostgreSQL, tested with GitHub Actions.

---

## Project Status
- ✅ Continuous Integration (CI) with GitHub Actions
- ✅ Database: PostgreSQL 16
- ✅ Automated Tests with PHPUnit

---

## Setup & Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/aaminhashemi/todo_backend.git
cd todo_backend
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Set Up Environment Variables
Copy the example `.env` file and update it:
```bash
cp .env.example .env
```
Update database settings in `.env` (if different):
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

### 5️⃣ Run Database Migrations
```bash
php artisan migrate
```

---

## Running Tests
Run unit and feature tests using:
```bash
php artisan test
```
For detailed output:
```bash
php artisan test --coverage
```

---

## CI/CD & GitHub Actions
This project uses **GitHub Actions** to automate testing. The workflow file is located at:
```
.github/workflows/backend.yml
```
You can view test results in the [Actions Tab](https://github.com/aaminhashemi/todo_backend/actions).

---
