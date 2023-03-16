<?php
date_default_timezone_set('Asia/Manila');

// Connect to your MySQL database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bfc_inventory';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Connection failed: ' . $e->getMessage();
}

// Query your MySQL database and retrieve the data
$stmt = $pdo->query('SELECT * FROM endorse');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>