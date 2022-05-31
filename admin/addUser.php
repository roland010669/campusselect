<?php
$PageTitle = "addUser";
include __DIR__ . "/../../includes/header.php";
?>
<h3 style="font-style: italic;" class="text-center">Ici vous pouvez ajouter les données d'un nouvel Administrateur</h3>

<form action="addUser_traitement.php" method="POST">
    <label for="username" class="form-label"><strong style="font-style: italic;">Nom du nouvel Administrateur
            :</strong></label>
    <input style="background-color: #F4A94E1F;" type="text" id="username" name="username" class="form-control" value="">
    <label for="password" class="form-label"><strong style="font-style: italic;">Mot de passe Attribué : <p sty></p>
        </strong></label>
    <input style="background-color: #F4A94E1F;" type="password" id="password" name="password" class="form-control"
        value="">
    <label for="role" class="form-label"><strong style="font-style: italic;"> Role :</strong></label>
    <input style="background-color: #F4A94E1F;" type="text" id="role" name="role" class="form-control" value=""><br>

    <input type="submit" value="AJOUTER" class="btn btn-danger">
</form>