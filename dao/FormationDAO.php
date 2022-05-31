<?php

class FormationDAO
{
  private $connexion;
  public function __construct()
  {
    $this->connexion = new Connexion();
  }
  /**
   * Get the value of connexion
   */
  public function getConnexion()
  {
    return $this->connexion;
  }

  /**
   * Set the value of connexion
   *
   * @return  self
   */
  public function setConnexion($connexion)
  {
    $this->connexion = $connexion;

    return $this;
  }
  /**
   * retourne un tableau d'objet de type formation
   * @return array 
   */
  public function findByMetier()
  {
    $metier = '';
    # requête sql paramètre nommé
    $pdoStatement = $this->connexion->prepare("select * from formation where metier=:metier");
    # relier le paramètre nommé et la valeur saisie
    $pdoStatement->bindParam('metier', $metier);
    $pdoStatement->execute();
    $tab = $pdoStatement->fetchAll();
    foreach ($tab as $t) {
      $forM = Formation::createFormation($t);
      $formation[] = $forM;
    }
    return $formation;
  }

  /**
   * retourne Id de la Formation stockée dans la BDD
   * @return Formation 
   */

  public function save($formation)
  {
    # requête sql pour preparer l'insertion dans la BDD les valeurs correspondantes aux paramètres nommés
    $pdoStatement = $this->connexion->prepare("insert into formation values (null, :metier, :filiere, :diplome, :niveau, :etab_dep, :parcours,:fiche_metier,:fiche_onisep)");
    #exécution de la requête 
    $pdoStatement->execute([
      ":metier:" => $formation->getMetier(),
      ":filiere" => $formation->getFiliere(),
      ":diplome" => $formation->getDiplome(),
      ":niveau" => $formation->getNiveau(),
      ":departement" => $formation->getDepartement(),
      ":etab_dep" => $formation->getEtab_dep(),
      ":parcours" => $formation->getParcours(),
      ":fiche_metier" => $formation->getFiche_metier(),
      ":fiche_onisep" => $formation->getFiche_onisep()
    ]);
    return $this->connexion->lastInsertId();
  }
  public function deleteByMetier($metier)
  {
    $pdoStatement = $this->connexion->prepare("delete from formation where metier=:metier");
    $pdoStatement->execute([":metier" => $metier]);
  }
}

function recuperemetier()
{
  $_POST['nomMetier'] = "";
  $metierFeedback = $_POST['nomMetier'];
  isset($_POST['nomMetier']) ? $_POST['nomMetier'] : "";
  return  $metierFeedback;
}
function recupFiliere()
{
  $_POST['filiere'] = "";
  $filiereFeedback = $_POST['filiere'];
  isset($_POST["filiere"]) ? $_POST["filiere"] : "";
  return  $filiereFeedback;
}
function recupDiplome()
{
  $_POST['diplome'] = "";
  $diplomeFeedback = $_POST['diplome'];
  isset($_POST["diplome"]) ? $_POST["diplome"] : "";
  return  $diplomeFeedback;
}
function recupNiveau()
{
  $_POST['niveau'] = [""];
  $niveauFeedback = $_POST['niveau'][0];
  isset($_POST["niveau"]) ? $_POST["niveau"][0] : "";
  return  $niveauFeedback;
}

function recupDepartement()
{
  $_POST['departement'] = [""];
  $departementFeedback = $_POST['departement'][0];
  isset($_POST["departement"]) ? $_POST["departement"][0] : "";
  return  $departementFeedback;
}
function recupEtab_dep()
{
  $_POST['etab_dep'] = "";
  $etab_depFeedback = $_POST['etab_dep'];
  isset($_POST["etab_dep"]) ? $_POST["etab_dep"] : "";
  return  $etab_depFeedback;
}
function recupParcours()
{
  $_POST['parcours'] = "";
  $parcoursFeedback = $_POST['parcours'];
  isset($_POST["parcours"]) ? $_POST["parcours"] : "";
  return  $parcoursFeedback;
}
function recupFiche_metier()
{
  $_POST['fiche_metier'] = "";
  $fiche_metierFeedback = $_POST['fiche_metier'];
  isset($_POST["fiche_metier"]) ? $_POST["fiche_metier"] : "";
  return  $fiche_metierFeedback;
}
function recupFiche_onisep()
{
  $_POST['fiche_onisep'] = "";
  $fiche_onisepFeedback = $_POST['fiche_onisep'];
  isset($_POST["fiche_onisep"]) ? $_POST["fiche_onisep"] : "";
  return  $fiche_onisepFeedback;
}
function recupId()
{
  $_POST['id'] = "";
  $idFeedback = $_POST['id'];
  $int_idFeedback = (int)$idFeedback;
  isset($_POST["id"]) ? $_POST["id"] : "";
  return  $int_idFeedback;
}

//traitement département Adulte

# récupération des données de sélection
/*$recupDa = isset($_POST) ? $_POST : [];
# messages en cas de non sélection ou d'une sélection de +de 3cases
if (empty($recupDa)) {

  echo "<p>AU MOINS UNE CASE DOIT ÊTRE COCHÉE</p>";
  echo "<br>";

  exit;
  # comptage tableau multidimensionnel
} elseif ((count($recupDa, COUNT_RECURSIVE)) - 1 > 3) {
  echo "VEUILLEZ COCHER MAXIMUN 3 CASES (UNE PAR SECTION DE SÉLECTION)";
  echo "<br>";

  exit;
} else {
  # instanciation de la class Formation
  include_once __DIR__ . "/../models/FormationModel.php";
  $res = new Formation();
  function Fres_D_A()
  {
    $recupDa = isset($_POST['sel']) ? $_POST['sel'] : [];
    $recupDonnees = count($recupDa, COUNT_RECURSIVE) - 1;
    # sélection d'1 case
    if ($recupDonnees == 0) {
      # possibilités de sélection dans 3 tableaux(département/niveau/filière)
      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4, 5, 6, 7);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');

      isset($recupDa[0]) ? $recupDa[0] : '';
      $sel = $recupDa[0];
      # sélection effectuée ds département
      if (in_array($sel, $selection1)) {
        try {
          $connexion = new Connexion();
          # requête sql paramètre nommé
          $pdoStatement = $connexion->prepare("select * from formation where  departement=:departement");
          # relier le paramètre nommé à la valeur selectionnée
          $pdoStatement->bindParam(':departement', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresA = $pdoStatement->fetchAll();

          return $tabresA;
        }
        # message d'erreurs PDO exception (Formation extends PDO donc hérite) 
        catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection niveau
      elseif (in_array($sel, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau");
          $pdoStatement->bindParam(':niveau', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresA = $pdoStatement->fetchAll();

          return $tabresA;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection filière
      elseif (in_array($sel, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  filiere=:filiere");
          $pdoStatement->bindParam(':filiere', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresA = $pdoStatement->fetchAll();

          return $tabresA;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    } elseif ($recupDonnees == 1) {

      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel2Facteurs = $_POST['sel'];
      //$sel2F1 = '';
      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel2F1 = $sel2Facteurs[0];
      //$sel2F2 = '';
      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel2F2 = $sel2Facteurs[1];

      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4, 5, 6, 7);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau AND departement=:departement AND (niveau>=3 && niveau <=7) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':niveau', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresA = $pdoStatement->fetchAll();

          return $tabresA;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  departement=:departement AND filiere=:filiere AND (niveau>=3 && niveau <=7) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresA = $pdoStatement->fetchAll();

          return $tabresA;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection2) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau AND filiere=:filiere AND (niveau>=3 && niveau <=7) ");
          $pdoStatement->bindParam(':niveau', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresA = $pdoStatement->fetchAll();

          return $tabresA;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    # sélection 3 facteurs
    elseif ($recupDonnees == 2) {
      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel3Facteurs = $_POST['sel'];

      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel3F1 = $sel3Facteurs[0];

      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel3F2 = $sel3Facteurs[1];

      isset($_POST['sel'][2]) ? $_POST['sel'][2] : '';
      $sel3F3 = $sel3Facteurs[2];
      try {
        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where departement=:departement AND  niveau=:niveau AND filiere=:filiere");
        $pdoStatement->bindParam(':departement', $sel3F1);
        $pdoStatement->bindParam(':niveau', $sel3F2);
        $pdoStatement->bindParam(':filiere', $sel3F3);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabresA = $pdoStatement->fetchAll();

        return $tabresA;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}*/
//traitement département étudiant

# récupération des données de sélection
/*$recupDe = isset($_POST) ? $_POST : [];
# messages en cas de non sélection ou d'une sélection de +de 3cases
if (empty($recupDe)) {
  echo "<p>AU MOINS UNE CASE DOIT ÊTRE COCHÉE</p>";
  exit;
  # comptage tableau multidimensionnel
} elseif ((count($recupDe, COUNT_RECURSIVE)) - 1 > 3) {
  echo "VEUILLEZ COCHER MAXIMUN 3 CASES (UNE PAR SECTION DE SÉLECTION)";
  exit;
} else {
  # instanciation de la class Formation
  $res = new Formation();
  function FresEtudiant()
  {
    $recupDe = isset($_POST['sel']) ? $_POST['sel'] : [];
    $recupDonnees = count($recupDe, COUNT_RECURSIVE) - 1;
    # sélection d'1 case
    if ($recupDonnees == 0) {
      # possibilités de sélection dans 3 tableaux(département/niveau/filière)
      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4, 5, 6);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');

      isset($recupDe[0]) ? $recupDe[0] : '';
      $sel = $recupDe[0];
      # sélection effectuée ds département
      if (in_array($sel, $selection1)) {
        try {
          $connexion = new Connexion();
          # requête sql paramètre nommé
          $pdoStatement = $connexion->prepare("select * from formation where  departement=:departement");
          # relier le paramètre nommé à la valeur selectionnée
          $pdoStatement->bindParam(':departement', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresE = $pdoStatement->fetchAll();

          return $tabresE;
        }
        # message d'erreurs PDO exception (Formation extends PDO donc hérite) 
        catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection niveau
      elseif (in_array($sel, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau");
          $pdoStatement->bindParam(':niveau', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresE = $pdoStatement->fetchAll();

          return $tabresE;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection filière
      elseif (in_array($sel, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  filiere=:filiere");
          $pdoStatement->bindParam(':filiere', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresE = $pdoStatement->fetchAll();

          return $tabresE;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    } elseif ($recupDonnees == 1) {

      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel2Facteurs = $_POST['sel'];
      //$sel2F1 = '';
      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel2F1 = $sel2Facteurs[0];
      //$sel2F2 = '';
      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel2F2 = $sel2Facteurs[1];

      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4, 5, 6);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau AND departement=:departement AND (niveau>=3 && niveau <=6) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':niveau', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresE = $pdoStatement->fetchAll();

          return $tabresE;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  departement=:departement AND filiere=:filiere AND (niveau>=3 && niveau <=6) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresE = $pdoStatement->fetchAll();

          return $tabresE;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection2) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau AND filiere=:filiere AND (niveau>=3 && niveau <=6) ");
          $pdoStatement->bindParam(':niveau', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresE = $pdoStatement->fetchAll();

          return $tabresE;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    #sélection 3 facteurs
    elseif ($recupDonnees == 2) {
      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel3Facteurs = $_POST['sel'];
      //$sel3F1 = '';
      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel3F1 = $sel3Facteurs[0];
      //$sel3F2 = '';
      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel3F2 = $sel3Facteurs[1];
      //$sel3F3 = '';
      isset($_POST['sel'][2]) ? $_POST['sel'][2] : '';
      $sel3F3 = $sel3Facteurs[2];
      try {
        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where departement=:departement AND  niveau=:niveau AND filiere=:filiere");
        $pdoStatement->bindParam(':departement', $sel3F1);
        $pdoStatement->bindParam(':niveau', $sel3F2);
        $pdoStatement->bindParam(':filiere', $sel3F3);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabresE = $pdoStatement->fetchAll();

        return $tabresE;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}*/

//traitement département Lycéen

# récupération des données de selection
/*$recupDl = isset($_POST) ? $_POST : [];
# messages en cas de non sélection ou d'une sélection de +de 3cases
if (empty($recupDl)) {
  echo "<p>AU MOINS UNE CASE DOIT ÊTRE COCHÉE</p>";
  exit;
  # comptage tableau multidimensionnel
} elseif ((count($recupDl, COUNT_RECURSIVE)) - 1 > 3) {
  echo "VEUILLEZ COCHER MAXIMUN 3 CASES (UNE PAR SECTION DE SÉLECTION)";
  exit;
} else {
  # instanciation de la class Formation
  $res = new Formation();
  function FresLyceen()
  {
    $recupDl = isset($_POST['sel']) ? $_POST['sel'] : [];
    $recupDonnees = count($recupDl, COUNT_RECURSIVE) - 1;
    # sélection d'1 case
    if ($recupDonnees == 0) {
      # possibilités de sélection dans 3 tableaux(département/niveau/filière)
      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4, 5);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');

      isset($recupDl[0]) ? $recupDl[0] : '';
      $sel = $recupDl[0];
      # sélection effectuée ds département
      if (in_array($sel, $selection1)) {
        try {
          $connexion = new Connexion();
          # requête sql paramètre nommé
          $pdoStatement = $connexion->prepare("select * from formation where  departement=:departement");
          # relier le paramètre nommé à la valeur selectionnée
          $pdoStatement->bindParam(':departement', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresL = $pdoStatement->fetchAll();

          return $tabresL;
        }
        # message d'erreurs PDO exception (Formation extends PDO donc hérite) 
        catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection niveau
      elseif (in_array($sel, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau");
          $pdoStatement->bindParam(':niveau', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresL = $pdoStatement->fetchAll();

          return $tabresL;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection filière
      elseif (in_array($sel, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  filiere=:filiere");
          $pdoStatement->bindParam(':filiere', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresL = $pdoStatement->fetchAll();

          return $tabresL;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    } elseif ($recupDonnees == 1) {

      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel2Facteurs = $_POST['sel'];
      //$sel2F1 = '';
      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel2F1 = $sel2Facteurs[0];
      //$sel2F2 = '';
      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel2F2 = $sel2Facteurs[1];

      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4, 5);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau AND departement=:departement AND (niveau>=3 && niveau <=5) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':niveau', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresL = $pdoStatement->fetchAll();

          return $tabresL;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  departement=:departement AND filiere=:filiere AND (niveau>=3 && niveau <=5) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresL = $pdoStatement->fetchAll();

          return $tabresL;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection2) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where  niveau=:niveau AND filiere=:filiere AND (niveau>=3 && niveau <=5) ");
          $pdoStatement->bindParam(':niveau', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresL = $pdoStatement->fetchAll();

          return $tabresL;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    # sélection 3 facteurs
    elseif ($recupDonnees == 2) {
      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel3Facteurs = $_POST['sel'];
      ////$sel3F1 = '';
      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel3F1 = $sel3Facteurs[0];
      //$sel3F2 = '';
      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel3F2 = $sel3Facteurs[1];
      //$sel3F3 = '';
      isset($_POST['sel'][2]) ? $_POST['sel'][2] : '';
      $sel3F3 = $sel3Facteurs[2];
      try {
        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where departement=:departement AND  niveau=:niveau AND filiere=:filiere ");
        $pdoStatement->bindParam(':departement', $sel3F1);
        $pdoStatement->bindParam(':niveau', $sel3F2);
        $pdoStatement->bindParam(':filiere', $sel3F3);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabresL = $pdoStatement->fetchAll();

        return $tabresL;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}*/

//traitement département Collégien


# récupération des données de selection
/*$recupDc = isset($_POST) ? $_POST : [];
# messages en cas de non sélection ou d'une sélection de +de 3cases
if (empty($recupDc)) {
  echo "<p>AU MOINS UNE CASE DOIT ÊTRE COCHÉE</p>";
  exit;
  # comptage tableau multidimensionnel
} elseif ((count($recupDc, COUNT_RECURSIVE)) - 1 > 3) {
  echo "VEUILLEZ COCHER MAXIMUN 3 CASES (UNE PAR SECTION DE SÉLECTION)";
  exit;
} else {
  # instanciation de la class Formation
  include_once __DIR__ . "/../db/connexion.php";
  $res = new Formation();
  function FresCollegien()
  {
    $recupDc = isset($_POST['sel']) ? $_POST['sel'] : [];
    $recupDonneesC = count($recupDc, COUNT_RECURSIVE) - 1;

    # sélection d'1 case
    if ($recupDonneesC == 0) {
      # possibilités de sélection dans l'un des 3 tableaux(département/niveau/filière)
      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');

      isset($recupDc[0]) ? $recupDc[0] : '';
      $sel = $recupDc[0];
      # sélection effectuée ds departement
      if (in_array($sel, $selection1)) {
        try {
          $connexion = new Connexion();
          # requête sql paramètre nommé
          $pdoStatement = $connexion->prepare("select * from formation where departement=:departement");
          # relier le paramètre nommé à la valeur selectionnée
          $pdoStatement->bindParam(':departement', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresC = $pdoStatement->fetchAll();

          return $tabresC;
        }
        # message d'erreurs PDO exception (Formation extends PDO donc hérite)
        catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection niveau
      elseif (in_array($sel, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau=:niveau");
          $pdoStatement->bindParam(':niveau', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresC = $pdoStatement->fetchAll();

          return $tabresC;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      # selection filière
      elseif (in_array($sel, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where filiere=:filiere");
          $pdoStatement->bindParam(':filiere', $sel);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresC = $pdoStatement->fetchAll();

          return $tabresC;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    # selection de 2 cases 105 possibilités 15!/2!*13!
    elseif ($recupDonneesC == 1) {

      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel2Facteurs = $_POST['sel'];

      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel2F1 = $sel2Facteurs[0];

      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel2F2 = $sel2Facteurs[1];

      $selection1 = array(75, 77, 78, 91, 92, 93, 94, 95);
      $selection2 = array(3, 4);
      $selection3 = array('PB', 'HT', 'AT', 'G', 'AD');
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection2)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau=:niveau AND departement=:departement AND
(niveau>=3 && niveau <=4) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':niveau', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresC = $pdoStatement->fetchAll();

          return $tabresC;
        } catch (Exception $e) {
          echo " ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection1) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare(" select * from formation where departement=:departement AND
    filiere=:filiere AND (niveau>=3 && niveau <=4) ");
          $pdoStatement->bindParam(':departement', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresC = $pdoStatement->fetchAll();

          return $tabresC;
        } catch (Exception $e) {
          echo " ERREUR : " . $e->getMessage();
        }
      }
      if (in_array($sel2F1, $selection2) && in_array($sel2F2, $selection3)) {
        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare(" select * from formation where niveau=:niveau AND filiere=:filiere AND
        (niveau>=3 && niveau <=4) ");
          $pdoStatement->bindParam(':niveau', $sel2F1);
          $pdoStatement->bindParam(':filiere', $sel2F2);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabresC = $pdoStatement->fetchAll();

          return $tabresC;
        } catch (Exception $e) {
          echo " ERREUR : " . $e->getMessage();
        }
      }
    }
    # sélection de 3 cases
    elseif ($recupDonneesC == 2) {

      isset($_POST['sel']) ? $_POST['sel'] : [];
      $sel3Facteurs = $_POST['sel'];

      isset($_POST['sel'][0]) ? $_POST['sel'][0] : '';
      $sel3F1 =  $sel3Facteurs[0];

      isset($_POST['sel'][1]) ? $_POST['sel'][1] : '';
      $sel3F2 = $sel3Facteurs[1];

      isset($_POST['sel'][2]) ? $_POST['sel'][2] : '';
      $sel3F3 = $sel3Facteurs[2];

      try {
        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare(" select * from formation where departement=:departement AND niveau=:niveau
            AND filiere=:filiere");
        $pdoStatement->bindParam(':departement', $sel3F1);
        $pdoStatement->bindParam(':niveau', $sel3F2);
        $pdoStatement->bindParam(':filiere', $sel3F3);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabresC = $pdoStatement->fetchAll();

        return $tabresC;
      } catch (Exception $e) {
        echo " ERREUR : " . $e->getMessage();
      }
    }
  }
}*/
//traitement filière AT Lycéen

function recupSelLat()
{
  isset($_POST) ? $_POST : [];
  $selFeedback = $_POST;
  foreach ($selFeedback as $tabselLat) {
    return $tabselLat;
  }
}

$tabselLat = recupSelLat();

if (empty($tabselLat)) {

  echo " <p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} elseif (count($tabselLat) > 2) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} else {
  $res = new Formation();
  function FresFlyceen()
  {

    $tabselLat = recupSelLat();
    if (count($tabselLat) == 1) {


      if ($tabselLat[0] == '3') {

        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='AT'");
          $pdoStatement->bindParam(':niveau', $tabselLat[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabselLat[0] == '4') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='AT'");
          $pdoStatement->bindParam(':niveau', $tabselLat[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if ($tabselLat[0] == '5') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='AT'");
          $pdoStatement->bindParam(':niveau', $tabselLat[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      $tabDep = array('75', '77', '78', '91', '92', '93', '94', '95');
      if (in_array($tabselLat[0], $tabDep)) {
        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND
                filiere='AT' AND niveau IN (3,4,5)");
          $pdoStatement->bindParam(':departement', $tabselLat[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    if (count($tabselLat) == 2) {

      try {

        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement =
                :departement AND filiere='AT'");
        $pdoStatement->bindParam(':niveau', $tabselLat[0], PDO::PARAM_INT);
        $pdoStatement->bindParam(':departement', $tabselLat[1]);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();
        return $tabres;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}
// traitement_filièreGastronomie_Lycéen

function recupSelFg()
{
  isset($_POST) ? $_POST : [];
  $selFeedback = $_POST;
  foreach ($selFeedback as $tabsel) {
    return $tabsel;
  }
}

$tabsel = recupSelFg();

if (empty($tabsel)) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} elseif (count($tabsel) > 2) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} else {
  $res = new Formation();
  function FresFgastronomie()
  {

    $tabsel = recupSelFg();
    if (count($tabsel) == 1) {


      if ($tabsel[0] == '3') {

        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='G'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '4') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='G'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if ($tabsel[0] == '5') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='G'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      $tabDep = array('75', '77', '78', '91', '92', '93', '94', '95');
      if (in_array($tabsel[0], $tabDep)) {
        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND
                filiere='G' AND
                niveau IN (3,4,5)");
          $pdoStatement->bindParam(':departement', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    if (count($tabsel) == 2) {

      try {

        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement =
                :departement
                AND filiere='G'");
        $pdoStatement->bindParam(':niveau', $tabsel[0], PDO::PARAM_INT);
        $pdoStatement->bindParam(':departement', $tabsel[1], PDO::PARAM_INT);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();
        return $tabres;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}

//traitement_filièresHT_Lyceen
function recupSelFht()
{
  isset($_POST) ? $_POST : [];
  $selFeedback = $_POST;
  foreach ($selFeedback as $tabsel) {
    return $tabsel;
  }
}

$tabsel = recupSelFht();

if (empty($tabsel)) {
  //$tabsel = '';
  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} elseif (count($tabsel) > 2) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} else {
  $res = new Formation();
  function FresFht()
  {

    $tabsel = recupSelFht();
    if (count($tabsel) == 1) {


      if ($tabsel[0] == '3') {

        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '4') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '5') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      $tabDep = array('75', '77', '78', '91', '92', '93', '94', '95');
      if (in_array($tabsel[0], $tabDep)) {
        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND
                filiere='HT' AND niveau IN (3,4,5)");
          $pdoStatement->bindParam(':departement', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    if (count($tabsel) == 2) {

      try {

        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement =
                :departement AND filiere='HT'");
        $pdoStatement->bindParam(':niveau', $tabsel[0], PDO::PARAM_INT);
        $pdoStatement->bindParam(':departement', $tabsel[1], PDO::PARAM_INT);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();
        return $tabres;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}
//traitement_filieresPB_lycéen
function recupSelFpb()
{

  isset($_POST) ? $_POST : [];
  $selFeedback = $_POST;
  foreach ($selFeedback as $tabsel) {
    return $tabsel;
  }
}

$tabsel = recupSelFpb();

if (empty($tabsel)) {
  //$tabsel = '';
  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} elseif (count($tabsel) > 2) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} else {
  $res = new Formation();
  function FresFpb()
  {

    $tabsel = recupSelFpb();

    if (count($tabsel) == 1) {


      if ($tabsel[0] == '3') {

        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='PB'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '4') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='PB'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if ($tabsel[0] == '5') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='PB'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      $tabDep = array('75', '77', '78', '91', '92', '93', '94', '95');
      if (in_array($tabsel[0], $tabDep)) {
        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND
                filiere='PB' AND
                (niveau='3'||niveau='4'||niveau='5')");
          $pdoStatement->bindParam(':departement', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    if (count($tabsel) == 2) {

      try {

        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement =
                :departement
                AND filiere='PB'");
        $pdoStatement->bindParam(':niveau', $tabsel[0], PDO::PARAM_INT);
        $pdoStatement->bindParam(':departement', $tabsel[1], PDO::PARAM_INT);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();
        return $tabres;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}

//traitement_Art_Design_Lycéen
function recupSelLad()
{
  isset($_POST) ? $_POST : [];
  $selFeedback = $_POST;
  foreach ($selFeedback as $tabsel) {
    return $tabsel;
  }
}

$tabsel = recupSelLad();

if (empty($tabsel)) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} elseif (count($tabsel) > 2) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} else {
  $res = new Formation();
  function FresLad()
  {

    $tabsel = recupSelLad();
    if (count($tabsel) == 1) {


      if ($tabsel[0] == '3') {

        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='AD'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '4') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='AD'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if ($tabsel[0] == '5') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='AD'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      $tabDep = array('75', '77', '78', '91', '92', '93', '94', '95');
      if (in_array($tabsel[0], $tabDep)) {
        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND
                filiere='AD' AND
                niveau IN ('3','4','5')");
          $pdoStatement->bindParam(':departement', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    if (count($tabsel) == 2) {

      try {

        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement =
                :departement
                AND filiere='AD'");
        $pdoStatement->bindParam(':niveau', $tabsel[0], PDO::PARAM_INT);
        $pdoStatement->bindParam(':departement', $tabsel[1], PDO::PARAM_INT);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();
        return $tabres;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}

//traitementFiliere_HT_Adulte
function recupSelAht()
{
  isset($_POST) ? $_POST : [];
  $selFeedback = $_POST;
  foreach ($selFeedback as $tabsel) {
    return $tabsel;
  }
}


$tabsel = recupSelAht();

if (empty($tabsel)) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} elseif (count($tabsel) > 2) {

  echo "<p>Veuillez Choisir : un Niveau ou un Département ,ou une Combinaison Niveau/Département</p>";
  exit;
} else {
  $res = new Formation();
  function FresAht()
  {

    $tabsel = recupSelAht();
    if (count($tabsel) == 1) {


      if ($tabsel[0] == '3') {

        try {
          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau =:niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '4') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }

      if ($tabsel[0] == '5') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if ($tabsel[0] == '6') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      if ($tabsel[0] == '7') {

        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND filiere='HT'");
          $pdoStatement->bindParam(':niveau', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
      $tabDep = array('75', '77', '78', '91', '92', '93', '94', '95');
      if (in_array($tabsel[0], $tabDep)) {
        try {

          $connexion = new Connexion();
          $pdoStatement = $connexion->prepare("select * from formation where departement = :departement AND
                filiere='HT' AND niveau IN (3,4,5,6,7)");
          $pdoStatement->bindParam(':departement', $tabsel[0]);
          $pdoStatement->execute();
          $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
          $tabres = $pdoStatement->fetchAll();

          return $tabres;
        } catch (Exception $e) {
          echo "ERREUR : " . $e->getMessage();
        }
      }
    }
    if (count($tabsel) == 2) {

      try {

        $connexion = new Connexion();
        $pdoStatement = $connexion->prepare("select * from formation where niveau = :niveau AND departement =
                :departement AND filiere='HT'");
        $pdoStatement->bindParam(':niveau', $tabsel[0], PDO::PARAM_INT);
        $pdoStatement->bindParam(':departement', $tabsel[1], PDO::PARAM_INT);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $tabres = $pdoStatement->fetchAll();
        return $tabres;
      } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
      }
    }
  }
}