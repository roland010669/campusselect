<?php
$PageTitle = "recherche par Affinité-collégien";
include __DIR__ . "/../../includes/header.php";
?>
<div class="p-2 w-100 bd-highlight">
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h1 style="color: orange;" class="text-center"><u>Recherche Par Affinité-Collégien</u> </h1>
            <p> <strong>NB : Pour un Choix Ciblé,Faites une Recherche combinée : Affinité
                    (ET/OU)(NIVEAU/FILIERE)</strong></p> <br>
            <hr>
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
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/fili%C3%A8res.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>Filière</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/metier.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200"> </a>
                        <figcaption>Métier</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/choix_dep.php"> <img
                                src="../../Images\représentation_département_redim.jpg" alt="Homme taillant un arbre"
                                width="300" height="200"></a>
                        <figcaption>DÉPARTEMENT</figcaption>
                    </figure>
                </div>

            </div>
        </div>
        <!-- OFFCANVAS -->

    </div>

    <div class="p-2 w-100 bd-highlight">
        <div>
            <form name="selectPB" action="affinite_traitement.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <label for="nomMetier">saisir Affinité</label>
                    <input class="form-control form-control-lg" type="text" aria-label=".form-control-lg example"
                        id="affinite" name="affinite">
                </div>
                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3-CAP<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4-BAC PRO<br>

                </div>
                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Filière</h2>
                    <input type="checkbox" name="sel[]" value="PB">Patrimoine Bâti <br>
                    <input type="checkbox" name="sel[]" value="HT">Horticulture-Paysage <br>
                    <input type="checkbox" name="sel[]" value="AT">Tourisme Patrimonial-Acceuil <br>
                    <input type="checkbox" name="sel[]" value="G">Gastronomie-Hotellerie-Cuisine <br>
                    <input type="checkbox" name="sel[]" value="AD">Métiers d'Art et du design <br>
                </div><input type="submit" value="Valider">
            </form>
        </div><br>
        <?php
        include __DIR__ . "/../../includes/footer.php";
        ?>