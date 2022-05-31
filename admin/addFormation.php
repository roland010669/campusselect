<?php
$PageTitle = "Ajouter une Formation";
include  __DIR__ . "/../../includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une formation</title>
</head>

<body>
    <h1>Ajouter une formation</h1>

    <form action="addFormation_traitement.php" method="post">
        <div class="form-group">
            <label for="metier">Métier</label>
            <input style="background-color: #F4A94E1F;" class="form-control" type="text" id="metier" name="metier"
                value="">
        </div>
        <div class="form-group">

            <label for="filiere">Filière (veuillez sélectionner dans la liste)</label>
            <select style="background-color: #F4A94E1F;" name="filiere" id="filiere" class="form-control">
                <option value="PB">PB</option>
                <option value="HT">HT</option>
                <option value="AT">AT</option>
                <option value="G">G</option>
                <option value="AD">AD</option>
            </select>
        </div>
        <div class="form-group">
            <label for="diplome">Diplome</label>
            <input style="background-color: #F4A94E1F;" class="form-control" type="text" id="diplome" name="diplome"
                value="">
        </div>
        <div class="form-group">

            <label for="niveau">Niveau (veuillez sélectionner dans la liste)
            </label>
            <select style="background-color: #F4A94E1F;" name="niveau" id="niveau" class="form-control">
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
        </div>
        <div class="form-group">

            <label for="departement">Département (veuillez sélectionner dans la liste)</label>
            <select style="background-color: #F4A94E1F;" name="departement" id="departement" class="form-control">
                <option value="75">75</option>
                <option value="77">77</option>
                <option value="78">78</option>
                <option value="91">91</option>
                <option value="92">92</option>
                <option value="93">93</option>
                <option value="94">94</option>
                <option value="95">95</option>
            </select>
        </div>
        <div class="form-group">
            <label for="etab_dép">Établissements par département</label>
            <input style="background-color: #F4A94E1F;" class="form-control" type="url" id="etab_dep" name="etab_dep"
                value="">
        </div>

        <div class="form-group">
            <label for="parcours">Parcours</label>
            <input style="background-color: #F4A94E1F;" class="form-control" type="url" id="parcours" name="parcours"
                value="">
        </div>
        <div class="form-group">
            <label for="fiche_métier">Fiche Métier</label>
            <input style="background-color: #F4A94E1F;" class="form-control" type="url" id="fiche_metier"
                name="fiche_metier" value="">
        </div>
        <div class="form-group">
            <label for="fiche_onisep">Fiche onisep</label>
            <input style="background-color: #F4A94E1F;" class="form-control" type="url" id="fiche_onisep"
                name="fiche_onisep" value="">
        </div><br>


        <div>
            <input style="background-color:#62529c ;" class="btn btn-primary" type="submit"
                value="Ajouter la formation">
        </div>
    </form>
    <hr>
</body>

</html>