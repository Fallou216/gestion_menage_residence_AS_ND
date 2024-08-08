<?php
require_once '../classes/Database.php';
require_once '../classes/Appartement.php';

$db = new Database();
$conn = $db->connect();

$appartement = new Appartement($conn);

$appartement->nom = $_POST['nom'];
$appartement->nom_femme_de_menage = $_POST['nom_femme_de_menage'];
$appartement->menage = $_POST['menage'];
$appartement->type_menage = $_POST['type_menage'];
$appartement->date_menage = $_POST['date_menage'];
$appartement->prochaine_date_menage = $_POST['prochaine_date_menage'];
$appartement->commentaires = $_POST['commentaires'];

if ($appartement->creer()) {
    header("Location: index.php");
} else {
    echo "Une erreur s'est produite.";
}
?>

<?php
// Exemple de débogage dans add_apartment.php
if (isset($_POST['date_menage'])) {
    echo 'Date de ménage : ' . $_POST['date_menage'];
}
?>
