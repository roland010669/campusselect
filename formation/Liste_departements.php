<?php
include __DIR__ . "/../../includes/header.php";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../dao/FormationDAO.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste_départements</title>
</head>

<body>
    <h1 style="text-shadow: 2px 2px 2px pink ;font-style: italic" class="text-center">Liste des Départements
    </h1>
    <?php
    $tabres = [];

    try {
        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select distinct departement from formation order by departement ASC");
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();

        //return $tabres;
    } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
    } ?>


    <?php
    foreach ($tabres as $cle => $val) {

        foreach ($val as $c => $v) :;

    ?>
    <table class="table table-bordered">

        <tbody>
            <tr>

            </tr>

            <tr>
                <td>Département</td>
                <td class="table-primary"><?php echo "<p>$v</p>"; ?>
                </td>
            </tr>

        </tbody>
    </table>
    <?php endforeach;
    } ?>
    <?php
    include __DIR__ . "/../../includes/footer.php";
    ?>
</body>

</html>