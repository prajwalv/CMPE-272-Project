<?php
include('admin-authenticate.php');
    mysql_connect("localhost", "root", "prajwal@93") or die(mysql_error());
 //   mysql_query("CREATE DATABASE passwordmanager") or die(mysql_error());
    mysql_select_db("passwordmanager") or die(mysql_error());
   // mysql_query("CREATE TABLE IF NOT EXISTS users(uid varchar(10) not null,email varchar(40) not null default 'email', password varchar(50) not null,username varchar(20) not null,role varchar(8) not null default 'user', PRIMARY KEY (`uid`))") or die(mysql_error());
    //mysql_query("INSERT INTO users(uid,username,password,role) VALUES('admin12345','admin',md5('admin'),'admin')") or die(mysql_error()); 
     
    //mysql_query("CREATE TABLE IF NOT EXISTS general(id int not null AUTO_INCREMENT,uid varchar(50) NOT NULL ,vendorname VARCHAR(30) not null,vendortype VARCHAR(30) NOT NULL, email VARCHAR(30) not null,phoneno VARCHAR(15) not null,username VARCHAR(30) not null,password varchar(50) not null, PRIMARY KEY(`id`),FOREIGN KEY (uid) REFERENCES users(uid))") or die(mysql_error());        

    mysql_query("CREATE TABLE IF NOT EXISTS bank(id int not null AUTO_INCREMENT,uid varchar(10) not null,vendorname VARCHAR(30) not null,vendortype VARCHAR(30) NOT NULL default 'bank', ifsc VARCHAR(30) not null,accounttype VARCHAR(20) not null,accountno numeric(30) not null,username varchar(50) not null, password varchar(50) not null, email varchar(30) not null, phoneno varchar(20) not null, cardtype1 varchar(30) not  null, cardtype2 varchar(30) not null,cardno numeric(16) not null, cardexp date not null, cardpin varchar(50) not null,cardcvv varchar(50) not null,PRIMARY KEY(`id`),FOREIGN KEY (uid) REFERENCES users(uid))") or die(mysql_error());        

   header("Location: index.html");
?>
