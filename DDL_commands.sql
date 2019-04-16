
show databases ;
use team_b_db;
select * from cart;

CREATE TABLE team_b_db.user (
  user_id INT AUTO_INCREMENT NOT NULL,
  user_name VARCHAR(25) NOT NULL,
  email VARCHAR(25) NOT NULL,
  phone_number VARCHAR(45) NOT NULL,
  gender VARCHAR(45) NULL,
  user_password VARCHAR(45) NOT NULL,
  street VARCHAR(45) NOT NULL,
  city VARCHAR(45) NOT NULL,
  zipcode INT NOT NULL,
  state VARCHAR(45) NOT NULL,
  PRIMARY KEY (user_id)
);

CREATE TABLE team_b_db.category (
  category_id INT AUTO_INCREMENT NOT NULL,
  category_name VARCHAR(45) NOT NULL,
  PRIMARY KEY (category_id)
);

CREATE TABLE team_b_db.product (
  product_id INT AUTO_INCREMENT NOT NULL,
  product_title VARCHAR(45) NOT NULL,
  price DECIMAL(5,2) NOT NULL,
  image LONGBLOB NOT NULL,
  category_category_id INT NOT NULL,
  PRIMARY KEY (product_id),
  FOREIGN KEY (category_category_id) REFERENCES team_b_db.category (category_id)
);

CREATE TABLE team_b_db.order (
  order_id INT  AUTO_INCREMENT NOT NULL,
  quantity INT NOT NULL,
  purchase_date DATE NOT NULL,
  User_user_id INT NOT NULL,
  product_product_id INT NOT NULL,
  PRIMARY KEY (order_id),

  FOREIGN KEY (User_user_id) REFERENCES team_b_db.user (user_id),

  FOREIGN KEY (product_product_id) REFERENCES team_b_db.product (product_id)
);

CREATE TABLE  team_b_db.quantity_size (
  size ENUM('small', 'medium', 'large') NOT NULL,
  quantity INT NOT NULL,
  product_product_id INT NOT NULL,
  PRIMARY KEY (size, product_product_id),

  FOREIGN KEY (product_product_id) REFERENCES team_b_db.product (product_id)
);

CREATE TABLE  team_b_db.cart (
  cart_id INT AUTO_INCREMENT NOT NULL,
  product_product_id INT NOT NULL,
  User_user_id INT NOT NULL,
  PRIMARY KEY (cart_id),

  FOREIGN KEY (product_product_id) REFERENCES team_b_db.product (product_id),

  FOREIGN KEY (User_user_id) REFERENCES team_b_db.user (user_id)
);
