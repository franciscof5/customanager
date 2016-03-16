<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CUSTOMANAGER</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery2.min.js"></script>
	<script src="js/bootbox.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="padding-top:80px;">

<?php
	include "database.php";
	include "navbar.php";

$pdo = Database::connect();
if(preg_match('/1049/',$pdo)) {
	//DATABASE NOT FOUND
	echo "<h4>Instalando o sistema CUSTOMANAGER</h4>";
	$servername = "localhost";
	$username = "root";
	$password = "teste123";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Create database
	$sql = 'create schema customanager';
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully... ";
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	if (mysqli_select_db($conn,"customanager")) {
	    echo "Selected  db successfully... ";
	} else {
	    echo "Error selectind db: " . $conn->error;
	}

	$sql = 'create table products (prod_id int not null auto_increment, prod_nome varchar(255), prod_desc text, prod_preco decimal(8.2), primary key (prod_id));';

	if ($conn->query($sql) === TRUE) {
	    echo "Table products created successfully... ";
	} else {
	    echo "Error creating table products: " . $conn->error;
	}

	$sql = 'create table customers (clien_id int not null auto_increment, clien_nome varchar (255), clien_email varchar(255), clien_telefone varchar(255), primary key (clien_id));';

	if ($conn->query($sql) === TRUE) {
	    echo "Table customers created successfully... ";
	} else {
	    echo "Error creating table customers: " . $conn->error;
	}

	$sql = 'create table orders (pedido_numero int not null auto_increment, pedido_prod_id int, pedido_clien_id int, primary key(pedido_numero));';

	if ($conn->query($sql) === TRUE) {
	    echo "Table orders created successfully... ";
	} else {
	    echo "Error creating table orders: " . $conn->error;
	}


	$conn->close();
	

	/*$sql = 'create schema customanager;

			use customanager;


			create table products (prod_id int not null auto_increment, prod_nome varchar(255), prod_desc text, prod_preco decimal(8.2), primary key (prod_id));

			create table customers (clien_id int not null auto_increment, clien_nome varchar (255), clien_email varchar(255), clien_telefone varchar(255), primary key (clien_id));

			create table orders (pedido_numero int not null auto_increment, pedido_prod_id int, pedido_clien_id int, primary key(pedido_numero));
			';
	var_dump($pdo->query($sql));*/
	
}


?>