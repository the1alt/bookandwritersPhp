<?php
trait StarTrait
{
  protected $star = 0;

  public function addStar()
  {
    $this->star++;
  }
  public function removeStar()
  {
    $this->star--;
  }
}
 ?>
