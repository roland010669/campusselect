<?php
$PageTitle = "recherche par métier-étudiant";
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
            <h1 style="color: orange;" class="text-center"><u style="font-style: italic;">Recherche Par
                    Métier-étudiant</u>
            </h1>
        </div>
        <!-- OFFCANVAS -->
        <a class="btn btn-light" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            AUTRES OPTIONS DE RECHERCHE
        </a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">SÉLECTION</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="text-center">
                    CHOISISSEZ VOTRE MODE DE RECHERCHE PAR:
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/etudiant_filiere.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>Filière</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/etudiant_affinite.php">
                            <img src="../../Images\représentation_affinité.jpg" alt="Homme sculptant" width="300"
                                height="200"></a>
                        <figcaption>AFFINITÉ/CENTRE D'INTÉRÊT</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/etudiant_departement.php"> <img
                                src="../../Images\représentation_département_redim.jpg" alt="Homme taillant un arbre"
                                width="300" height="200"></a>
                        <figcaption>DÉPARTEMENT</figcaption>
                    </figure>
                </div>

            </div>
        </div>

    </div>
    <hr>

    <form name="selectMetier" id="metierSelection" action="traitement_Metier_Etudiant.php" method="post"
        class="border border-dark" style="background-color: orange;">
        <p><strong>Pour un Choix Ciblé,Faites une Recherche combinée : Métier (ET/OU)(NIVEAU/Département )</strong></p>
        <div>
            <label for="nomMetier">Veuillez saisir le Nom du métier recherché</label>
            <input class="form-control form-control-lg" type="text" aria-label=".form-control-lg example" id="nomMetier"
                name="nomMetier">
        </div>
        <div>
            <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
            <input type="checkbox" name="niveau[]" value="3">Niveau 3<br>
            <input type="checkbox" name="niveau[]" value="4">Niveau 4<br>
            <input type="checkbox" name="niveau[]" value="5">Niveau 5<br>
            <input type="checkbox" name="niveau[]" value="6">Niveau 6<br>
            <br>
        </div>
        <div>
            <h2 class="text-cente" style="color: red; font-style:italic">Département</h2>
            <input type="checkbox" name="departement[]" value="75">75-Paris <br>
            <input type="checkbox" name="departement[]" value="77">77-Seine-et-Marne<br>
            <input type="checkbox" name="departement[]" value="78">78-Yvelines<br>
            <input type="checkbox" name="departement[]" value="91">91-Essonne<br>
            <input type="checkbox" name="departement[]" value="92">92-Hauts-de-Seine<br>
            <input type="checkbox" name="departement[]" value="93">93-Seine-saint-Denis<br>
            <input type="checkbox" name="departement[]" value="94">94-Val-de-Marne<br>
            <input type="checkbox" name="departement[]" value="95">95-Val-d'oise<br>
        </div>
        <input type="submit" value="Valider">
    </form>

</body>

</html>
<hr>
<?php
include __DIR__ . "/../../includes/footer.php";
?>