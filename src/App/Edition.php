<?php

class Edition extends MetaData implements DateFrInterface, NotationInterface
{
  use StarTrait;

  protected $id;
  protected $nom;
  protected $activite;
  protected $dateCreation;
  protected $note = [];

  /**------------------              CONSTRUCT             ------------------------------*/

/**
 * @param mixed $nom
 * @param mixed $activite
 * @param mixed $dateCreation
 * @param mixed $note
 */
public function __construct($nom, $activite, $dateCreation, $note, $adresse, $codePostal, $pays, $date, $siret, array $gps)
{
  parent::__construct($adresse, $codePostal, $pays, $date, $siret, $gps);
  $this->nom = $nom;
  $this->activite = $activite;
  $this->dateCreation = $dateCreation;
  $this->note []= $note;
}


  /**------------------              GETTERS & SETTERS             ------------------------------*/

  /**
   * @return
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param  $id
   *
   * @return static
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * @param  $nom
   *
   * @return static
   */
  public function setNom($nom)
  {
    $this->nom = $nom;
    return $this;
  }

  /**
   * @return
   */
  public function getActivite()
  {
    return $this->activite;
  }

  /**
   * @param  $activite
   *
   * @return static
   */
  public function setActivite($activite)
  {
    $this->activite = $activite;
    return $this;
  }

  /**
   * @return
   */
  public function getDateCreation()
  {
    return $this->dateCreation;
  }

  /**
   * @param  $dateCreation
   *
   * @return static
   */
  public function setDateCreation($dateCreation)
  {
    $this->dateCreation = $dateCreation;
    return $this;
  }

  /**
   * @return
   */
  public function getNote()
  {
    return $this->note;
  }

  /**
   * @param  $note
   *
   * @return static
   */
  public function setNote($note)
  {
    $this->note = $note;
    return $this;
  }



  /**------------------              METHODES             ------------------------------*/


  public function verifSiret()
  {
    if(!preg_match("/^(\d){1}(\ )(\d){5}(\ )(\d){8}$/", $this->siret)){
      throw new SiretException("Erreur sur le numéro de siret");
    }
  }

  /**----------------------------  From Implement --------------------------------*/

  /**
  * METHDOE permettant de formater la date de naissance.
  * @return this
  */
  public function formatDateFr()
  {
    $date = DateTime::createFromFormat('Y-m-d H:i', $this->date);
    return $date->format('d/m/Y');
  }
  /**
  * METHDOE permettant de formater l'heure de naissance.
  * @return this
  */
  public function formatTimeFr()
  {
    $date = DateTime::createFromFormat('Y-m-d H:i', $this->date);
    return $date->format('H:i');
  }



  /**--------------------- From implements ----------------------*/


  public function addNote($value)
  {
    $this->note[]=$value;
    return $this;
  }

  public function addNoteAutre(Ecrivain $cible, $note)
  {
    $add = 0;
    $count = 0;
    foreach ($cible->collection as $key => $value)
    {
        $value->addNote($note);
        $count += count($value->getNotes());
        foreach ($value->getNotes() as $cle => $valeur)
        {
          $add += $valeur;
        }
    }
    return $add/$count;
  }









}



 ?>
