# AGK Inventory

**AGK Inventory** is a web-based warehouse inventory management system for **Artha Griya Kencana**. It helps warehouse teams manage item master data, suppliers, stock movement, transaction approvals, and stock reports from a centralized admin panel.

The application is built with Laravel and Filament, providing a clean CMS-style interface for warehouse operations. It is designed to reduce manual stock tracking errors, improve accountability for incoming and outgoing goods, and give warehouse teams better visibility into available inventory.

## Key Features

- **Inventory Master Data**: Manage goods, item categories, units, and current stock quantities.
- **Supplier Management**: Store supplier names, phone numbers, and addresses for purchasing and warehouse reference.
- **Incoming Goods Workflow**: Record incoming goods as pending transactions before they affect stock.
- **Outgoing Goods Workflow**: Record outgoing goods requests while showing the currently available stock.
- **Transaction Confirmation**: Authorized warehouse users can confirm incoming or outgoing transactions, automatically updating stock levels.
- **Stock Movement Reports**: View confirmed incoming and outgoing goods history in separate report pages.
- **Stock Report PDF**: Generate printable PDF reports for current item stock.
- **Dashboard Overview**: Display key operational summaries such as total items, suppliers, stock quantity, and users.
- **Role-Based Access Control**: Restrict access and actions based on warehouse roles using Spatie Permission.
- **Admin Panel**: Filament-powered CMS for managing users, master data, transactions, and reports.

## Workflow Overview

AGK Inventory separates daily warehouse activity into clear operational steps:

1. **Admin Gudang** manages master data such as goods, categories, units, suppliers, and users.
2. Warehouse users create **pending incoming goods** or **pending outgoing goods** transactions.
3. Authorized roles such as **Kepala Gudang** or **Staff Gudang** review and confirm the transactions.
4. Once confirmed, the transaction is moved into the official report table.
5. The item stock is automatically increased for incoming goods or decreased for outgoing goods.
6. Warehouse teams can monitor stock and print PDF stock reports from the reporting page.

## User Roles

- **Admin Gudang**: Manages master data, users, suppliers, and pending transaction records.
- **Kepala Gudang**: Reviews warehouse stock and confirms incoming or outgoing goods transactions.
- **Staff Gudang**: Handles warehouse stock reports and transaction confirmation workflows.
- **Staff Purchasing**: Manages supplier-related data.
- **Kepala Operasional**: Available as an operational management role.

<!-- ## Screenshots

Screenshots can be added here after the application screens are captured.

| Dashboard | Data Barang | Laporan Stok |
| :-------: | :---------: | :----------: |
| Coming soon | Coming soon | Coming soon | -->

## Tech Stack

- **Framework**: Laravel 11
- **Admin Panel**: Filament 3
- **Authorization**: Spatie Laravel Permission
- **PDF Generation**: Barryvdh Laravel Dompdf
- **Database**: MySQL
- **Frontend Tooling**: Vite
- **Language**: PHP 8.2+

## Main Modules

- **Data Barang**: Item records with category, unit, and stock information.
- **Jenis Barang**: Item category management.
- **Satuan Barang**: Unit management for inventory items.
- **Supplier**: Supplier contact and address data.
- **Barang Masuk Pending**: Incoming goods transactions waiting for confirmation.
- **Barang Keluar Pending**: Outgoing goods transactions waiting for confirmation.
- **Laporan Barang Masuk**: Confirmed incoming goods history.
- **Laporan Barang Keluar**: Confirmed outgoing goods history.
- **Laporan Stok**: Current stock overview with PDF export.
- **Pengguna**: User and role management.

## Prerequisites

Make sure your local environment has:

- **PHP**: ^8.2
- **Composer**
- **Node.js & npm**
- **MySQL** or another Laravel-supported database

## Installation & Setup

Follow these steps to run the project locally:

1. **Clone the Repository**

    ```bash
    git clone https://github.com/munovrizall/agk-inventory.git
    cd agk-inventory
    ```

2. **Install PHP Dependencies**

    ```bash
    composer install
    ```

3. **Install JavaScript Dependencies**

    ```bash
    npm install
    ```

4. **Create Environment File**

    ```bash
    cp .env.example .env
    ```

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Configure Database**

    Update the database configuration in `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=agk_inventory
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. **Run Migrations and Seeders**

    ```bash
    php artisan migrate --seed
    ```

8. **Build Frontend Assets**

    ```bash
    npm run build
    ```

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

The admin panel is available at:

```text
http://127.0.0.1:8000/admin
```

## Default Login

After running the database seeders, you can use the default admin account:

```text
Email: admin@email.com
Password: admin
```

Another seeded warehouse user is also available:

```text
Email: jale@email.com
Password: jale
Role: Kepala Gudang
```

## Development

For local development with Vite:

```bash
npm run dev
```

In another terminal, run:

```bash
php artisan serve
```

## Testing

Run the test suite with:

```bash
php artisan test
```

## Repository

[https://github.com/munovrizall/agk-inventory](https://github.com/munovrizall/agk-inventory)
