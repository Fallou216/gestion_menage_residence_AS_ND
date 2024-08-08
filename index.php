<?php
include 'header.php';
require_once '../classes/Database.php';
require_once '../classes/Appartement.php';

// Se connecter à la base de données
$db = new Database();
$conn = $db->connect();

// Récupérer tous les appartements
$appartement = new Appartement($conn);
$appartements = $appartement->obtenirTous();
?>
l
<div class="container">
    <h1>Gestion de Ménage Residence AS et ND</h1>
    <form action="add_apartment.php" method="POST">
        <label for="nom">Choisir l'appartement :</label>
        <select name="nom" required>
            <option value="AS OO1">AS 001</option>
            <option value="AS OO2">AS 002</option>
            <option value="AS 003">AS 003</option>
            <option value="AS 101">AS 101</option>
            <option value="AS 102">AS 102</option>
            <option value="AS 103">AS 103</option>
            <option value="AS 104">AS 104</option>
            <option value="AS 201">AS 201</option>
            <option value="AS 202">AS 202</option>
            <option value="AS 203">AS 203</option>
            <option value="AS 204">AS 204</option>
            <option value="AS 301">AS 301</option>
            <option value="AS 302">AS 302</option>
            <option value="AS 303">AS 303</option>
            <option value="AS 304">AS 304</option>
            <option value="AS 401">AS 401</option>
            <option value="AS 402">AS 402</option>
            <option value="ND 001">ND 001</option>
            <option value="ND 002">ND 002</option>
            <option value="ND 003">ND 003</option>
            <option value="ND 101">ND 101</option>
            <option value="ND 102">ND 102</option>
            <option value="ND 103">ND 103</option>
            <option value="ND 104">AS 104</option>
            <option value="ND 201">ND 201</option>
            <option value="ND 202">ND 202</option>
            <option value="ND 203">ND 203</option>
            <option value="ND 204">ND 204</option>
            <option value="ND 301">ND 301</option>
            <option value="ND 302">ND 302</option>
            <option value="ND 303">ND 303</option>
            <option value="ND 304">ND 304</option>
            <option value="ND 305">ND 305</option>
            <option value="ND 401">ND 401</option>
            <option value="ND 402">ND 402</option>
            <option value="ND 403">ND 403</option>
            <option value="ND 404">ND 404</option>
            <option value="ND 405">ND 405</option>
        </select>

        <label for="nom_femme_de_menage">Choisir la femme de ménage :</label>
        <select name="nom_femme_de_menage" required>
            <option value="Astou">Astou</option>
            <option value="Fatou">Fatou</option>
            <option value="Dior">Dior</option>
        </select>

        <label for="menage">Ménagé :</label>
        <select name="menage" required>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>

        <label for="type_menage">Type de ménage :</label>
        <select name="type_menage" required>
            <option value="Complète">Complète</option>
            <option value="Incomplète">Incomplète</option>
        </select>

        <label for="date_menage">Date du ménage :</label>
        <input type="date" name="date_menage" required>

        <label for="prochaine_date_menage">Prochaine date de ménage :</label>
        <input type="date" name="prochaine_date_menage" required>

        <label for="commentaires">Commentaires :</label>
        <textarea name="commentaires" rows="4"></textarea>

        <input type="submit" value="Ajouter l'appartement">
    </form>

    <?php if ($appartements->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Appartement</th>
                <th>Femme de ménage</th>
                <th>Ménagé</th>
                <th>Type de ménage</th>
                <th>Date du ménage</th>
                <th>Prochaine date</th>
                <th>Commentaires</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $appartements->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['nom_femme_de_menage']; ?></td>
                <td><?php echo $row['menage'] ? 'Oui' : 'Non'; ?></td>
                <td><?php echo $row['type_menage']; ?></td>
                <td><?php echo $row['date_menage']; ?></td>
                <td><?php echo $row['prochaine_date_menage']; ?></td>
                <td><?php echo $row['commentaires']; ?></td>
                <td>
                    <a href="delete_apartment.php?id=<?php echo $row['id']; ?>" class="delete-icon">
                        <span class="material-icons">delete</span>
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Aucun enregistrement trouvé.</p>
    <?php endif; ?>

    <div class="excel-btn">
        <a href="export.php" class="btn">
            <span class="material-icons">file_download</span>Télécharger le rapport fichier Excel
        </a>
    </div>
</div>
<br>
<br>
<br>

<?php
include 'footer.php';
?>
