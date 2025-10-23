# grocery-deliver-system
A simple Grocery Delivery System built with PHP and MySQL for my class demo.


## Author
Spencer Dant


## Project Structure


grocery_delivery_system/
│
├── index.php # Homepage showing available products
├── product_detail.php # Displays detailed info for each product
├── cart.php # Shows current shopping cart items
├── add_to_cart.php # Handles adding products to cart
├── clear_cart.php # Clears all cart items
├── checkout.php # Simulates checkout process
│
├── includes/
│ └── db_connect.php # Database connection script
│
├── assets/
│ ├── style.css # Stylesheet
│ └── images/ # Product images
│
├── database.sql # SQL file to create and populate database
│
└── documentation/
├── brochure.pdf
├── system_requirements_documentation.pdf
└── presentation_slides.pdf


## Features

- Browse grocery items (fruits, bread, milk, etc.)
- View detailed product descriptions
- Add items to cart
- Remove individual items or clear cart
- Checkout summary


## Database Setup

1. Open **phpMyAdmin** in XAMPP.
2. Create a new database named `grocery_db`.
3. Import the file **`database.sql`** from this repository.

## How to Run the Project

Copy the folder grocery_delivery_system into your htdocs directory in XAMPP.

Start Apache and MySQL in the XAMPP Control Panel.

Open your browser and go to:

http://localhost/grocery_delivery_system/


## Documentation 

This Repository also includes: 
- Brochure(pdf): A summary of this project and what it is for
- System Requirements Document; Tech specs
- Presenetation (slides): Used for the demo and presentation
