<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une formation</title>
</head>

<body>

    <?php
    session_start();
    $PageTitle = "Modifier une Formation";
    include __DIR__ . "/../../includes/header.php";
    include_once __DIR__ . "/../../models/FormationModel.php";
    include_once __DIR__ . "/../../db/connexion.php";
    ?>
    <h3 class="text-center" style="color: red;">Moddifier une Formation</h3>
    <div>
        <form action="update_traitement.php" method="POST">
            <div>
                <label for="modifFormation" style="font-weight: bold;">Saisir le nom de la Formation à
                    Modifier</label><br>
                <input class="form-control" style="background-color: #F4A94E1F;" type="text" id="modifFormation"
                    name="metier">
            </div><br>
            <div>
                <input style="background-color:#62529c ;" class="btn btn-danger" id="supp" type="submit" name="supp"
                    value="Modifier">
            </div>
        </form>
    </div>
    <?php include_once __DIR__ . "/../../includes/footer.php"; ?>
</body>

</html>