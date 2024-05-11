<?php

include('connection.php');
$stmt = $conn->prepare("SELECT * FROM PRODUCTS LIMIT 4");


$stmt->execute();

$featured_products = $stmt->get_result();




?>