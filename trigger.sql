use team_b_db;

DELIMITER $$
CREATE TRIGGER before_product_delete BEFORE delete ON product FOR EACH ROW BEGIN

DELETE FROM product where product_id =old.product_id;

END $$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER before_product_update BEFORE update ON product FOR EACH ROW BEGIN
insert into product
set action='update',
team_b_db.product.product_title = old.product_title,
          team_b_db.product.category_category_id = old.email,
          team_b_db.product.price = old.price, 
         team_b_db.product.image = old.image, 
        changedat=now();

END $$
DELIMITER ;
DROP procedure IF EXISTS `deleteProduct`;
DELIMITER $$
USE `team_b_db`$$
CREATE PROCEDURE `deleteProduct` (IN product_id INT)

BEGIN
  IF EXISTS(select * from team_b_db.product where team_b_db.product.product_id =product_id)
    THEN
     delete from product
     where team_b_db.product.product_id=old.product_id;
    ELSE
        select "error occured" as result;
  END IF;
END $$
DELIMITER ;

DROP procedure IF EXISTS `updateProduct`;
DELIMITER $$
USE `team_b_db`$$
CREATE PROCEDURE `updateProduct` (IN product_id INT,
                                    IN product_title           VARCHAR(255),
                                    IN category_category_id               int,
                                    IN price         decimal(5,2),
                                    IN image              longblob)

BEGIN
  IF EXISTS(select * from team_b_db.product where team_b_db.product.product_id =product_id)
    THEN
      UPDATE team_b_db.product
        set
          team_b_db.product.product_title = product_title,
          team_b_db.product.category_category_id = email,
          team_b_db.product.price = price, 
         team_b_db.product.image = image;
    ELSE
        select "error occured" as result;
  END IF;
END $$
DELIMITER ;
