<?php

class Edition
{

  protected $id;
  protected $nom;
  protected $activite;
  protected $dateCreation;
  protected $note;

  /**------------------              CONSTRUCT             ------------------------------*/

/**
 * @param mixed $nom
 * @param mixed $activite
 * @param mixed $dateCreation
 * @param mixed $note
 */
public function __construct($nom, $activite, $dateCreation, $note)
{
  $this->nom = $nom;
  $this->activite = $activite;
  $this->dateCreation = $dateCreation;
  $this->note = $note;
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




}



 ?>
