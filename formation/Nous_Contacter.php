<!DOCTYPE html>
<html lang="fr">
<?php session_start();
$PageTitle = "Nous_Contacter";  ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CAMPUS_SELECT/campus.css">
    <title><?php echo $PageTitle ?></title>
</head>


<body>

    <div class="content">
        <?php include __DIR__ . "/../../includes/header.php"; ?>
        <form id="form" method="post" action="Nous_Contacter_traitement.php">
            <div class="mb-3">
                <label for="nom" class="form-label"><strong>Nom</strong></label>
                <input style="background-color: #F4A94E1F;" type="text" class="form-control" id="nom" name="name"
                    maxlength="30">
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label"><strong>Prénom</strong></label>
                <input style="background-color: #F4A94E1F;" type="text" class="form-control" id="prenom" name="prenom"
                    maxlength="30">
            </div>

            <div class="mb-3">
                <label for="mail" class="form-label"><strong>Adresse Email</strong></label>
                <input style="background-color: #F4A94E1F;" type="email" class="form-control" id="mail" name="mail"
                    minlength="8">
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label"><strong>Tél</strong></label>
                <input style="background-color: #F4A94E1F;" type="number" class="form-control" id="tel" name="tel">
            </div>

            <div>
                <textarea name="msg" id="msg" cols="30" rows="10" class="form-control"
                    style="background-color: #F4A94E1F;" placeholder="Votre Message :"></textarea>
            </div> <br>
            <button style="background-color:#62529c ;" type="submit" class="btn btn-success">Envoyer</button>
            <button type="reset" class="btn btn-danger"> Effacer</button>
        </form>

</html>
<?php
include __DIR__ . "/../../includes/footer.php";
?>
</div>
<br>
<hr>

</body>