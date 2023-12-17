<?php
include('API.php');
header('Content-Type: application/json');
$test = new API();
echo $test->tampildata();
?>