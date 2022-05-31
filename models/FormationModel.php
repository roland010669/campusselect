<?php
//include "../utils/Util.php";

class Formation
{
  //Propriétes de la classe Formation et definition des types
  private  $id;
  private  $metier;
  private  $filiere;
  private  $diplome;
  private  $niveau;
  private  $departement;
  private  $etab_dep;
  private  $parcours;
  private  $fiche_metier;
  private  $fiche_onisep;

  //accesseurs et modificateurs (Getters & Setters)pour Accéder aux valeurs et les définir
  /**
   * Get the value of id 
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }
  /**
   * Get the value of metier
   */

  public function getMetier()
  {
    return $this->metier;
  }

  /**
   * Set the value of metier
   *
   * @return  self
   */
  public function setMetier($metier)
  {
    $this->metier = $metier;

    return $this;
  }
  /**
   * Get the value of filiere
   */
  public function getFiliere()
  {
    return $this->filiere;
  }

  /**
   * Set the value of filiere
   *
   * @return  self
   */
  public function setFiliere($filiere)
  {
    $this->filiere = $filiere;

    return $this;
  }

  /**
   * Get the value of diplome
   */
  public function getDiplome()
  {
    return $this->diplome;
  }

  /**
   * Set the value of diplome
   *
   * @return  self
   */
  public function setDiplome($diplome)
  {
    $this->diplome = $diplome;

    return $this;
  }

  /**
   * Get the value of niveau
   */
  public function getNiveau()
  {
    return $this->niveau;
  }

  /**
   * Set the value of niveau
   *
   * @return  self
   */
  public function setNiveau($niveau)
  {
    $this->niveau = $niveau;

    return $this;
  }
  /**
   * Get the value of departement
   */
  public function getDepartement()
  {
    return $this->departement;
  }

  /**
   * Set the value of departement
   *
   * @return  self
   */
  public function setDepartement($departement)
  {
    $this->departement = $departement;

    return $this;
  }


  /**
   * Get the value of etab_dép
   */
  public function getEtab_dep()
  {
    return $this->etab_dep;
  }

  /**
   * Set the value of etab_dép
   *
   * @return  self
   */
  public function setEtab_dep($etab_dep)
  {
    $this->etab_dep = $etab_dep;

    return $this;
  }

  /**
   * Get the value of parcours
   */
  public function getParcours()
  {
    return $this->parcours;
  }

  /**
   * Set the value of parcours
   *
   * @return  self
   */
  public function setParcours($parcours)
  {
    $this->parcours = $parcours;

    return $this;
  }

  /**
   * Get the value of fiche_métier
   */
  public function getFiche_metier()
  {
    return $this->fiche_metier;
  }

  /**
   * Set the value of fiche_métier
   *
   * @return  self
   */
  public function setFiche_metier($fiche_metier)
  {
    $this->fiche_metier = $fiche_metier;

    return $this;
  }

  /**
   * Get the value of fiche_onisep
   */
  public function getFiche_onisep()
  {
    return $this->fiche_onisep;
  }

  /**
   * Set the value of fiche_onisep
   *
   * @return  self
   */
  public function setFiche_onisep($fiche_onisep)
  {
    $this->fiche_onisep = $fiche_onisep;

    return $this;
  }


  /* * validates the object
   * @return array tableau des Erreurs
 */
  public function validate()

  {
    $erreurs = array();

    //Message affiché si  metier non valide
    if (!$this->validateMetier()) {
      $erreurs["metier"] = "metier n'est pas valide";
    }

    //Message affiché si Diplome  non valide
    if (!$this->validateDiplome()) {
      $erreurs["diplome"] = "diplome n'est pas valide";
    }
    //  Message affiché si  Niveau non valide
    if (!$this->validateNiveau()) {
      $erreurs["niveau"] = "niveau n'est pas valide";
    }
    //  Message affiché si  Département non valide
    if (!$this->validateDepartement()) {
      $erreurs["Departement"] = "Departement n'est pas valide";
    }
    //  Message affiché si etab_dep  non valide
    if (!$this->validateEtab_dep()) {
      $erreurs["etab_dep"] = "etab_dep n'est pas valide";
    }
    // Message affiché si  parcours non valide

    if (!$this->validateParcours()) {
      $erreurs["parcours"] = "parcours n'est pas valide";
    }
    // Message affiché si fiche_metier  non valide

    if (!$this->validateFiche_metier()) {
      $erreurs["fiche_metier"] = "fiche_metier n'est pas valide";
    }
    // Message affiché si fiche_onisep  non valide

    if (!$this->validateFiche_onisep()) {
      $erreurs["fiche_onisep"] = "fiche_onisep n'est pas valide";
    }
    return $erreurs;
  }

  // validation : Metier
  public function validateMetier()
  {
    if (empty(trim($this->metier))) {
      return false;
    } else {
      return true;
    }
  }
  //validate Diplome
  public function validateDiplome()
  {
    if (empty(trim($this->diplome))) {
      return false;
    } else {
      return true;
    }
  }

  //validate Niveau
  public function validateNiveau()
  {
    if (($this->niveau <= 0) || ($this->niveau > 7)) {
      return false;
    } else {
      return true;
    }
  }

  //validate Département
  public function validateDepartement()
  {
    if (empty(trim($this->departement))) {
      return false;
    } else {
      return true;
    }
  }

  //validateEtab_dep
  public function validateEtab_dep()
  {
    if (empty(trim($this->etab_dep))) {
      return false;
    } else {
      return true;
    }
  }
  //validateParcours
  public function validateParcours()
  {
    if (empty(trim($this->parcours))) {
      return false;
    } else {
      return true;
    }
  }
  //validateFiche_metier
  public function validateFiche_metier()
  {
    if (empty(trim($this->fiche_metier))) {
      return false;
    } else {
      return true;
    }
  }


  //validateFiche_onisep
  public function validateFiche_onisep()
  {
    if (empty(trim($this->fiche_onisep))) {
      return false;
    } else {
      return true;
    }
  }
  //validate Filiere
  public function validateFiliere()
  {
    if (empty(trim($this->Filiere))) {
      return false;
    } else {
      return true;
    }
  }


  public static function createFormation($formation)
  {
    $formation = new Formation();
    $_POST['metier'] = "";
    $_POST['filiere'] = "";
    $_POST['diplome'] = "";
    $_POST['niveau'] = "";
    $_POST['departement'] = "";
    $_POST['etab_dep'] = "";
    $_POST['parcours'] = "";
    $_POST['fiche_metier'] = "";
    $_POST['fiche_onisep'] = "";
    isset($_POST['metier']) ? $_POST['metier'] : "";
    isset($_POST['filiere']) ? $_POST['filiere'] : "";
    isset($_POST['diplome']) ? $_POST['diplome'] : "";
    isset($_POST['niveau']) ? $_POST['niveau'] : "";
    isset($_POST['departement']) ? $_POST['departement'] : "";
    isset($_POST['etab_dep']) ? $_POST['etab_dep'] : "";
    isset($_POST['parcours']) ? $_POST['parcours'] : "";
    isset($_POST['fiche_metier']) ? $_POST['fiche_metier'] : "";
    isset($_POST['fiche_onisep']) ? $_POST['fiche_onisep'] : "";
    $formation->setMetier($_POST["metier"]);
    $formation->setFiliere($_POST["filiere"]);
    $formation->setDiplome($_POST["diplome"]);
    $formation->setNiveau($_POST["niveau"]);
    $formation->setDepartement($_POST["departement"]);
    $formation->setEtab_dep($_POST["etab_dep"]);
    $formation->setParcours($_POST["parcours"]);
    $formation->setFiche_metier($_POST["fiche_metier"]);
    $formation->setFiche_onisep($_POST["fiche_onisep"]);
    return $formation;
  }

  public function secure()
  {
    //sécuriser les données(XSS)
    $this->setMetier(htmlspecialchars($this->getMetier()));
    $this->setFiliere(htmlspecialchars($this->getFiliere()));
    $this->setDiplome(htmlspecialchars($this->getDiplome()));
    $this->setNiveau(htmlspecialchars($this->getNiveau()));
    $this->setDepartement(htmlspecialchars($this->getDepartement()));
    $this->setEtab_dep(htmlspecialchars($this->getEtab_dep()));
    $this->setParcours(htmlspecialchars($this->getParcours()));
    $this->setFiche_metier(htmlspecialchars($this->getFiche_metier()));
    $this->setFiche_onisep(htmlspecialchars($this->getFiche_onisep()));
  }
}