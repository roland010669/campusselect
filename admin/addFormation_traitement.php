<?php
$PageTitle = "addFormation_traitement";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../models/FormationModel.php";

# récupération des données saisies
isset($_POST['metier']) ? $_POST['metier'] : '';
$metierFeadBack = $_POST['metier'];
isset($_POST['filiere']) ? $_POST['filiere'] : '';
$filiereFeadBack = $_POST['filiere'];
isset($_POST['diplome']) ? $_POST['diplome'] : '';
$diplomeFeadBack = $_POST['diplome'];
isset($_POST['niveau']) ? $_POST['niveau'] : '';
$niveauFeadBack = $_POST['niveau'];
isset($_POST['departement']) ? $_POST['departement'] : '';
$departementFeadBack = $_POST['departement'];
isset($_POST['etab_dep']) ? $_POST['etab_dep'] : '';
$etab_depFeadBack = $_POST['etab_dep'];
isset($_POST['parcours']) ? $_POST['parcours'] : '';
$parcoursFeadBack = $_POST['parcours'];
isset($_POST['fiche_metier']) ? $_POST['fiche_metier'] : '';
$fiche_metierFeadBack = $_POST['fiche_metier'];
isset($_POST['fiche_onisep']) ? $_POST['fiche_onisep'] : '';
$fiche_onisepFeadBack = $_POST['fiche_onisep'];
$erreurs = [];
# validation des données 
# métier
$metierFeadBack = trim($metierFeadBack);
$metierFeadBack = htmlspecialchars($metierFeadBack);
if (empty($metierFeadBack) == true) {
  $erreurs[0] = "le champ métier ne peut être vide!";
}

# Filière
$filiereFeadBack = trim($filiereFeadBack);
$filiereFeadBack = htmlspecialchars($filiereFeadBack);
if (empty($filiereFeadBack) == true) {
  $erreurs[1] = "<br>le champ filière ne peut être vide!";
}
# Diplome
$diplomeFeadBack = trim($diplomeFeadBack);
$diplomeFeadBack = htmlspecialchars($diplomeFeadBack);
if (empty($diplomeFeadBack) == true) {
  $erreurs[2] = "<br>le champ diplome ne peut être vide!";
}

# Niveau
$niveauFeadBack = trim($niveauFeadBack);
$niveauFeadBack = htmlspecialchars($niveauFeadBack);
if ((empty($niveauFeadBack) || ($niveauFeadBack > 7) || ($niveauFeadBack == 0)) == true) {
  $erreurs[3] = "<br>le niveau saisi est invalide";
}
# Département
$departementFeadBack = trim($departementFeadBack);
$departementFeadBack = htmlspecialchars($departementFeadBack);
if (empty($departementFeadBack)) {
  $erreurs[3] = "<br>le niveau saisi est invalide";
}
####etab_dep  
# etab_dep
$etab_depFeadBack = trim($etab_depFeadBack);
$etab_depFeadBack = htmlspecialchars($etab_depFeadBack);
$format = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu
  ";

if (empty($etab_depFeadBack) || preg_match($format, $etab_depFeadBack) == false) {
  $erreurs[4] = "<br>VEUILLEZ SAISIR UNE ADRESSE MAIL VALIDE";
}
#parcours  
$parcoursFeadBack = trim($parcoursFeadBack);
$parcoursFeadBack = htmlspecialchars($parcoursFeadBack);
$format = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu
  ";

if (empty($parcoursFeadBack) || preg_match($format, $parcoursFeadBack) == false) {
  $erreurs[5] = "<br>VEUILLEZ SAISIR UNE ADRESSE MAIL VALIDE";
}
#fiche_metier 
$fiche_metierFeadBack = trim($fiche_metierFeadBack);
$fiche_metierFeadBack = htmlspecialchars($fiche_metierFeadBack);
$format = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu
  ";

if (empty($fiche_metierFeadBack) || preg_match($format, $fiche_metierFeadBack) == false) {
  $erreurs[6] = "<br>VEUILLEZ SAISIR UNE ADRESSE MAIL VALIDE";
}

#fiche_onisep
$fiche_onisepFeadBack = trim($fiche_onisepFeadBack);
$fiche_onisepFeadBack = htmlspecialchars($fiche_onisepFeadBack);
$format = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu
  ";

if (empty($fiche_onisepFeadBack) || preg_match($format, $fiche_onisepFeadBack) == false) {
  $erreurs[7] = "<br>VEUILLEZ SAISIR UNE ADRESSE MAIL VALIDE";
}
#on vérifie s'il y a des erreurs
if (count($erreurs) > 0) {
  foreach ($erreurs as $err) {
    echo "<br> $err";
    die();
  }
} else {
  try {
    # insta,ciation de la class Connexion
    $connexion = new Connexion();
    # requête préparée ,paramètres nommés
    $pdoStatement = $connexion->prepare("insert into formation values(null,:metier,:filiere,:diplome,:niveau,:departement,:etab_dep,:parcours,:fiche_metier,:fiche_onisep);");
    # relier la valeur insérrer à celle récupérée
    $pdoStatement->bindParam(':metier', $metierFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('filiere', $filiereFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('diplome', $diplomeFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('niveau', $niveauFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('departement', $departementFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('etab_dep', $etab_depFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('parcours', $parcoursFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('fiche_metier', $fiche_metierFeadBack, PDO::PARAM_STR);
    $pdoStatement->bindParam('fiche_onisep', $fiche_onisepFeadBack, PDO::PARAM_STR);
    $pdoStatement->execute();
  }
  # intercepter les erreurs et les afficher 
  catch (PDOException $e) {
    echo "ERREUR : " . $e->getMessage();
  }
} ?>
<?php include_once __DIR__ . "/../../includes/header.php"; ?>
<p style='color:red ' class="text-capitalize text-center fs-2 fw-bold fst-italic" ;>
    <?php echo "FORMATION AJOUTÉE"; ?>
<div>


    <a class="btn btn-warning" style="background-color:#62529c ;"
        href="http://localhost/CAMPUS_SELECT/views/admin/action_admin.php" role="button" height="30"
        width="200px">Retour
        sur la page
        d'administration</a>
</div>
</p>
<?php include_once __DIR__ . "/../../includes/footer.php"; ?>