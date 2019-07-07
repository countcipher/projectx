<?php

session_start();


if($_SESSION['active'] != 1){

    session_destroy();
    header("Location: index.php");
    die();

}

include "includes/db.php";

$id = $_GET['id'];
$table = $_GET['table'];
$section = $_GET['section'];

$query = "SELECT * FROM $table WHERE id = $id";

$result = mysqli_query($connection, $query);

$row = mysqli_fetch_assoc($result);

unlink("../".$row['featured_image']);
unlink("../".$row['photo']);


$query = "DELETE FROM $table WHERE id = $id";

mysqli_query($connection, $query);

header("Location: pages.php#$section");



?>