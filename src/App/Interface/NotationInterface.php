<?php
interface NotationInterface
{
  public function addNote($value);

  public function addNoteAutre(Ecrivain $cible, $note);
}
 ?>
