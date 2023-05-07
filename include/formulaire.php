<?php

$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];


$serveur = 'localhost';
$utilisateur = 'mmoyaerts';
$mot_de_passe = 'password';
$nom_base_de_donnees = 'mmoyaertsDB';

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die('La connexion a échoué : ' . $connexion->connect_error);
}

// Insertion des données soumises dans la base de données
$sqlRequest = "INSERT INTO formulaire (nom, email, message) VALUES ('$nom', '$email', '$message')";

if ($connexion->query($sqlRequest) === TRUE) {
    echo "Les données ont été ajoutées avec succès à la base de données.";
} else {
    echo "Erreur : " . $sqlRequest . "<br>" . $connexion->error;
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>
