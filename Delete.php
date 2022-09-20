<?php
require_once "vendor/autoload.php";
use App\Connection;

$db = new Connection();
$conn = $db->connect();

$id = $_GET['did'];

$query="DELETE FROM Image WHERE id={$id}";
$stmt=$conn->prepare($query);
$stmt->execute();
header("location:admin.php");