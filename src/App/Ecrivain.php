<?php
class Ecrivain
{

  const REGEMAIL = '/^([\w\-\.\_])+(@)([\w\-\.\_])+(.com|.fr)$/';
  const MAXLIVRES = 10;

  protected $id = 0;
  protected $nom;
  protected $email;
  protected $ville;
  protected $collection = [];
  protected $moyenneNote = 0;

/**----------------------------------------------    CONSTRUCTOR    ----------------------------------------------------------------*/


/**
 * @param mixed $nom
 * @param mixed $email
 * @param mixed $ville
 */
public function __construct($nom, $email, $ville)
{

  $this->nom = $nom;
  $this->email = $email;
  $this->ville = $ville;
}


/**---------------------------------------- GETTERS & SETTERS        -----------------------------------------------------------*/

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
public function getEmail()
{
  return $this->email;
}

/**
 * @param  $email
 *
 * @return static
 */
public function setEmail($email)
{
  $this->email = $email;
  return $this;
}

/**
 * @return
 */
public function getVille()
{
  return $this->ville;
}

/**
 * @param  $ville
 *
 * @return static
 */
public function setVille($ville)
{
  $this->ville = $ville;
  return $this;
}

/**
 * @return array
 */
public function getCollection()
{
  return $this->collection;
}

/**
 * @param array $collection
 *
 * @return static
 */
public function setCollection(array $collection)
{
  $this->collection = $collection;
  return $this;
}

/**
 * @return
 */
public function getMoyenneNote()
{
  return $this->moyenneNote;
}

/**
 * @param  $moyenneNote
 *
 * @return static
 */
public function setMoyenneNote($moyenneNote)
{
  $this->moyenneNote = $moyenneNote;
  return $this;
}

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


/**------------------              METHODES             ------------------------------*/

/**
* Methode qui permet d'ajouter ou supprimer un livre dans la collection de l'écrivain
* @return $this
*/

public function addBook(Book $book)
{
  if(in_array($book, $this->collection))
  {
    $key = array_search($book, $this->collection);
    array_splice($this->collection, $key, 1);
    $this->id --;
  }
  else
  {
    if($this->id === self::MAXLIVRES)
    {
      throw new Exception("maximum de livres atteint");
    }
    $this->collection []= $book;
    $this->id ++;
  }
  return $this;
}

/**
* Methode qui permet de valider l'adresse email
* @return Bool
*/

public function validMail()
{
  if(preg_match(self::REGEMAIL, $this->email))
  {
    return true;
  }
  else
  {
      return false;
  }
}

/**
*   METHODE qui permet d'enlever de la vente un ou plusieurs livres
* @return $this
*/

public function dontSellBook($book)
{
  if (is_array($book))
  {
    foreach ($book as $key => $value)
    {
      if (get_class($value) !== 'Book' || get_class($value) === false)
      {
        throw new Exception("Ceci n'est pas un livre");
      }
      $value->setDispo(false);
    }
  }
  else
  {
    if (get_class($book) !== 'Book' || get_class($book) === false)
    {
      throw new Exception("Ceci n'est pas un livre");
    }
    $book->setDispo(false);
  }
  return $this;
}

/**
* Methode qui permet de retourner l'age moyen des livres
* @return ageMoyen
*/
public function avgAgeLivres()
{
  $avg = 0;
  foreach ($this->collection as $key => $value)
  {
    $avg += $value->ageBook();
  }
  $avg = $avg / count($this->collection);
  return $avg;
}

/**
* Methode qui permet de retourner le prix en français de ses livres
* @return string
*/
public function prixFR()
{
  $html = "";
  foreach ($this->collection as $key => $value)
  {
    $html = $html.$value->getTitre()." : ".$value->formatPrix()->getPrix()."\n";
  }
  return $html;
}

/**
 * méthode qui permet à chaque Ecrivain de modifier le prix d’un de ses Livre et de modifier l’Edition
 * @param Book
 * @param float prix
 * @param string edition
 * @return $this
 */

public function modifBook(Book $book, $prix, $edition)
{
  $book->setPrix($prix);
  $book->setEdition($edition);
  $book->setDateModified(date('Y-m-d'));
  return $this;
}

/**
 * Methode qui permet de donner sa collection à un autre écrivain
 */
public function giveCollec(Ecrivain $cible)
{
  foreach ($this->collection as $key => $value) {
    $cible->addBook($value);
  }
}


}

 ?>
