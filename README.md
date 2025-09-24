# 🚀 Laravel Role & Permission UI
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sarker/laravel-role-permission-ui.svg?style=flat-square)](https://packagist.org/packages/sarker/laravel-role-permission-ui)
[![Total Downloads](https://img.shields.io/packagist/dt/sarker/laravel-role-permission-ui.svg?style=flat-square)](https://packagist.org/packages/sarker/laravel-role-permission-ui)
[![License](https://img.shields.io/github/license/sarker/laravel-role-permission-ui.svg?style=flat-square)](LICENSE)


A simple **[Spatie Laravel Permission](https://github.com/spatie/laravel-permission)** powered **Role & Permission UI**.  
It’s got everything you need already built in — and you get to **pick your favorite UI stack**:

- 🎨 **Bootstrap** – The good old classic. Solid, reliable, familiar.  
- 🎯 **Tailwind CSS** – Minimal, modern, and super customizable.  
- ⚡ **Inertia.js + React** – SPA vibes with smooth UX.  

---

## ✨ Features

- 🔑 Full **User / Role / Permission** management out of the box  
- 🎛️ Switch UI stack with **one simple artisan command**  
- 📦 Easy install with **Composer**  
- 🛠️ Extensible and developer-friendly  

---

## ⚡ Installation

### Step 1: Require the package
Use Composer to add the package to your project.
```composer require sarker/laravel-role-permission-ui```

### Step 2: Run the installer
After the package is installed, run the Artisan command to publish the necessary files for your chosen UI stack.

```php artisan role-permission-ui:install```

You will be prompted to select your preferred UI framework. The installer will then automatically publish the correct controllers, views, and routes.

---

## ⚙️ Dependencies & Setup

Before installing this package, you'll need to set up a few core dependencies in your Laravel project (You might already have done this).

### Step 1: Install Laravel
If you haven't already, make sure you have a fresh Laravel project set up.

```composer create-project laravel/laravel my-project-name```

### Step 2: Install Spatie Laravel Permission
This package is built on top of the powerful Spatie Laravel Permission package. You must install it first.

```composer require spatie/laravel-permission```

### Step 3: Configure Your Database
Connect your database and run the migrations. This will create the necessary `roles` and `permissions` tables.

```php artisan migrate```

---

## 🎨 Project Dependencies by UI

Depending on the UI you choose during installation, you might need to handle a few front-end dependencies.

-   **Bootstrap**: The package's views use a standard CDN, so you don't need to install anything extra. Everything is handled out-of-the-box.

-   **Tailwind**: For modern Laravel versions (v9+), Tailwind CSS is included by default, so no extra steps are required. If you're on an older version or need to install it explicitly, you can do so with this command:

    "npm install -D tailwindcss postcss autoprefixer"

-   **Inertia + React**: The Inertia views also leverage Tailwind CSS, so the same rules as above apply.

---

## 🚀 Usage

Once the installation is complete, your chosen UI is ready to go. Simply navigate to the corresponding routes in your application's browser.

### Bootstrap
Access your user, role, and permission management dashboards.

-   `/bootstrap/roles`
-   `/bootstrap/permissions`
-   `/bootstrap/users`

### Tailwind
Access your user, role, and permission management dashboards.

-   `/tailwind/roles`
-   `/tailwind/permissions`
-   `/tailwind/users`

### Inertia + React
Access your user, role, and permission management dashboards.

-   `/inertia/roles`
-   `/inertia/permissions`
-   `/inertia/users`

---

## 🤝 Contributing

We welcome contributions! Please feel free to open an issue or submit a pull request if you find a bug or have a suggestion.

## 📄 License
