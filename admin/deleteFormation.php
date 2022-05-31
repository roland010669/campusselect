<?php
session_start();
$PageTitle = "deleteFormation";
include_once __DIR__ . "/../../includes/header.php";
include_once __DIR__ . "/../../db/connexion.php";
include_once __DIR__ . "/../../models/FormationModel.php";
?>
<!-- Formulaire de Suppression -->
<form action="deleteFormation_traitement.php" method="GET">
    <div>
        <label for="suppForm">Veuillez Saisir le Nom de la Formation à Supprimer :</label><br>
        <input style="background-color: #F4A94E1F;" class="form-control" type="text" id="suppForm" name="metier">
    </div><br>
    <div>
        <input class="btn btn-danger" id="supp" type="submit" name="supp" value="SUPPRIMER">
    </div>
</form>

<?php
#vérifier que metier est affecté et récupérer sa valeur
function recupereGetMetier()
{
  $metierFeadBack = '';
  isset($_GET['metier']) ? $_GET['metier'] : "";
  return $metierFeadBack;
}

/* Instancier la Class Connexion et afficher le Message d'erreur
 via la méthode getMessage de PDO dont Connexion hérite*/
try {
  $connexion = new Connexion();
} catch (PDOException $ex) {
  echo $ex->getMessage(); //débogage
  exit;
}

$metierFeadBack = recupereGetMetier();
# Instancier la Class Formation
$formationS = new Formation();
# Préparer la requête sql (analyse,compilation,optimisation)
$pdoStatement = $connexion->prepare("select * from formation where metier=:metier");
$pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
$pdoStatement->bindParam('metier', $metierFeadBack, PDO::PARAM_STR);
#exécution de la requête
$pdoStatement->execute();
$formationS = $pdoStatement->fetchAll();
include_once __DIR__ . "/../../includes/footer.php";
?>