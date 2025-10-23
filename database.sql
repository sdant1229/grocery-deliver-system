CREATE DATABASE grocery_db;
USE grocery_db;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price DECIMAL(10,2),
  image VARCHAR(100)
);

INSERT INTO products (name, price, image) VALUES
('Apples', 2.99, 'apple.jpg'),
('Milk', 1.49, 'milk.jpg'),
('Bread', 3.50, 'bread.jpg');
