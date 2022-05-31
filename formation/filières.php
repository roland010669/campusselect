<?php
$PageTitle = "filières";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../campus.css">
    <title>Document</title>

</head>

<body>
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h1 style="color: orange;" class="text-center"><u style="font-style: italic;">Recherche Par
                    Filière-Collégien</u> </h1>
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
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/metier.php">
                            <img src="../../Images/illustration métier_redimensionnée.jpg" alt="Homme sculptant"
                                width="300" height="200">
                        </a>
                        <figcaption>MÉTIER</figcaption>
                    </figure>
                    <figure>
                        <a href="http://localhost/CAMPUS_SELECT/views/formation/affinite.php">
                            <img src="../../Images\représentation_affinité.jpg" alt="Homme sculptant" width="300"
                                height="200"></a>
                        <figcaption>AFFINITÉ/CENTRE D'INTÉRÊT</figcaption>
                    </figure>
                    <figure id="" class="col">
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
    <div>Vous pouvez :
        <ol>
            <li>Consulter la Liste Complète</li>
            <li> Affiner votre recherche en sélectionnant le niveau (et/ou) le département</li>
        </ol>
    </div>



    <div class="p-2 w-100 bd-highlight">
        <div class="text-center" style="background-color:#62529c ;">
            <button type="button" class="btn btn-dark" style="background-color:white ;"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/listeCompletePatrimoineBati.php"><strong
                        style="color:#62529c ;">Liste Complète Patrimoine Bâti</strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filieresPB.php" method="post" class="border border-dark text-center"
                style="background-color: orange;">
                <div>
                    <style>
                    input[type=submit] {
                        background-color: #62529c;
                        border: none;
                        color: #fff;
                        padding: 15px 30px;
                        text-decoration: none;
                        margin: 10px 15px;
                        cursor: pointer;
                    }

                    input[type=checkbox] {
                        position: relative;
                        height: 25;
                        width: 25;
                        padding: 15px 30px;
                        text-decoration: none;
                        margin: 15px 30px;
                        cursor: pointer;
                        vertical-align: middle;
                    }
                    </style>

                    <h3 class="text-center"> Patrimoine Bâti recherche Affinée</h3>
                    <hr>
                    <h2 style="color:#62529c ; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3
                    <input type="checkbox" name="sel[]" value="4">Niveau 4
                </div>
                <div>
                    <h2 style="color: #62529c; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75">75-Paris
                    <input type="checkbox" name="sel[]" value="77">77-Seine-et-Marne
                    <input type="checkbox" name="sel[]" value="78">78-Yvelines
                    <input type="checkbox" name="sel[]" value="91">91-Essonne<br>
                    <input type="checkbox" name="sel[]" value="92">92-Hauts-de-Seine
                    <input type="checkbox" name="sel[]" value="93">93-Seine-saint-Denis
                    <input type="checkbox" name="sel[]" value="94">94-Val-de-Marne
                    <input type="checkbox" name="sel[]" value="95">95-Val-d'oise<br>
                </div>
                <div>
                    <input type="submit" value="Valider">
                </div>

            </form>
        </div><br>
        <div>
            <iframe class="text-center"
                src="https://www.google.com/maps/d/embed?mid=1c23otvOpfiC_qBDwoXNYG0l6yJWPFSwm&ehbc=2E312F" width="640"
                height="480"></iframe>
        </div>
        <div class="text-center" style="background-color:#62529c ;"> <button type="button" class="btn btn-dark"
                style="background-color:white ;"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/listeCompleteHorticulturePaysage.php"><strong
                        style="color:#62529c ;">Liste Complète
                        Horticulture-Paysage </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filieresHT.php" method="post" class="border border-dark text-center"
                style="background-color: orange;">

                <div>
                    <h3> Horticulture-Paysage recherche Affinée</h3>
                    <hr>
                    <h2 style="color:#62529c ; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3 <input type="checkbox" name="sel[]"
                        value="4">Niveau 4
                </div>
                <div>
                    <h2 style="color:#62529c ; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75">75-Paris
                    <input type="checkbox" name="sel[]" value="77">77-Seine-et-Marne
                    <input type="checkbox" name="sel[]" value="78">78-Yvelines <input type="checkbox" name="sel[]"
                        value="91">91-Essonne<br>
                    <input type="checkbox" name="sel[]" value="92">92-Hauts-de-Seine
                    <input type="checkbox" name="sel[]" value="93">93-Seine-saint-Denis
                    <input type="checkbox" name="sel[]" value="94">94-Val-de-Marne
                    <input type="checkbox" name="sel[]" value="95">95-Val-d'oise
                </div>
                <input type="submit" value="Valider">
            </form>
        </div><br>
        <div class="text-center" style="background-color:#62529c ;">
            <button type="button" class="btn btn-dark" style="background-color:white ;"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteTourismeAccueil.php"><strong
                        style="color:#62529c ;">Liste Complète
                        Tourisme Patrimonial-Acceuil </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filieresAT.php" method="post" class="text-center border border-dark"
                style="background-color: orange;">
                <div>
                    <h3>Tourisme Patrimonial-Acceuil recherche Affinée</h3>
                    <hr>
                    <h2 style="color:#62529c ; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3
                    <input type="checkbox" name="sel[]" value="4">Niveau 4
                </div>
                <div>
                    <h2 style="color:#62529c ; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75">75-Paris
                    <input type="checkbox" name="sel[]" value="77">77-Seine-et-Marne
                    <input type="checkbox" name="sel[]" value="78">78-Yvelines
                    <input type="checkbox" name="sel[]" value="91">91-Essonne<br>
                    <input type="checkbox" name="sel[]" value="92">92-Hauts-de-Seine
                    <input type="checkbox" name="sel[]" value="93">93-Seine-saint-Denis
                    <input type="checkbox" name="sel[]" value="94">94-Val-de-Marne
                    <input type="checkbox" name="sel[]" value="95">95-Val-d'oise
                </div><br>
                <input type="submit" value="Valider">
            </form>
        </div><br>
        <div class="text-center" style="background-color:#62529c ;">
            <button type="button" class="btn btn-dark" style="background-color:white ;"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteGastronomie_H_C.php"><strong
                        style="color:#62529c ;">Liste Complète
                        Gastronomie-Hotellerie-Cuisine</strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filieresG.php" method="post" class="text-center border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Gastronomie-Hotellerie-Cuisine recherche Affinée</h3>
                    <hr>
                    <h2 style="color:#62529c ; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3
                    <input type="checkbox" name="sel[]" value="4">Niveau 4
                </div>
                <div>
                    <h2 style="color:#62529c ; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75">75-Paris
                    <input type="checkbox" name="sel[]" value="77">77-Seine-et-Marne
                    <input type="checkbox" name="sel[]" value="78">78-Yvelines
                    <input type="checkbox" name="sel[]" value="91">91-Essonne<br>
                    <input type="checkbox" name="sel[]" value="92">92-Hauts-de-Seine
                    <input type="checkbox" name="sel[]" value="93">93-Seine-saint-Denis
                    <input type="checkbox" name="sel[]" value="94">94-Val-de-Marne
                    <input type="checkbox" name="sel[]" value="95">95-Val-d'oise
                </div><br>
                <input type="submit" value="Valider">
            </form>
        </div><br>
        <div class="text-center" style="background-color:#62529c ;">
            <button type="button" class="btn btn-dark" style="background-color:white ;"><a
                    href="http://localhost/CAMPUS_SELECT/views/formation/ListeCompleteArt_Design.php"><strong
                        style="color:#62529c ;">Liste Complète
                        Métiers d'Art et du design </strong> </a> </button>
        </div>
        <div>
            <form name="" action="traitement_filieresAD.php" method="post" class="text-center border border-dark"
                style="background-color: orange;">
                <div>
                    <h3> Métiers d'Art et du design recherche Affinée</h3>
                    <hr>
                    <h2 style="color:#62529c ; font-style:italic">Niveau</h2>
                    <input type="checkbox" name="sel[]" value="3">Niveau 3
                    <input type="checkbox" name="sel[]" value="4">Niveau 4
                </div>
                <div>
                    <h2 style="color:#62529c ; font-style:italic">Département</h2>
                    <input type="checkbox" name="sel[]" value="75">75-Paris
                    <input type="checkbox" name="sel[]" value="77">77-Seine-et-Marne
                    <input type="checkbox" name="sel[]" value="78">78-Yvelines
                    <input type="checkbox" name="sel[]" value="91">91-Essonne<br>
                    <input type="checkbox" name="sel[]" value="92">92-Hauts-de-Seine
                    <input type="checkbox" name="sel[]" value="93">93-Seine-saint-Denis
                    <input type="checkbox" name="sel[]" value="94">94-Val-de-Marne
                    <input type="checkbox" name="sel[]" value="95">95-Val-d'oise
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