# Basic Banking System

This project has been completed during my one-month Web development Internship with The Sparks Foundation. Check out the video to see how this website works [here](https://youtu.be/kTrb-JZYorI).

Website is hosted here: http://swatitripathi.epizy.com/

Drop a star if this code helps you :)

### Task assigned was as follows:

Create a simple dynamic website which has the following specs.
1. Start with creating a dummy data in database for upto 10 customers. Database options: Mysql, Mongo, Postgres, etc. Customers table will have basic fields such as name, email, current balance etc. Transfers table will record all transfers happened.
2. Flow: Home Page > View all Customers > Select and View one Customer > Transfer Money > Select customer to transfer to > View all Customers.
3. No Login Page. No User Creation. Only transfer of money between multiple users.
4. Host the website.

### Techstack:

Client Side: Html, CSS, Javascript<br>
Server Side: PHP<br>
DBMS: MySQL<br>

### Project code description

1. index.php : First starting page of the project.<br>
2. viewCustomers.php: This file is responsible for displaying customer table after fetching from database.<br>
3. transfer.php: This is responsible for fund transfer where it displays the form asking for id of payer and payee and amount.<br>
4. resultpage: This is the action page after user fills the form for transaction showcased by transfer.php. Here the actual transaction of money from database takes place. It is also responsible for error handling if any occurs in form filling. Also, it updates history table in DB which is keeping track of all transactions happened so far.<br>
5. recordspage.php: This page shows the transaction record of all the money of customers taking place.<br>
6. navbar.php: This is just responsible for showcasing the navigation bar at top of all pages.<br>
7. spark_bank.sql: This is the database file made using MySQL DBMS. It consist of two tables accountdetails and history. Former is used to keep record of all customers and latter is going to keep track of all transaction taking place.<br>

