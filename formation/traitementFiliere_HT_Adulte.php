<!DOCTYPE html>
<html lang="fr">
<?php
$PageTitle = "traitement_FilièreHT_Adulte";
include_once __DIR__ . "/../../includes/header.php";
include_once __DIR__ . "/../../db/connexion.php";
include_once __DIR__ . "/../../dao/FormationDAO.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PageTitle; ?></title>
</head>

<body>




    <h1 style="color: orange;" class="text-center">Horticulture-Paysage-Lycéen
    </h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Métier</th>
                <th>Filière</th>
                <th>Diplome</th>
                <th>Niveau</th>
                <th>Département</th>
                <th>Etab/dépt</th>
                <th>Parcours</th>
                <th>Fiche Métier</th>
                <th>Fiche Onisep</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $y = new Formation();

            foreach (FresAht($y) as $r) : ?>
            <tr>
                <td class="table-primary"><?php echo $r["metier"]; ?></td>
                <td class="table-primary"><?php echo $r["filiere"]; ?></td>
                <td class="table-secondary"><?php echo $r["diplome"]; ?></td>
                <td class="table-success"><?php echo $r["niveau"]; ?></td>
                <td class="table-success"><?php echo $r["departement"]; ?></td>
                <td class="table-danger"><?php echo "<a href=" . $r["etab_dep"] . ">Liste</a>"; ?></td>
                <td class="table-warning"><?php echo "<a href=" . $r["parcours"] . ">CONSULTER</a>"; ?></td>
                <td class="table-info"><?php echo "<a href=" . $r["fiche_metier"] . ">CONSULTER</a>"; ?></td>
                <td class="table-light"><?php echo "<a href=" . $r["fiche_onisep"] . ">CONSULTER</a>"; ?></td>
                <td><a class="btn btn-danger" href="http://localhost/CAMPUS_SELECT/login.php" role="button">Supprimer
                        cette
                        formation</a></td>
                <td><a class="btn btn-primary" href="http://localhost/CAMPUS_SELECT/login.php" role="button"> Modifier
                        cette
                        formation</a></td>
            </tr>


            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include __DIR__ . "/../../includes/footer.php"; ?>
</body>

</html>