Borg El Arab Technological University Website
This is a dynamic university website built with PHP OOP, MySQL, HTML, CSS, and JavaScript.
It includes user login, registration, profile management, news section, and other university pages.

Folder Structure
css
Copy
Edit
project-root/
│
├── assets/
│   └── css/
│       └── style.css
│
├── components/
│   ├── header.php
│   └── footer.php
│
├── uploads/
│   └── news_images/
│
├── images/
│   ├── logo.png
│   ├── background.jpg
│   └── ... (other images)
│
├── index.php
├── about.php
├── contact.php
├── admission.php
├── register.php
├── login.php
├── logout.php
├── profile.php
├── news.php
├── db.php
└── README.md
How to Run the Project Locally
Download or Clone the Repository

git clone https://github.com/your-username/borg-arab-university.git

Move the Folder to Your Local Server (XAMPP or WAMP)
For example, if you’re using XAMPP:

Move the folder to: C:\xampp\htdocs\borg-arab-university

Start Apache and MySQL

Open XAMPP Control Panel

Start Apache and MySQL

Import the Database

Open http://localhost/phpmyadmin

Click Import

Choose the SQL file: db u.sql

Click Go

Check the Database Configuration
Make sure your db.php file is configured like this:


<?php
$conn = new mysqli("localhost", "root", "", "db u");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
Open the Website

Go to: http://localhost/borg-arab-university/index.php

Pages Included
Page	File Name	Description
Home	index.php	Landing page with intro and programs
About	about.php	Information about the university
Contact	contact.php	Contact form and details
Admission	admission.php	Admissions info and CTA
Register	register.php	Student registration form
Login	login.php	User login form
Logout	logout.php	Session destroy
Profile	profile.php	Student dashboard/profile
News	news.php	News feed with image uploads

Images & Design
Store images in the /images folder.

Background images and logos are linked in style.css or directly in HTML.

All styling is done in assets/css/style.css.

Notes
This project does not require Composer or external PHP libraries.

PHP version 7.4+ is recommended.

Make sure JavaScript is enabled in your browser for menu functions.

