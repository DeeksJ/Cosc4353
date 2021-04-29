# Cosc4353 - Group 24
Instructions to set up Group 24’s Project

Install XAMPP from here: https://www.apachefriends.org/download.html
Download Version 8.0.3 for your OS
Make sure you have MySQL, Apache, phpMyAdmin, and PHP selected as components in the installation process.
Locate the main folder where XAMPP has installed
Within the main folder there will be a folder named htdocs. This is where you will need to keep your program files in order to run them.
Start up XAMMP control panel 
Click Start next to Apache and MySQL.
Make sure all program files are within the htdocs folder
Open up 127.0.0.1/login.html or localhost/login.html
Use the following SQL queries to create the database and tables:
CREATE DATABASE epiz_28288046_fuelQuotes;

SQL statements for profile management table:
CREATE TABLE `profiledata` (
 `username` varchar(50) NOT NULL,
 `name` varchar(50) NOT NULL,
 `address1` varchar(100) NOT NULL,
 `address2` varchar(100) DEFAULT NULL,
 `city` varchar(100) NOT NULL,
 `state` varchar(2) NOT NULL,
 `zip` varchar(9) NOT NULL,
 UNIQUE KEY `username` (`username`)
) 

SQL Statement for fuel quote history table:
CREATE TABLE `fuelquotehistory` (
 `id` int(10) NOT NULL,
 `galReq` int(10) NOT NULL,
 `delAdd` varchar(50) NOT NULL, `date` date NOT NULL,
 `pricePer` int(10) NOT NULL,
 `total` int(10) NOT NULL
) 

SQL statement to create users table:
CREATE TABLE `users` (
 `username` varchar(20) DEFAULT NULL,
 `password` varchar(255) DEFAULT NULL
)

In order to run the unit tests you will need to download and install both XDebugger and PHPUnit from the following links:
				https://xdebug.org/download
				https://phpunit.de/
