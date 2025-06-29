# 📦 Laravel Inventory & Financial System

A simple Inventory System with:
- ✅ Product Management
- ✅ Stock Management
- ✅ Sales with Discount & VAT
- ✅ Auto-updated Accounting Journals
- ✅ Date-filterable Financial Reports
- ✅ Custom Auth (No Breeze, No Jetstream)
- ✅ Pure Laravel Blade

---

## 🚀 **Features**

- **Product Module**: Add products with purchase/sell prices & opening stock.
- **Stock Updates**: Stock auto-deducted on sale, with oversell prevention.
- **Sale Module**: Create sales with discount & VAT, auto-calculate due.
- **Accounting Journal**: Tracks Sales, Discount, VAT, Payment per sale.
- **Reports**: Filter by date, see total sales, total paid, due & profit.
- **Custom Auth**: Basic Register/Login/Logout with Blade — no starter kit bloat.

---

## ⚙️ **Requirements**

- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Node.js & npm (for Laravel Mix if needed)

---

## 🛠️ **Installation**

```bash
# 1️⃣ Clone the repo
git clone https://github.com/yourusername/inventory-system.git
cd inventory-system

# 2️⃣ Install dependencies
composer install

# 3️⃣ Copy .env & generate key
cp .env.example .env
php artisan key:generate

# 4️⃣ Update .env with your DB credentials
# Example:
# DB_DATABASE=inventory_system
# DB_USERNAME=root
# DB_PASSWORD=

# 5️⃣ Run migrations
php artisan migrate

# 6️⃣ (Optional) Install frontend assets
npm install && npm run dev

# 7️⃣ Serve it
php artisan serve
