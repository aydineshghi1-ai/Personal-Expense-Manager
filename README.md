# Personal Expense Manager

A simple personal expense management system built with pure PHP and a basic MVC architecture.

This project was created as a learning and portfolio project to practice PHP, PDO, MariaDB, MVC architecture, authentication, CRUD operations, data validation, security, and Git.

---

## Features

- User registration and login
- User authentication and session management
- Category management
  - Create category
  - Edit category
  - Delete category
  - View categories
- Transaction management
  - Create transaction
  - Edit transaction
  - Delete transaction
  - View transactions
- Income and expense tracking
- Transaction search and filtering
- Pagination
- Dashboard
- Monthly financial reports
- Receipt upload
- Secure receipt access
- User-level authorization
- CSRF protection
- XSS protection
- SQL injection protection
- Input validation
- Responsive retro-style user interface

---

## Tech Stack

- PHP
- PDO
- MariaDB / MySQL
- HTML
- Tailwind CSS
- JavaScript
- Git
- GitHub

---

## Architecture

This project uses a simple MVC architecture.

```text
User
 |
 v
Request
 |
 v
Controller
 |
 +--> Model ---> Database
 |
 v
View
 |
 v
Response
```

### Model

Responsible for database queries and data access.

### Controller

Responsible for handling requests, basic validation, communication with models, and redirects.

### View

Responsible for displaying data and the user interface.

The project intentionally avoids complex architectural layers such as Service, Repository, Dependency Injection Container, and Factory patterns in order to keep the MVC structure simple and educational.

---

## Project Structure

```text
personal-expense-manager/
|
+-- assets/
|   +-- css/
|   +-- cursors/
|
+-- auth/
|   +-- login.php
|   +-- logout.php
|   +-- register.php
|
+-- categories/
|   +-- create.php
|   +-- delete.php
|   +-- edit.php
|   +-- index.php
|
+-- config/
|   +-- database.php
|
+-- controllers/
|   +-- AuthController.php
|   +-- CategoryController.php
|   +-- DashboardController.php
|   +-- ReportController.php
|   +-- TransactionController.php
|
+-- includes/
|   +-- auth.php
|   +-- functions.php
|
+-- models/
|   +-- Category.php
|   +-- Transaction.php
|   +-- User.php
|
+-- reports/
|   +-- monthly.php
|
+-- transactions/
|   +-- create.php
|   +-- delete.php
|   +-- edit.php
|   +-- index.php
|   +-- receipt.php
|
+-- views/
|   +-- categories/
|   +-- dashboard/
|   +-- reports/
|   +-- transactions/
|
+-- dashboard.php
+-- database.sql
+-- package.json
+-- package-lock.json
+-- .env.example
+-- .gitignore
+-- README.md
```

---

## Database

The project uses MariaDB / MySQL.

Main tables:

- `users`
- `categories`
- `transactions`

The database structure is available in:

```text
database.sql
```

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/aydineshghi1-ai/Personal-Expense-Manager.git
```

### 2. Enter the project directory

```bash
cd Personal-Expense-Manager
```

### 3. Create the database

Create a database named:

```text
personal_expense_manager
```

Then import `database.sql` into MariaDB / MySQL.

### 4. Configure the database

Update the database configuration in:

```text
config/database.php
```

Example:

```php
$host = 'localhost';
$dbname = 'personal_expense_manager';
$username = 'root';
$password = '';
```

Use your own database credentials if they are different.

---

## Running the Project

The project can be run using PHP's built-in development server.

From the directory containing the project folder:

```bash
php -S localhost:8000 -t personal-expense-manager
```

Then open:

```text
http://localhost:8000/auth/login.php
```

---

## Tailwind CSS

The project uses Tailwind CSS for styling.

Install dependencies:

```bash
npm install
```

Run Tailwind in watch mode:

```bash
npx @tailwindcss/cli -i ./assets/css/input.css -o ./assets/css/output.css --watch
```

---

## Security

Security was considered throughout the project.

Implemented protections include:

- Password hashing using PHP password hashing functions
- Password verification using `password_verify()`
- Prepared statements with PDO
- User-level authorization
- IDOR protection
- CSRF token validation
- XSS protection using output escaping
- Input validation
- File upload validation
- MIME type validation
- File size restrictions
- Randomized receipt filenames
- Private receipt storage outside the public document root
- Session regeneration after successful login

---

## Learning Goals

This project was built to practice:

- PHP fundamentals
- Object-Oriented PHP
- MVC architecture
- PDO and database interaction
- CRUD operations
- Authentication and authorization
- Session management
- Form handling
- File uploads
- Security fundamentals
- Tailwind CSS
- Git and GitHub

---

## Future Improvements

Possible future improvements:

- Better error handling and user-friendly error messages
- Improved session cookie configuration
- Login rate limiting
- More advanced reporting
- Data visualization
- Export transactions to CSV
- Improved UI and accessibility
- Automated tests

---

## Status

This project is a completed learning/portfolio project.

The main functionality, security checks, responsive UI, and Git/GitHub workflow have been implemented.
