# Laravel Roles & Permissions (spatie/laravel-permission)

This project uses **[spatie/laravel-permission](https://github.com/spatie/laravel-permission)** to manage roles and permissions in a Laravel application.  
It provides an **Admin Panel** where you can create roles, permissions, and assign them to users.

---

## 🚀 Features
- Role-based access control (RBAC)
- Permission-based access control
- Admin panel for managing:
    - Roles
    - Permissions
    - Assigning roles/permissions to users
- Middleware protection for routes
- Blade / Vue / Inertia support

---

## 🛠 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/tanayroy9/laravel-role-permission.git
   cd laravel-role-permission
## Install dependencies:
- composer install
- npm install

## Copy .env and update database details:  
- cp .env.example .env
- php artisan key:generate

## Update .env with your DB details:
- DB_DATABASE=laravel_roles
- DB_USERNAME=root
- DB_PASSWORD=

## Import Database from SQL Script
- Open your MySQL / phpMyAdmin
- sql-script/laravel_role_permissions.sql

## Default Login
- Email: admin@example.com
- Password: 12345678
