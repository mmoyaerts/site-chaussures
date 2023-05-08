<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Nike Shoes</title>
	<link rel="stylesheet" href="stylesheet.css">

</head>
<body>
	<header>
		<h1>Nike Shoes</h1>
		<nav>
			<ul>
				<li><a href="#">Chaussures pour hommes</a></li>
				<li><a href="#">Chaussures pour femmes</a></li>
				<li><a href="#">Chaussures pour enfants</a></li>
			</ul>
		</nav>
	</header>

	<?php

//error_reporting(E_ALL);
$serveur = 'localhost';
$utilisateur = 'mmoyaerts';
$mot_de_passe = 'password';
$nom_base_de_donnees = 'mmoyaertsDB';

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);
if(!$connexion)
{
    die("erreur de la connexion vers la base de donnée");
}

$requetePrix = "SELECT * FROM chaussures";
$prix_resultat = $connexion->query($requetePrix);
$prix_tableau = array();
while ($row = $prix_resultat->fetch_assoc()) {
    $prix_tableau[] = $row['prix'];
}

$requeteMarque = "SELECT marque FROM chaussures";
$marque_resultat = $connexion->query($requeteMarque);
$marque_tableau = array();
while ($row = $marque_resultat->fetch_assoc()) {
    $marque_tableau[] = $row['marque'];
}

$requeteModele = "SELECT modele FROM chaussures";
$modele_resultat = $connexion->query($requeteModele);
$modele_tableau = array();
while ($row = $modele_resultat->fetch_assoc()) {
    $modele_tableau[] = $row['modele'];
}

echo "<table border='1'>";
echo "<tr>";
echo "<th>Marque</th>";
echo "<th>Modèle</th>";
echo "<th>Prix</th>";
echo "</tr>";
for ($i = 0; $i < count($prix_tableau); $i++) {
    echo "<tr>";
    echo "<td>".$marque_tableau[$i]."</td>";
    echo "<td>".$modele_tableau[$i]."</td>";
    echo "<td>".$prix_tableau[$i]." $"."</td>";
    echo "</tr>";
}
echo "</table>";

?>
	<main>
        <section>
            <form method="post" action="include/formulaire.php">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>

                <input type="submit" name="submit">
            </form>
        </section>
	</main>
	<footer>
		<i>Auteur : Mathieu MOYAERTS <u>mathieu.moyaerts.pro@gmail.com</u></i>
	</footer>
</body>
</html>
