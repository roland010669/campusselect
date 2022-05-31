<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traitement_filièreGastronomie_Adulte</title>
</head>

<body>
    <?php
    $PageTitle = "traitement_filièreGastronomie_Adulte";
    include __DIR__ . "/../../includes/header.php";
    include __DIR__ . "/../../db/connexion.php";
  


    function recupSel()
    {
        isset($_POST) ? $_POST : [];
        $selFeedback = $_POST;
        foreach ($selFeedback as $tabsel) {
            return $tabsel;
        }
    }

    $tabsel = recupSel();

    if (empty($tabsel)) {
        //$tabsel = '';
        echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
        exit;
    } elseif (count($tabsel) > 2) {

        echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
        exit;
    } else {
        $res = new Formation();
        function Fres()
        {

            $tabsel = recupSel();
            if (count($tabsel) == 1) {


                if ($tabsel[0] == '3') {

                    try {
                        $connexion = new Connexion();
                        $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='G'");
                        $pdoStatement->bindParam(':niveau', $tabsel[0]);
                        $pdoStatement->execute();
                        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                        $tabres = $pdoStatement->fetchAll();

                        return $tabres;
                    } catch (Exception $e) {
                        echo "ERREUR : " . $e->getMessage();
                    }
                }

                if ($tabsel[0] == '4') {

                    try {

                        $connexion = new Connexion();
                        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='G'");
                        $pdoStatement->bindParam(':niveau', $tabsel[0]);
                        $pdoStatement->execute();
                        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                        $tabres = $pdoStatement->fetchAll();

                        return $tabres;
                    } catch (Exception $e) {
                        echo "ERREUR : " . $e->getMessage();
                    }
                }
                if ($tabsel[0] == '5') {

                    try {

                        $connexion = new Connexion();
                        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='G'");
                        $pdoStatement->bindParam(':niveau', $tabsel[0]);
                        $pdoStatement->execute();
                        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                        $tabres = $pdoStatement->fetchAll();

                        return $tabres;
                    } catch (Exception $e) {
                        echo "ERREUR : " . $e->getMessage();
                    }
                }
                if ($tabsel[0] == '6') {

                    try {

                        $connexion = new Connexion();
                        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='G'");
                        $pdoStatement->bindParam(':niveau', $tabsel[0]);
                        $pdoStatement->execute();
                        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                        $tabres = $pdoStatement->fetchAll();

                        return $tabres;
                    } catch (Exception $e) {
                        echo "ERREUR : " . $e->getMessage();
                    }
                }
                if ($tabsel[0] == '7') {

                    try {

                        $connexion = new Connexion();
                        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='G'");
                        $pdoStatement->bindParam(':niveau', $tabsel[0]);
                        $pdoStatement->execute();
                        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                        $tabres = $pdoStatement->fetchAll();

                        return $tabres;
                    } catch (Exception $e) {
                        echo "ERREUR : " . $e->getMessage();
                    }
                }
                $tabDep = array('75', '77',  '78',  '91',  '92',  '93',  '94',  '95');
                if (in_array($tabsel[0], $tabDep)) {
                    try {

                        $connexion = new Connexion();
                        $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND filiere='G' AND niveau IN (3,4,5,6,7)");
                        $pdoStatement->bindParam(':departement', $tabsel[0]);
                        $pdoStatement->execute();
                        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                        $tabres = $pdoStatement->fetchAll();

                        return $tabres;
                    } catch (Exception $e) {
                        echo "ERREUR : " . $e->getMessage();
                    }
                }
            }
            if (count($tabsel) == 2) {

                try {

                    $connexion = new Connexion();
                    $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement = :departement AND filiere='G'");
                    $pdoStatement->bindParam(':niveau', $tabsel[0], PDO::PARAM_INT);
                    $pdoStatement->bindParam(':departement', $tabsel[1], PDO::PARAM_INT);
                    $pdoStatement->execute();
                    $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
                    $tabres = $pdoStatement->fetchAll();
                    return $tabres;
                } catch (Exception $e) {
                    echo "ERREUR : " . $e->getMessage();
                }
            }
        }
    }

    ?>
    <h1 style="color: orange;" class="text-center">Gastronomie-Hotellerie-Cuisine-Lycéen
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

            foreach (Fres($y) as $r) : ?>
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