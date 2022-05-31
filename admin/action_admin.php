<?php
session_start();
$PageTitle = "action_admin";
include __DIR__ . "/../../includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width
    , initial-scale=1.0">
    <title><?php echo $PageTitle; ?></title>
</head>

<body>


    <h1 class="text-center" style="color: red;">Page d'Administration</h1>
    <a class="btn btn-danger" style="background-color:#62529c ;" href="http://localhost/CAMPUS_SELECT/logout.php"
        role="button">Déconnexion</a>

    <ul class="d-grid gap-2">
        <li style="background-color:#62529c ;" class="btn btn-info"><a
                href="http://localhost/CAMPUS_SELECT/views/admin/readFormation.php"><strong
                    style="color: white; font-style:italic">CONSULTER UNE FORMATION</strong></a></li>
        <li style="background-color:#62529c ;" class="btn btn-warning"><a
                href="http://localhost/CAMPUS_SELECT/views/admin/updateFormation.php"><strong
                    style="color: white; font-style:italic">MODIFIER UNE FORMATION</strong> </a></li>
        <li style="background-color:#62529c ;" class="btn btn-primary"><a
                href="http://localhost/CAMPUS_SELECT/views/admin/addFormation.php"> <strong
                    style="color: white; font-style:italic">AJOUTER UNE FORMATION</strong> </a></li>

        <li style="background-color:#62529c ;" class="btn btn-primary"><a
                href="http://localhost/CAMPUS_SELECT/views/admin/addUser.php"> <strong
                    style="color: white; font-style:italic">AJOUTER UN ADMINISTRATEUR</strong> </a></li>
        <li class="btn btn-danger"><a href="http://localhost/CAMPUS_SELECT/views/admin/deleteUser.php"> <strong
                    style="color: white; font-style:italic">SUPPRIMER UN ADMINISTRATEUR</strong> </a></li>
        <li class="btn btn-danger"><a href="http://localhost/CAMPUS_SELECT/views/admin/deleteFormation.php"><strong
                    style="color: white; font-style:italic">SUPPRIMER UNE FORMATION</strong></a></li>
    </ul>
    <hr>
    <?php include_once __DIR__ . "/../..//includes/footer.php"; ?>
</body>

</html>