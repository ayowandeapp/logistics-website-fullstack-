
# Full Stack Logistics Website built on Laravel Framework, VueJS, MySQL,Bootstrap

## Full Stack Logistics website

Logistics website with interfaces for Admins,Merchants and Users. The idea is to have a large shipping company(admin) that have the resouces to move goods from one place to another; merchants(customers) who are business owners that require goods to be moved but have no resources to do so; and the user (merchant's clent) who ordered for goods from the merchant and needs its delivered. So the merchants may use the resources of the company for a fee and get their goods to their clients with no hassle. 
     
     Admin--->Merchants---->clients


## Installation

### **laravel comes with VueJS installed**

In the project directory, where you have package.json,run:

     npm intsall
     npm run dev
     npm run watch

### Dependencies

    laravel/intervention
    php artisan Auth
    laravel/ChartJS  https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js
    laravel/Paystack

### Database and Mail Setup

In the project, open the env file and edit appropiately

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=db_name //database name
     DB_USERNAME=root  //database username
     DB_PASSWORD=      //database password


     MAIL_DRIVER=smtp
     MAIL_HOST=smtp.gmail.com
     MAIL_PORT=587
     MAIL_USERNAME=ayooluwa71@gmail.com  //email address
     MAIL_PASSWORD= //mail password
     MAIL_ENCRYPTION=tls

### Running the server

In the project directory, where you have package.json,run:

     php artisan migrate ( migrate all tables or use the dummy.sql file to help start off. and populate the database)
     npm run dev
     npm run watch

Also to start laravel framework server,

	 php artisan serve



## Features 


1. **Login (Admin and Merchant)**: (http://127.0.0.1:8000/merchant)

2. **Signup (Admin and Merchant)**: Once account is created, an email is sent for confirmation. oce confirmed, the user becomes a merchant. however to become an admin, another admin must make you one (or you go to the database, user table and change admin column to 1 for that user you may also set merchant to 1 to make a merchant)(http://127.0.0.1:8000/merchant/register)

3. **Forgot Password**: an email is sent to assist in changing your password (http://127.0.0.1:8000/merchant/forgot-password)

4. **Dashboard (Admin)**: it shows the total number of users, the new orders and the total orders and charts of distribution (http://127.0.0.1:8000/merchant/dashboard)

5. **Add order (Admin and Merchant)**: it is where all bookings are made (http://127.0.0.1:8000/merchant/pickup)

6. **View orders (Admin and Merchant)**: admin can view the list of all orders and its allowed to have its own client as well while merchants can only view orders they placed(http://127.0.0.1:8000/merchant/view-order). from here, the admin can update the order status

7. **View order details page (Admin and Merchant)**:  the details of orders are viewed by order number.*on all pages, URL validations are placed to prevent access of orders by unauthorized personal*

8. **View merchants (Admin)**:here all the merchants are seen and a merchant csn be upgraded to an admin or vise versa (http://127.0.0.1:8000/admin/view-merchant)

9. **Vebsite setting (Admin)**: this is frontend our service, header, footer, about us are written

10. **Profile Page (Admin and Merchant)**: Edit and update Profile Details

11. **front end (client)**:the client can check order status using there phone number and the order number generated.(http://127.0.0.1:8000/)

12. **Search**: there are different search methods used; filter by Order Status, instantaneousSearch (using vueJS)

*On all pages, URL validations are placed to prevent access by unauthorized personal*

### Emails ###
When an account is created, an email is sent for confirmation. once confirmed, the user becomes a merchant. however to become an admin, another admin must make you one (or you go to the database, user table and change admin column to 1 for that user you may also set merchant to 1 to make a merchant).
Also.
Once orders are placed emails are sent to the client showing all the order details.

## in the project directory, i have the database dummy.sql file to help you start off. as some of the tables where created maually like the footer table ##
