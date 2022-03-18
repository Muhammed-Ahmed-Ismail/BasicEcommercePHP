#DatabaseConnector:
##Constructor:
      DatabaseConnector()
##Methods:
      getDbc() 
      
      This method returns the connection that was established with the database.

____________________________________________________
#Database:
##info
###Name:  Ecommerce_PHP_Project.
###Tables:
- [users](#users)
- [products](#products)
- [orders](#orders)
- [token](#token)
-----------------------------------------------------------------
##users
| <u>ID int(11) auto-generated | e-mail varchr(60) required | user_password varchar(255) required |
|------------------------------|----------------------------|-------------------------------------|
| ---------------              | -------------------        | ----------------------------        |
--------------------
##products

| <u>product_id int(11)  auto-generated | download_file_link varchar(255) required | file_name  varchar(255) required  | 
|-------------------------|------------------------------------------|-----------------------------------|
| ---------------------   | ---------------------------------------- | ----------------------            |
-----------------
##orders

| <u>order_id int(11) auto-generated  | order_date Date required  | downloads_count int default=0 | product_id int(11) required (KF) | ID int (FK) |
|-----------------------|---------------------------|-------------------------------|----------------------------------|-------------|
| --------------------- | -----------------         | ----------------------        | --------------------             | ---         |
-----------------
##token
| <u>ID <u> int(11) auto-generated (FK) | token    varchar(255)  required |
|---------------------------------------|---------------------------------|
| ---------------                       | -------------------             |
