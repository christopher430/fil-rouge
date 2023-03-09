CREATE TABLE admins(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   forname VARCHAR(50),
   email TEXT,
   password TEXT,
   PRIMARY KEY(id)
);

CREATE TABLE customers(
   id INT AUTO_INCREMENT,
   identifier INT,
   name VARCHAR(50),
   forname VARCHAR(50),
   billing_adress VARCHAR(255),
   delivery_adress VARCHAR(255),
   email VARCHAR(255),
   password VARCHAR(255),
   PRIMARY KEY(id)
);

CREATE TABLE categories(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   description TEXT,
   is_enabled BOOLEAN,
   PRIMARY KEY(id)
);

CREATE TABLE sub_categories(
   id INT AUTO_INCREMENT,
   name BOOLEAN,
   description TEXT,
   is_enabled BOOLEAN,
   id_categories INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_categories) REFERENCES categories(id)
);

CREATE TABLE pictures(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   path TEXT,
   PRIMARY KEY(id)
);

CREATE TABLE carts(
   id INT AUTO_INCREMENT,
   identifier INT,
   identifier_product INT,
   identifier_customer INT,
   price DECIMAL(15,2),
   quantity INT,
   row_total DECIMAL(15,2),
   comment TEXT,
   id_customers INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(id_customers),
   FOREIGN KEY(id_customers) REFERENCES customers(id)
);

CREATE TABLE orders(
   id INT AUTO_INCREMENT,
   customer_identifier INT,
   customers_name VARCHAR(50),
   customers_forname VARCHAR(50),
   customers_email VARCHAR(255),
   billing_adress VARCHAR(255),
   delivery_adress VARCHAR(255),
   carts_identifier INT,
   carts_price INT,
   carts_quantity VARCHAR(50),
   carts_row_total DECIMAL(15,2),
   products_identifier INT,
   products_name VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE platforms(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   id_pictures INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(id_pictures),
   FOREIGN KEY(id_pictures) REFERENCES pictures(id)
);

CREATE TABLE products(
   id INT AUTO_INCREMENT,
   identifier INT,
   name VARCHAR(50),
   description TEXT,
   features_1 VARCHAR(50),
   features_2 VARCHAR(50),
   comments TEXT,
   is_enabled BOOLEAN,
   id_platforms INT NOT NULL,
   id_sub_categories INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_platforms) REFERENCES platforms(id),
   FOREIGN KEY(id_sub_categories) REFERENCES sub_categories(id)
);

CREATE TABLE pictures_products(
   id_products INT,
   id_pictures INT,
   PRIMARY KEY(id_products, id_pictures),
   FOREIGN KEY(id_products) REFERENCES products(id),
   FOREIGN KEY(id_pictures) REFERENCES pictures(id)
);