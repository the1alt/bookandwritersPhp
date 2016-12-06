<?php

class Book extends AbstractLike implements NotationInterface
{

    use StarTrait;
    use HTMLTrait;

    static $counter = 0;
    static $prices = 0;

    protected $id;
    protected $titre;
    protected $resume;
    protected $prix;
    protected $edition;
    protected $nbPage;
    protected $dateModified;
    protected $comments = [];
    protected $notes = [];
    protected $dateRedaction;
    protected $ecrivains = [];
    protected $dispo = false;

    /**--------------------------------------------------------    CONSTRUCTOR ---------------------------------------------------------------------------*/

    /**
     * Book constructor.
     * @param $titre > 5 lettres
     * @param $resume
     * @param $prix
     * @param $edition
     * @param $nbPage
     * @param $dateRedaction
     * @param $ecrivains
     * @param bool $dispo
     */
    public function __construct($titre, $resume, $prix, $edition, $nbPage, $dateRedaction, $ecrivains, $dispo)
    {
        if (strlen($titre)<5){
            throw new Exception ("La taille du titre n'est pas assez longue");
        }
        elseif (strlen($resume)<10){
            throw new Exception ("Le résumé est trop court");
        }

        $this->id = self::$counter + 1 ;
        $this->titre = $titre;
        $this->resume = $resume;
        $this->prix = $prix;
        $this->edition = $edition;
        $this->nbPage = $nbPage;
        $this->dateModified = date('Y-m-d');
        $this->dateRedaction = $dateRedaction;
        $this->ecrivains []= $ecrivains;
        $this->dispo = $dispo;

        self::$counter++;
        self::$prices += $this->prix;
    }

    /**----------------------------------------- GETTERS & SETTERS ------------------------------------------------------------------------*/

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
    public function getTitre()
    {
      return $this->titre;
    }

    /**
     * @param  $titre
     *
     * @return static
     */
    public function setTitre($titre)
    {
      $this->titre = $titre;
      return $this;
    }

    /**
     * @return
     */
    public function getResume()
    {
      return $this->resume;
    }

    /**
     * @param  $resume
     *
     * @return static
     */
    public function setResume($resume)
    {
      $this->resume = $resume;
      return $this;
    }

    /**
     * @return
     */
    public function getPrix()
    {
      return $this->prix;
    }

    /**
     * @param  $prix
     *
     * @return static
     */
    public function setPrix($prix)
    {
      $this->prix = $prix;
      return $this;
    }

    /**
     * @return
     */
    public function getEdition()
    {
      return $this->edition;
    }

    /**
     * @param  $edition
     *
     * @return static
     */
    public function setEdition($edition)
    {
      $this->edition = $edition;
      return $this;
    }

    /**
     * @return
     */
    public function getNbPage()
    {
      return $this->nbPage;
    }

    /**
     * @param  $nbPage
     *
     * @return static
     */
    public function setNbPage($nbPage)
    {
      $this->nbPage = $nbPage;
      return $this;
    }

    /**
     * @return
     */
    public function getDateModified()
    {
      return $this->dateModified;
    }

    /**
     * @param  $dateModified
     *
     * @return static
     */
    public function setDateModified($dateModified)
    {
      $this->dateModified = $dateModified;
      return $this;
    }

    /**
     * @return array
     */
    public function getComments()
    {
      return $this->comments;
    }

    /**
     * @param array $comments
     *
     * @return static
     */
    public function setComments(array $comments)
    {
      $this->comments = $comments;
      return $this;
    }

    /**
     * @return array
     */
    public function getNotes()
    {
      return $this->notes;
    }

    /**
     * @param array $notes
     *
     * @return static
     */
    public function setNotes(array $notes)
    {
      $this->notes = $notes;
      return $this;
    }

    /**
     * @return
     */
    public function getDateRedaction()
    {
      return $this->dateRedaction;
    }

    /**
     * @param  $dateRedaction
     *
     * @return static
     */
    public function setDateRedaction($dateRedaction)
    {
      $this->dateRedaction = $dateRedaction;
      return $this;
    }

    /**
     * @return array
     */
    public function getEcrivains()
    {
      return $this->ecrivains;
    }

    /**
     * @param array $ecrivains
     *
     * @return static
     */
    public function setEcrivains(array $ecrivains)
    {
      $this->ecrivains = $ecrivains;
      return $this;
    }

    /**
     * @return bool
     */
    public function getDispo()
    {
      return $this->dispo;
    }

    /**
     * @param bool $dispo
     *
     * @return static
     */
    public function setDispo($dispo)
    {
      $this->dispo = $dispo;
      return $this;
    }


    /**------------------              METHODES             ------------------------------*/

    /**
    * méthode qui permet de formater le titre les espaces remplacer par des tirets et juste la 1ere lettre en majuscule
    * @return $this
    */

    public function formatTitre()
    {
      $this->titre = str_replace(" ", "-", $this->titre);
      $this->titre = strtolower($this->titre);
      $this->titre = ucfirst($this->titre);

      return $this;
    }


    /**
    * méthode qui affiche le titre et le résumé
    * @return $this
    */

    public function displayContent()
    {
      echo $this->titre.\n;
      echo $this->resume.\n;
      return $this;
    }


    /**
     * méthode permettant d’ajouter un ou plusieurs commentaires dans la classe Livre
     * @param Commentaires (array allow)
     * @return $this
     */

     public function addComment($comment, $note)
     {

       if(is_array($comment))
       {
         foreach ($comment as $key => $value) {
           $this->comments[]=$value;
         }
         foreach($note as $key => $value){
           $this->note[]=$value;
         }
       }
       else
       {
         $this->comments[]=$comment;
         $this->notes[]=$note;
       }
     }

     /**
      * méthode permettant de retourner l'age du livre
      */

     public function ageBook()
     {
        $dateBook = DateTime::createFromFormat('d/m/Y', $this->dateRedaction);
        $today = new DateTime('now');
        $age = date_diff($dateBook, $today);
        return $age->format('%Y');
     }


    /**
    * Methode qui dit si oui ou non le livre a été écrit après 1970
    */

    public function recentBook()
    {
      $dateBook = DateTime::createFromFormat('d/m/Y', $this->dateRedaction);
      $dateBook = $dateBook->format('Y');
      if(intval($dateBook > 1970))
      {
        return "oui";
      }
      else
      {
        return "non";
      }
    }

    /**
    * Methode qui formate le prix en 000 000,00€
    */
    public function formatPrix()
    {
      $this->prix = number_format($this->prix, 2, ',', ' ')."€";
      return $this;
    }


    /**
    * Methode qui tronque le resumé au nombre de mots voulut
    * @param nb de mot voulu
    * @return $this
    */

    public function formatResume($nbMots)
    {
      $tab = explode(' ', $this->resume);
      $tab = array_splice($tab, 0, $nbMots);
      $this->resume = implode(' ', $tab);
      return $this;
    }


    /**
    * Methode qui renvoi le nombre de mots dans le titre
    * @return nb
    */
    public function countTitre()
    {
      $nbMots = str_replace(' ', '-', $this->titre);
      $nbMots = explode('-', $nbMots);
      $nbMots = count($nbMots);
      return $nbMots;
    }

    /**
     * Methode qui permet de dire si le lire est gros (> 400 pages ), petit (< 200 pages), ou moyen;
     * @return string
     */

     public function poidBook()
     {
       if($this->nbPage > 400)
       {
         return 'gros';
       }
       elseif ($this->nbPage < 200)
       {
         return 'petit';
       }
       else
       {
         return 'moyen';
       }
     }

    /**----------------              STATIC              ---------------------------------*/

     /**
      * méthode permettant de retourner le nb de livres créés
      */

     public static function countBook()
     {
       return self::$counter;
     }


     /**
      * méthode permettant de retourner le prix moyen d'un tableau de livres
      */

     public static function avgPrice(array $array)
     {
        $avg = 0;

        foreach ($array as $key => $value) {
          if($value instanceof Book === false)
          {
            throw new Exception("Le paramètre doit être un tableau de livres");
          }
          $avg += $value->getPrix();
        }
        $avg = $avg / count($array);
        return $avg."\n";
     }

/**------------------------ From Abstract -------------------------*/

public function addLike()
{
  $this->like = true;
  return $this;
}
public function removeLike()
{
    $this->like = false;
    return $this;
}




/**-------------------------FROM INTERFACE-----------------------*/
     public function addNote($value)
     {
       $this->notes[]=$value;
       return $this;
     }

     public function addNoteAutre(Ecrivain $cible, $note)
     {
       echo "cette fonction n'est pas accessible aux livres";
       return false;
     }

}


?>
