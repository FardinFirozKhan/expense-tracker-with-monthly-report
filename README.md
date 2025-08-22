# 🧾 Laravel Expense Tracker

A user-friendly web application built with Laravel for managing personal expenses. Track your spending, categorize transactions, and visualize your financial habits with intuitive reports and charts.

---

## 🚀 Features

- **User Authentication**: Secure login and registration using Laravel's built-in authentication system.
- **Expense Management**: Add with categories and amounts.
- **Monthly Reports**: View categorized expenses for the current month.
- **Visual Charts**: Interactive pie charts displaying expense distributions.
- **Responsive Design**: Optimized for both desktop and mobile devices.

---

## 📸 Demo

Watch the demo video showcasing the application's features:

👉 [Watch Demo](https://jam.dev/c/4c0e1f70-1731-4a1c-a6fb-7e83f6b36931)

---

## 🛠️ Installation

### Prerequisites

Ensure you have the following installed:

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or SQLite

### Steps

1. **Clone the repository**:

   ```bash
   git clone https://github.com/yourusername/expense-tracker.git
   cd expense-tracker

2. **Install PHP dependencies**:

   ```bash
   composer install

3. **Set up environment variables:**:

   ```bash
   cp .env.example .env
4. **Generate the application key:**

   ```bash
   php artisan key:generate
 
5. **Run migrations and seed the database:**

   ```bash
   php artisan migrate --seed

6. **Serve the application::**

   ```bash
   php artisan serve

## 🔐 Authentication

After setting up the application, you can register a new account or log in with the following credentials:

- **Email:** `admin@example.com`
- **Password:** `123456789`

---

## 📊 Monthly Report

The monthly report page provides:

- A table listing each expense category with its total amount.
- A pie chart visualizing the expense distribution by category.

> If no expenses are recorded, the chart will display a "No data found" message.



