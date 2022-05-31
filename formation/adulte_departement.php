<?php
$PageTitle = "recherche par département-adulte";
include __DIR__ . "/../../includes/header.php";
?>
<div class="p-2 w-100 bd-highlight">
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h1 style="color: orange;" class="text-center"><u>Recherche Par Département-Adulte</u></h1>



            <h5 style="text-shadow: 2px 2px 2px pink ;font-style: italic" class="text-center">NB : Pour un Choix
                Ciblé,Faites une Recherche combinée : Département
                (ET/OU)(NIVEAU/FILIERE). </h5>
            <br>
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
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/adulte_filiere.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>Filière</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/adulte_metier.php"> <img
                                src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>Métier</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/adulte_affinite.php"><img
                                src="../../Images\représentation_affinité.jpg" alt="Homme sculptant" width="300"
                                height="200"> </a>
                        <figcaption>Affinité/centre d'Intérêt </figcaption>
                    </figure>
                </div>

            </div>
        </div>
        <!-- OFFCANVAS -->
    </div>

    <div class="p-2 w-100 bd-highlight">

        <div>
            <form name="selectPB" action=" traitement_departement_adulte.php" method="post"
                class="border    border-dark" style="background-color: orange;">
                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75">75-Paris <br>
                    <input type="checkbox" name="sel[]" value="77">77-Seine-et-Marne<br>
                    <input type="checkbox" name="sel[]" value="78">78-Yvelines<br>
                    <input type="checkbox" name="sel[]" value="91">91-Essonne<br>
                    <input type="checkbox" name="sel[]" value="92">92-Hauts-de-Seine<br>
                    <input type="checkbox" name="sel[]" value="93">93-Seine-saint-Denis<br>
                    <input type="checkbox" name="sel[]" value="94">94-Val-de-Marne<br>
                    <input type="checkbox" name="sel[]" value="95">95-Val-d'oise<br>
                </div>

                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>

                </div> <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                <input type="checkbox" name="sel[]" value="6">Niveau 6<br>
                <input type="checkbox" name="sel[]" value="7">Niveau 7<br>

                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Filière</h2>
                    <input type="checkbox" name="sel[]" value="PB">Patrimoine Bâti <br>
                    <input type="checkbox" name="sel[]" value="HT">Horticulture-Paysage <br>
                    <input type="checkbox" name="sel[]" value="AT">Tourisme Patrimonial-Acceuil <br>
                    <input type="checkbox" name="sel[]" value="G">Gastronomie-Hotellerie-Cuisine <br>
                    <input type="checkbox" name="sel[]" value="AD">Métiers d'Art et du design <br>
                </div>
                <input type="submit" value="Valider">
            </form>
        </div><br>
    </div>
    <?php
    include __DIR__ . "/../../includes/footer.php";
    ?>