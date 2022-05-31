<?php
$PageTitle = "adulte-filières";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adulte-filières</title>
</head>

<body>
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h1 style="color: orange;" class="text-center"><u style="font-style: italic;">Recherche Par
                    Filière-adulte</u>
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
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/adulte_metier.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>MÉTIER</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/adulte_affinite.php">
                            <img src="../../Images\représentation_affinité.jpg" alt="Homme sculptant" width="300"
                                height="200"></a>
                        <figcaption>AFFINITÉ/CENTRE D'INTÉRÊT</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/adulte_departement.php"> <img
                                src="../../Images\représentation_département_redim.jpg" alt="Homme taillant un arbre"
                                width="300" height="200"></a>
                        <figcaption>DÉPARTEMENT</figcaption>
                    </figure>
                </div>

            </div>
        </div>
        <!-- OFFCANVAS -->
    </div>
    <div>Vous pouvez :
        <ol>
            <li>Consulter la Liste Complète</li>
            <li> Affiner votre recherche en sélectionnant le niveau (et/ou) le département</li>
        </ol>
    </div>



    <div class="p-2 w-100 bd-highlight">
        <div>
            <button type="button" class="btn btn-dark"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompletePB_Adulte.php"><strong
                        style="color: white;">Liste Complète
                        Patrimoine Bâti</strong> </a> </button>
        </div>
        <div>
            <form action="traitementFiliere_PB_Adulte.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Patrimoine Bâti recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                    <input type="checkbox" name="sel[]" value="6">Niveau 6<br>
                    <input type="checkbox" name="sel[]" value="7">Niveau 7<br>
                </div>
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

                <input type="submit" value="Valider">
            </form>
        </div><br>
        <iframe class="text-center"
            src="https://www.google.com/maps/d/embed?mid=1c23otvOpfiC_qBDwoXNYG0l6yJWPFSwm&ehbc=2E312F" width="640"
            height="480"></iframe>
        <div>
            <button type="button" class="btn btn-dark"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteHT_Adulte.php"><strong
                        style="color: white;">Liste Complète
                        Horticulture-Paysage </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitementFiliere_HT_Adulte.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Horticulture-Paysage recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                    <input type="checkbox" name="sel[]" value="6">Niveau 6<br>
                    <input type="checkbox" name="sel[]" value="7">Niveau 7<br>

                </div>
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
                <input type="submit" value="Valider">
            </form>
        </div><br>
        <div>
            <button type="button" class="btn btn-dark"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteAT_Adulte.php"><strong
                        style="color: white;">Liste Complète
                        Tourisme Patrimonial-Acceuil </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitementFiliere_AT_Adulte.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3>Tourisme Patrimonial-Acceuil recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                    <input type="checkbox" name="sel[]" value="6">Niveau 6<br>
                    <input type="checkbox" name="sel[]" value="7">Niveau 7<br>
                </div>
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
                </div><br>
                <input type="submit" value="Valider">
            </form>
        </div><br>
        <div>
            <button type="button" class="btn btn-dark"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteG_Adulte.php"><strong
                        style="color: white;">Liste Complète
                        Gastronomie-Hotellerie-Cuisine</strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitementFiliere_G_Adulte.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Gastronomie-Hotellerie-Cuisine recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                    <input type="checkbox" name="sel[]" value="6">Niveau 6<br>
                    <input type="checkbox" name="sel[]" value="7">Niveau 7<br>
                </div>
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
                </div><br>
                <input type="submit" value="Valider">
            </form>
        </div><br>
        <div>
            <button type="button" class="btn btn-dark"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteAD_Adulte.php"><strong
                        style="color: white;">Liste Complète
                        Métiers d'Art et du design </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitementFiliere_AD_Adulte.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Métiers d'Art et du design recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                    <input type="checkbox" name="sel[]" value="6">Niveau 6<br>
                    <input type="checkbox" name="sel[]" value="7">Niveau 7<br>
                </div>
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
                </div><br>
                <input type="submit" value="Valider">
            </form>
        </div><br>


    </div>
</body>

</html>



<hr>
<?php
include __DIR__ . "/../../includes/footer.php";
?>