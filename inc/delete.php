<?php
require_once 'conn.php';

$id = $_POST['delete_id'];

$stmt = $conn->prepare("DELETE FROM prototypeshelter_JDeS WHERE id=:id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
//$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();