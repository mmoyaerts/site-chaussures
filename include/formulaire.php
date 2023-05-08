<?php

include_once 'config.php';
//error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'get') {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $erreurs = array();
    if (empty($nom)) {
        $erreurs[] = 'Le nom est obligatoire.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'L\'adresse e-mail n\'est pas valide.';
    }
    if (empty($message)) {
        $erreurs[] = 'Le message est obligatoire.';
    }

    if (empty($erreurs)) {

        $serveur = 'localhost';
        $utilisateur = 'mmoyaerts';
        $mot_de_passe = 'password';
        $nom_base_de_donnees = 'mmoyaertsDB';

        $pdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $nom_base_de_donnees, $utilisateur, $mot_de_passe);

        $requeteSql = $pdo->prepare("INSERT INTO formulaire_contact (nom, email, message) VALUES ('".$nom."', '".$email."', '".$message."')");
       if ($requeteSql->execute()) {
            echo "Le message a été envoyé avec succès !";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement du message.";
        }
    } else {
        echo implode('<br>', $erreurs);
    }
}
?>
