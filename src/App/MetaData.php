<?php

class MetaData{

  const REGSIRET = '/^((\d){3}(\ )){3}(\d){4}$/';
  const REGCP = '/^(\d){5}$/';


  protected $adresse;
  protected $codePostal;
  protected $pays;
  protected $date;
  protected $siret;
  protected $debutActivite;
  protected $gps = [];


/**------------------              CONSTRUCTOR             ------------------------------*/


  /**
   * @param mixed $adresse
   * @param mixed $codePostal
   * @param mixed $pays
   * @param mixed $date
   * @param mixed $siret
   * @param mixed $debutActivite
   * @param array $gps
   */
  public function __construct($adresse, $codePostal, $pays, $date, $siret, array $gps)
  {
    $this->adresse = $adresse;
    $this->codePostal = $codePostal;
    $this->pays = $pays;
    $this->date = $date;
    $this->siret = $siret;
    $this->debutActivite = date('d/m/Y');
    $this->gps = $gps;
  }


  /**------------------              GETTER & SETTERS             ------------------------------*/

  /**
   * @return
   */
  public function getAdresse()
  {
    return $this->adresse;
  }

  /**
   * @param  $adresse
   *
   * @return static
   */
  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;
    return $this;
  }

  /**
   * @return
   */
  public function getCodePostal()
  {
    return $this->codePostal;
  }

  /**
   * @param  $codePostal
   *
   * @return static
   */
  public function setCodePostal($codePostal)
  {
    $this->codePostal = $codePostal;
    return $this;
  }

  /**
   * @return
   */
  public function getPays()
  {
    return $this->pays;
  }

  /**
   * @param  $pays
   *
   * @return static
   */
  public function setPays($pays)
  {
    $this->pays = $pays;
    return $this;
  }

  /**
   * @return
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * @param  $date
   *
   * @return static
   */
  public function setDate($date)
  {
    $this->date = $date;
    return $this;
  }

  /**
   * @return
   */
  public function getSiret()
  {
    return $this->siret;
  }

  /**
   * @param  $siret
   *
   * @return static
   */
  public function setSiret($siret)
  {
    $this->siret = $siret;
    return $this;
  }

  /**
   * @return
   */
  public function getDebutActivite()
  {
    return $this->debutActivite;
  }

  /**
   * @param  $debutActivite
   *
   * @return static
   */
  public function setDebutActivite($debutActivite)
  {
    $this->debutActivite = $debutActivite;
    return $this;
  }

  /**
   * @return array
   */
  public function getGps()
  {
    return $this->gps;
  }

  /**
   * @param array $gps
   *
   * @return static
   */
  public function setGps(array $gps)
  {
    $this->gps = $gps;
    return $this;
  }



  /**------------------              METHODES             ------------------------------*/


  /**
  * Methode qui vérifie le numéro de SIRET
  */

  public function verifSiret()
  {
    if(!preg_match(self::REGSIRET, $this->siret)){
      throw new Exception("Erreur sur le numéro de siret");
    }
  }


  /**
  * Methode qui extrait le département et vérifiant le CP
  *  @return STRING département;
  */

  public function depFromCP()
  {
    if (!preg_match(self::REGCP, $this->codePostal)) {
      throw new Exception("Erreur sur le Code Postal");
    }
    $dep = substr($this->codePostal, 0 ,1);
    return $dep;
  }

  /**
  * METHDOE permettant de dire si fête ses 50 ans.
  * @return bool
  */

  public function anniversaire()
  {
    $this->date = DateTime::createFromFormat('d/m/Y',$this->date);
    $today = new DateTime('now');

    $age = date_diff($this->date, $today);
    $age = $age->format('%Y');
    echo $age;
    if($age == 50)
    {
      return true;
    }
    else
    {
      return false;
    }
  }







}

 ?>
