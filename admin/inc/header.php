<?php
	session_start();	
	include_once('dbcon.php');
	include_once('functions.php');
	checkLogin();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<div class="wrapper">
	<h2 class="title">Welcome to admin panel</h2>
    <div class="nav">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="category.php">Categories</a></li>
    <li><a href="news.php">News</a></li>
    <li><a href="user.php">Users</a></li>   
    <li><a href="logout.php">Logout</a></li>
    <li style="float:right"><strong>Hi, <?php echo $_SESSION['name']?></strong></li>
    </ul>
    </div><!--/*nav end*/-->
    <div class="container">