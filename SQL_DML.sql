use team_b_db;


create view PRODUCT_TABLE as

select product_id, product_title, price, category_name, size, quantity, image 
from product
inner join
      quantity_size ON
      product_id= product_product_id
      
inner join category
		on category_id = category_category_id ;

 
 select * from PRODUCT_TABLE; 
 
INSERT INTO user(user_id, user_name, email, phone_number, gender, user_password, street, city, zipcode, state)
	VALUES (DEFAULT,?,?,?,?,?,?,?,?,?);
      
INSERT INTO PRODUCT_TABLE(product_id, product_title, category_name, size, price, quantity, image)
      VALUES (DEFAULT,?,?,?,?,?,?);

