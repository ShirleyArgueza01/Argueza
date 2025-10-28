#  Sales Inventory System

##  Project Title
**Sales Inventory System**

---

## Description / Overview
The **Sales Inventory System** is a web-based application designed to help businesses manage products, categories, and transactions. It provides a dashboard that shows total products, total transactions, total sales, and a chart of daily sales. The system implements CRUD operations for products and categories, and records transactions that update inventory and sales totals.

---

## Objectives
- Build a functional sales inventory management system.
- Implement Create, Read, Update, Delete (CRUD) operations.
- Track and visualize daily sales and totals.
- Practice integrating front-end, back-end, and a relational database.

---

## Features / Functionality
- Dashboard overview with key metrics and charts.
- Product management: add, edit, delete, list.
- Category management: add, edit, delete, list.
- Transaction recording: create sales transactions and update inventory & totals.
- Search and filter products and transactions.
- Responsive layout suitable for desktops and mobile devices.

---
## Installation Instructions

Follow these steps to install and run the **Sales Inventory System** on your local machine:

1. **Clone or Download the Project**
   - If you are using Git, open your terminal or command prompt and run:
     ```bash
     git clone https://github.com/your-username/sales-inventory-system.git
     ```
   - Or simply **download** the ZIP file from your repository and extract it to your desired folder.

2. **Set Up Local Server**
   - Install [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/).
   - Move the project folder to the server directory:
     - For XAMPP: `D:\xampp\htdocs\`
     - For WAMP: `D:\wamp\www\`

3. **Configure the Database**
   - Start **Apache** and **MySQL** from your XAMPP/WAMP control panel.
   - Open your browser and go to:
     ```
     http://localhost/phpmyadmin
     ```
   - Create a new database (example name: `inventory_db`).
   - Click **Import**, then upload the provided `.sql` file (if available) to create the tables automatically.

4. **Check Database Connection**
   - Open the `config.php` file (or equivalent database configuration file in  project).
   - Ensure the following settings are correct:
     ```php
     $host = 'localhost';
     $db   = 'inventory_db';
     $user = 'root';
     $pass = '';
     ```
   - Save the file.

5. **Run the Project**
   - Open your web browser and enter:
     ```
     http://127.0.0.1:8000/sales-inventory-system/
     ```
   - The system dashboard should now be displayed.

6. **Optional: Edit Environment Settings**
   -  May update system settings (like database name or base URL) in the environment file (`.env`) if project includes one.

---

 **You’re all set!**  
We can now navigate to the dashboard, manage products, view categories, and record transactions.

## Usage

Follow these steps to use the **Sales Inventory System** effectively:

1. **Navigate to the Dashboard**
   - View overall metrics such as:
     - **Total Products**
     - **Total Transactions**
     - **Total Sales**
   - Analyze daily sales performance through the sales chart.

2. **Go to Products**
   - Add new products with details such as name, category, price, and quantity.
   - Edit or delete existing product records as needed.

3. **Go to Categories**
   - Create, update, or delete product categories.
   - Assign products to specific categories for better organization.

4. **Go to Transactions**
   - Record new sales transactions.
   - When completing a transaction:
     - The system **subtracts sold quantities** from the product stock.
     - The system **adds the transaction total** to the overall sales summary.

5. **Search and Filter**
   - Use the search bar or filter options on the Products or Transactions pages to quickly locate specific records.

---

**Tip:** Regularly check the dashboard to monitor sales performance and ensure that stock levels remain accurate.
## Screenshots or Code Snippets

### Dashboard Screenshot
Below is a sample image of the system dashboard showing total products, transactions, and sales:

![Dashboard Screenshot](Dashboard.png)

---
##  Contributors
- **Shirley Argueza**  
- **Clarissa Mae Gatchalian**

---

##  License
This project is created for **academic purposes** as part of the Midterm Examination.  
You may modify and use it for learning or demonstration purposes only.

**© 2025 Shirley Argueza & Clarissa Mae Gatchalian. All Rights Reserved.**

