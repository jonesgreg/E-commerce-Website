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
 
 
INSERT INTO team_b_db.user(user_id, user_name, email, phone_number, gender, user_password, street, city, zipcode, state)
	VALUES (1,'amy','123@gmail.com','1234567890','Female','1234','51th','newyork',19131,'NY');
    INSERT INTO team_b_db.user(user_id, user_name, email, phone_number, gender, user_password, street, city, zipcode, state)
	VALUES (2,'ben','456@gmail.com','1234567890','male','234','50th','newyork',19131,'NY');
    INSERT INTO team_b_db.user(user_id, user_name, email, phone_number, gender, user_password, street, city, zipcode, state)
	VALUES (3,'coco','789@gmail.com','1234567890','Female','34','54th','newyork',19131,'NY');
      
INSERT INTO team_b_db.product(product_id, product_title, category_category_id,  price, image)
      VALUES (1,'best shirt',1,10, 'images/blue-t-shirt.jpg');
            
INSERT INTO team_b_db.product(product_id, product_title, category_category_id, price, image)
      VALUES (2,'best hat',1,20, 'images/green-t-shirt.jpg');
            
INSERT INTO team_b_db.product(product_id, product_title, category_category_id, price, image)
      VALUES (3,'best skirt',2,30,'images/grey-t-shirt.jpg' );
       INSERT INTO team_b_db.product(product_id, product_title, category_category_id, price, image)
      VALUES (4,'best short',2,40,' images/purper-t-shirt.jpg');
      INSERT INTO team_b_db.product(product_id, product_title, category_category_id, price,  image)
      VALUES (5,'best shoe',1,50, 'images/red-t-shirt.jpg');
       INSERT INTO team_b_db.product(product_id, product_title, category_category_id, price,  image)
      VALUES (6,'best trouser',1,50, 'images/blue-t-shirt.jpg');
      
      INSERT INTO team_b_db.category(category_id,category_name)
      VALUES (1,'female');
       INSERT INTO team_b_db.category(category_id,category_name)
      VALUES (2,'male');
      
INSERT INTO team_b_db.order (order_id ,quantity ,purchase_date ,User_user_id ,product_product_id )
VALUES (1,1,3/1/2019,1,1);
INSERT INTO team_b_db.order (order_id ,quantity ,purchase_date ,User_user_id ,product_product_id )
VALUES (2,1,3/2/2019,2,2);
      INSERT INTO  team_b_db.quantity_size (size ,quantity,product_product_id) 
      VALUES ('small',10,1);
      INSERT INTO  team_b_db.quantity_size (size ,quantity,product_product_id) 
      VALUES ('small',20,2);
      INSERT INTO  team_b_db.quantity_size (size ,quantity,product_product_id) 
      VALUES ('medium',30,3);
      INSERT INTO  team_b_db.quantity_size (size ,quantity,product_product_id) 
      VALUES ('large',40,4);
      INSERT INTO  team_b_db.quantity_size (size ,quantity,product_product_id) 
      VALUES ('small',50,5);
       INSERT INTO  team_b_db.quantity_size (size ,quantity,product_product_id) 
      VALUES ('small',5,6);
   INSERT INTO team_b_db.cart (cart_id,product_product_id ,User_user_id)
   VALUES (1,1,1);
      INSERT INTO team_b_db.cart (cart_id,product_product_id ,User_user_id)
   VALUES (2,2,2);
   
   /*  delete and Update Queries */
   DELETE FROM product WHERE ID=1 ; /* to delete a a prt */

  DELETE FROM product WHERE ID=$id;/* delete query*/

UPDATE product SET 
product_title='".$product_title."',category_name='".$category_name."',size='".$size."',price='".$price."',quantity='".$quantity."',image='".$img."'  
WHERE product_id="1"; /* update qurey */