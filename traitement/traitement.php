<?php
session_start();
//tous les traitements du site se font ici


// envoie de mail par le serveur mail
function send($destination, $objet, $message)
{
    // email du hackathon
    // $destination = "rigthamar@gmail.com";
    // l'objet du mail
    // $sujet = "Hackathon PTN / Contact / ";
    // le contenu
    // $message = $form['p'] . " " . $form['n'] . "  <br>" . $form['m'];
    // $headers = "From:" . $form['e'];
    $resultat =  mail($destination, $objet, $message);
    if ($resultat) {
        return true;
    } else {
        echo false;
    }
}
// cette fonction permet d'inserer le message dans la basse de donnde
function inserer_message($form, $con)
{
    $sql = "INSERT INTO contact (firstname, lastname, email, message)
        VALUES('" . addslashes($form['p']) . "','" . addslashes($form['n']) . "','" . addslashes($form['e']) . "','" . addslashes($form['m']) . "')";
    $result = $con->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function inserer_candidature($form, $con)
{

    $sql = "INSERT INTO candidature (firstname,lastname,telephone,email,secteur,domaines)
        VALUES('" . addslashes($form['p']) . "','" . addslashes($form['n']) . "','" . addslashes($form['t']) . "','" . addslashes($form['e']) . "','secteur','domain')";
    $result = $con->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// la reponse globale
$reponse = array();
try {
    // code= 0101234567890128TEC-IT  correspond au contact
    if (isset($_POST["code"]) && $_POST["code"] == "0101234567890128TEC-IT") {
        $form = $_POST["form"];
        require 'connexion_base_de_donnee.php';
        if (inserer_message($form, $con)) {
            $destination = "rigthamar@gmail.com";
            $objet = "Hackathon PTN / Contact / ";
            $message = $form['p'] . " " . $form['n'] . "\n" . $form['m'];
            if (send($destination, $objet, $message)) {
                $reponse["status"] = true;
                $reponse["message"] = "Message envoyé avec succés";
            } else {
                $reponse["status"] = true;
                $reponse["message"] = "Echec d'envoie de votre message";
            }
        } else {
            $reponse["status"] = true;
            $reponse["message"] = "Echec d'envoie de votre message";
        }
    } else if (isset($_POST["code"]) && $_POST["code"] == "0101234567890163668TEC-IT") {
        $form = $_POST["form"];
        require 'connexion_base_de_donnee.php';
        if (inserer_candidature($form, $con)) {
            $destination = "rigthamar@gmail.com";
            $objet = "Hackathon PTN / Candidature / ";
            $message = $form['p'] . " " . $form['n'] . "\n" . $form['e'] . "\n" . $form['t'];
            if (send($destination, $objet, $message)) {
                $reponse["status"] = true;
                $reponse["message"] = "Candidature déposé avec succés. Vous recevrez un email de confirmation.";
            } else {
                $reponse["status"] = true;
                $reponse["message"] = "Echec de dépôt. Veuillez rééssayer plus tard";
            }
        } else {
            $reponse["status"] = true;
            $reponse["message"] = "Echec d'envoie de votre message";
        }
    } else if (isset($_POST["code"]) && $_POST["code"] == "0101234567890njvfjuierjuig163668TEC-IT") {
        $form = $_POST["form"];
        require 'connexion_base_de_donnee.php';
        $sql = "select * from admin where username='" . addslashes($form['u']) . "' and password='" . addslashes($form['p']) . "'";
        $result = $con->query($sql);
        if ($row = $result->fetch_array()) {
            $_SESSION["connexion_admin"]=true;
            $_SESSION["admin"]=$row;

            $reponse["status"] = true;
            $reponse["message"] = "Connexion éffectuée avec succés";
        } else {
            $reponse["status"] = false;
            $reponse["message"] = "Username ou mot de pass incorrect";
        }
    } else {
        $reponse["status"] = false;
        $reponse["message"] = "Pas de ifclose correspondant";
    }
} catch (\Throwable $th) {
    $reponse["status"] = false;
    $reponse["message"] = "Erreur interne";
}
echo json_encode($reponse);
