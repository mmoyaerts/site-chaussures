<?php
//error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD'] == "POST") {

if(isset($_POST['submit']))
{

    $nom = $_POST['nom'];
    $email = $_POST['email'];
	$destinataire = 'mathieu.moyaerts.pro@gmail.com';
	$sujet = "Mai";
	$message = 'ok';
    if(mail('mathieu.moyaerts@gmail.com', 'Mon Sujet', 'ok'))
	{
        echo "Le message est envoyé";
    }
    else{
        echo "le message n'est pas envoyé";
    }

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
        $utilisateur =   'mmoyaerts';
        $mot_de_passe = 'password';
        $nom_base_de_donnees = 'mmoyaertsDB';
        
        $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);
        if(!$connexion)
        {
            die("erreur de la connexion vers la base de donnée");
        }

        $requeteSql = "INSERT INTO formulaire_contact (nom, email, message) VALUES ('".$nom."', '".$email."', '".$message."')";
        $result = mysqli_query($connexion, $requeteSql);
        if(!$result)
        {
            die("Erreur dans la syntaxe : " . mysqli_error($connexion));
        }
        if ($requeteSql->execute()) {
            echo "Le message a été envoyé avec succès !";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement du message.";
        }
    } else {
        echo implode('<br>', $erreurs);
    }
}
}

?>