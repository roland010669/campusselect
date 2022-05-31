<?php
$PageTitle = "listeCompletePatrimoineBati_Étudiant";
include_once __DIR__ . "/../../db/connexion.php";
include_once __DIR__ . "/../../includes/header.php";
include_once __DIR__ . "/../../models/FormationModel.php";
?>

<h1 style="text-shadow: 2px 2px 2px pink ;font-style: italic" class="text-center">Liste des Formations Patrimoine
    Bâti-Étudiant.
</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Métier</th>
            <th>Filière</th>
            <th>Diplome</th>
            <th>Niveau</th>
            <th>Département</th>
            <th>Etablissements Par Deptartement</th>
            <th>Parcours</th>
            <th>Fiche Métier</th>
            <th>Fiche Onisep</th>
        </tr>
    </thead>
    <tbody>

        <?php



$selLCPBE = new Formation();
function FselLCPBE($selLCPBE)
{
  try {
    $connexion = new Connexion();
    $pdostat = $connexion->query("SELECT * FROM formation WHERE 	filiere='PB' AND niveau IN (3,4,5,6)");
    $pdostat->setFetchMode(PDO::FETCH_ASSOC);
    $selLCPBE = $pdostat->fetchAll();
    return $selLCPBE;
  } catch (Exception $e) {
    echo "ERREUR : " . $e->getMessage();
  }
}
        foreach (FselLCPBE($selLCPBE) as $f) : ?>
        <!-- pour chaque formation, on crée une ligne -->
        <tr>
            <td class="table-primary"><?php echo $f["metier"]; ?></td>
            <td class="table-primary"><?php echo $f["filiere"]; ?></td>
            <td class="table-secondary"><?php echo $f["diplome"]; ?></td>
            <td class="table-success"><?php echo $f["niveau"]; ?></td>
            <td class="table-success"><?php echo $f["departement"]; ?></td>
            <td class="table-danger"><?php echo "<a href=" . $f["etab_dep"] . ">CONSULTER</a>"; ?></td>
            <td class="table-warning"><?php echo "<a href=" . $f["parcours"] . ">CONSULTER</a>"; ?></td>
            <td class="table-info"><?php echo "<a href=" . $f["fiche_metier"] . ">CONSULTER</a>"; ?></td>
            <td class="table-light"><?php echo "<a href=" . $f["fiche_onisep"] . ">CONSULTER</a>"; ?></td>
            <td> <a class="btn btn-danger suppBtn"
                    href="http://localhost/CAMPUS_SELECT/views/formation/traitement_btn_supp.php?id=<?php echo $f["id"]; ?>"
                    role="button" data-id=<?php echo $f['id']; ?>>Supprimer cette
                    formation</a></td>
            <td><a class=" btn btn-primary"
                    href="http://localhost/CAMPUS_SELECT/views/formation/traitement_btn_update.php?id=<?php echo $f["id"]; ?>"
                    role="button"> Modifier
                    cette
                    formation</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
include_once __DIR__ . "/../../includes/footer.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>