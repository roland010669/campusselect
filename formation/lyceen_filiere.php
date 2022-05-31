<?php
$PageTitle = "lycéen-filières";
include_once __DIR__ . "/../../db/connexion.php";
include_once __DIR__ . "/../../includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lycéen-filières</title>
</head>

<body>
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h1 style="color: orange;" class="text-center"><u style="font-style: italic;">Recherche Par
                    Filière-Lycéen</u>
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
                    <figure class="col">
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/lyceen_metier.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>MÉTIER</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/lyceen_affinite.php">
                            <img src="../../Images\représentation_affinité.jpg" alt="Homme sculptant" width="300"
                                height="200"></a>
                        <figcaption>AFFINITÉ/CENTRE D'INTÉRÊT</figcaption>
                    </figure>
                    <figure id="" class="col">
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/lyceen_departement.php"> <img
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
                    href="http://localhost/CAMPUS_SELECT/views/formation/listeCompletePatrimoineBati_lyceen.php"><strong
                        style="color: white;">Liste
                        Complète Patrimoine
                        Bâti-Lycéen</strong> </a> </button>
        </div>
        <div>
            <form name="selectPB" action="traitement_filierePB_lyceen.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Patrimoine Bâti recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
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
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteHorticulturePaysage_Lyceen.php"><strong
                        style="color: white;">Liste Complète
                        Horticulture-Paysage_Lycéen </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_FiliereHT_Lyceen.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Horticulture-Paysage recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau_3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau_4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
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
            <button type="button" class="btn btn-dark"><a href="ListeCompleteTourismeAccueil_Lyceen.php"><strong
                        style="color: white;">Liste Complète
                        Tourisme Patrimonial-Acceuil-Lycéen </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filiereAT_Lyceen.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3>Tourisme Patrimonial-Acceuil recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
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
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteGastronomie_Lyceen.php"><strong
                        style="color: white;">Liste Complète
                        Gastronomie-Hotellerie-Cuisine-Lycéen</strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filiereGastronomie_Lyceen.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Gastronomie-Hotellerie-Cuisine recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                </div>
                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75"> 75-Paris <br>
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
            <button type="button" class="btn btn-dark"><a href="ListeCompleteArtDesign_Lyceen.php"><strong
                        style="color: white;">Liste Complète
                        Métiers d'Art et du design-Lycéen </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_Art_Design_Lyceen.php" method="post" class="border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Métiers d'Art et du design recherche Affinée</h3>
                    <hr>
                    <h2 class="text-cente" style="color: red; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3<br>
                    <input type="checkbox" name="sel[]" value="4">Niveau 4<br>
                    <input type="checkbox" name="sel[]" value="5">Niveau 5<br>
                </div>
                <div>
                    <h2 class="text-cente" style="color: red; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75"> 75-Paris <br>
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
include_once __DIR__ . "/../../includes/footer.php";
?>