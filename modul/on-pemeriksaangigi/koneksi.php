<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
	$host="localhost";
	$user="root";
	$pass="";
	mysql_connect($host,$user,$pass) or die("Error Connect DB ".mysql_error());
	mysql_select_db("db_klinik") or die("Database Tidak Ada. ".mysql_error());
?>