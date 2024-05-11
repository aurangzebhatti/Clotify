<?php

include('connection.php');
$stmt = $conn->prepare("SELECT * FROM PRODUCTS WHERE product_category='coats' LIMIT 4");

$stmt->execute();

$coats_products = $stmt->get_result();




?>