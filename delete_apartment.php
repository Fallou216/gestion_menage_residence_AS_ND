<?php
require_once '../classes/Database.php';
require_once '../classes/Appartement.php';

$db = new Database();
$conn = $db->connect();

$appartement = new Appartement($conn);
$appartement->id = $_GET['id'];

if ($appartement->supprimer()) {
    header("Location: index.php");
} else {
    echo "Une erreur s'est produite.";
}
?>
