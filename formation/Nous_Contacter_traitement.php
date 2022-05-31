<?php
session_start();
$PageTitle = "Nous_Contacter_traitement";
include_once __DIR__ . "/../../includes/header.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PageTitle; ?></title>
</head>

<body>

    <?php
    # validation des données
    # validation du Nom
    isset($_POST['name']) ? trim($_POST['name']) : '';
    $nomContact = trim($_POST['name']);
    $nomContact = htmlentities($nomContact);
    $_SESSION['error'] = [];


    if (empty($nomContact)) {
        $error = "nom";
        $_SESSION['error'][] = [$error];
    }


    # validation du Prénom
    isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $prenomContact = trim($_POST['prenom']);
    $prenomContact = htmlentities($prenomContact);
    if (empty($prenomContact)) {
        $error = "prenom";
        $_SESSION['error'][] = [$error];
    }
    # validation du Mail
    $mailContact = $_POST['mail'];
    $format = "/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/";
    isset($_POST['mail']) ? trim($_POST['mail']) : '';
    $mailContact = htmlentities($mailContact);

    if (empty($mailContact) || preg_match($format, $mailContact) == false) {
        $error = "mail";
        $_SESSION['error'][] = [$error];
    }
    # validation du Tel
    $telContact = $_POST['tel'];
    isset($_POST['tel']) ? trim($_POST['tel']) : '';
    $telContact = htmlentities($telContact);

    if (empty($telContact) || strlen($telContact) !== 10) {
        $error = "tel";
        $_SESSION['error'][] = [$error];
    }

    if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
        foreach ($_SESSION['error'] as $e) { ?>

    <p style='color:red ' class="text-capitalize text-center fs-2 fw-bold fst-italic" ;>
        <?php echo "le champ " . $e[0] . " est invalide !" ?>
    </p>
    <?php }
    } else {
        echo "votre message à été envoyer avec succès ";
    }

    include_once __DIR__ . "/../../includes/footer.php";
    /*unset($_SESSION['error']);
    ini_set('SMTP', "smtp.gmail.com");
    ini_set('smtp_port', "587");
    ini_set('sendmail_from', "<rolandmerhej8@gmail.com>");
    ini_set('password', "rolandrichard1&");
    mail('rolandmerhej8@gmail.com', 'Message de la page contact CAMPUS_SELECT :', $_POST['msg']);*/

    ?>
</body>

</html>