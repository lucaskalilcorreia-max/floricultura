<?php
$conn = new mysqli("sql311.infinityfree.com", "if0_42264979", "Blamemee", "if0_42264979_floricultura");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>