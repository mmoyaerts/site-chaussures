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