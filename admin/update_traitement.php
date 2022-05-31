<?php
session_start();
$PageTitle = "update_traitement";
include __DIR__ . "/../../includes/header.php";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../models/FormationModel.php";
$connected = isset($_SESSION["connected"]) ? true : false;
if (!$connected) {
    header("location:http://localhost/CAMPUS_SELECT/login.php");
}

//récupérer les données de la Formation
function recupMetier()
{
    $metierFeadBack = $_POST['metier'];
    isset($_POST['metier']) ? $_POST['metier'] : "";
    return $metierFeadBack;
}

$rechMetier = new Formation();
function FrechMetier()
{
    try {
        $metierFeadBack = recupMetier();
        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("SELECT * FROM formation WHERE metier=:metier");
        $pdoStatement->bindParam(':metier', $metierFeadBack);
        $pdoStatement->execute();
        $tabMetier = $pdoStatement->fetchAll();
        return $tabMetier;
    } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
    }
}
$metierFeadBack = '';
$tabMetier = [];
?>
<?php
foreach (FrechMetier($tabMetier) as $result) :
?>
<form action="modif_traitement.php" method="POST">
    <div class="form-group">

        <div>
            <label for="metier">Métier</label>
            <input class="form-control" type="text" id="metier" name="metier" value="<?php echo $result['metier']; ?>">
        </div>
        <div class="form-group">
            <label for="metier">Filière</label>
            <input class="form-control" type="text" id="filiere" name="filiere"
                value="<?php echo $result['filiere']; ?>">
        </div>
        <div class="form-group">
            <label for="diplome">Diplome</label>
            <input class="form-control" type="text" id="diplome" name="diplome"
                value="<?php echo $result['diplome']; ?>">
        </div>
        <div class="form-group">
            <label for="niveau">Niveau</label>
            <input class="form-control" type="text" id="niveau" name="niveau" value="<?php echo $result['niveau']; ?>">
        </div>
        <div class="form-group">
            <label for="departement">Département</label>
            <input class="form-control" type="text" id="departement" name="departement"
                value="<?php echo $result['departement']; ?>">
        </div>
        <div class="form-group">
            <label for="etab_dép">Établissements par département</label>
            <input class="form-control" type="text" id="etab_dep" name="etab_dep"
                value="<?php echo $result['etab_dep']; ?>">
        </div>

        <div class="form-group">
            <label for="parcours">Parcours</label>
            <input class="form-control" type="text" id="parcours" name="parcours"
                value="<?php echo $result['parcours']; ?>">
        </div>
        <div class="form-group">
            <label for="fiche_métier">Fiche Métier</label>
            <input class="form-control" type="text" id="fiche_metier" name="fiche_metier"
                value="<?php echo $result['fiche_metier']; ?>">
        </div>
        <div class="form-group">
            <label for="fiche_onisep">Fiche onisep</label>
            <input class="form-control" type="text" id="fiche_onisep" name="fiche_onisep"
                value="<?php echo $result['fiche_onisep']; ?>">
        </div>
    </div>
    <input type="hidden" name="metier" value="<?php echo $result['metier']; ?>">
    <div>

        <div>
            <input class="btn btn-primary" type="submit" value="Modifier la formation">
        </div>
</form>
<hr>
<?php
endforeach;
if (empty($result['metier'])) { ?>
<p style='color:red ' class="text-capitalize text-center fs-2 fw-bold fst-italic" ;>
    <?php echo " cette formation n'existe pas"; ?>
</p>

<?php }
include_once __DIR__ . "/../../includes/footer.php";
?>