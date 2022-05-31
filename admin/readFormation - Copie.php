<?php
$PageTitle = "readFormation";
include __DIR__ . "/../../includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $PageTitle; ?></title>
</head>

<body>
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h1 style="color: red;" class="text-center"><u style="font-style: italic;">Consulter une Formation</u> </h1>
        </div>
    </div>
    <hr>

    <form action="readFormation_traitement.php" method="POST" name="formRead" id="formRead">
        <label for="metier">Veuillez saisir le Nom de la formation recherchée</label>
        <input class="form-control form-control-lg" type="text" aria-label=".form-control-lg example" id="metier"
            name="metier">
        <button type="submit" class="btn btn-secondary">VALIDER</button>
    </form>
    <?php include __DIR__ . "/../../includes/footer.php"; ?>
</body>

</html>
<hr>