<?php
Trait HTMLTrait
{
  public function displayArray($objet)
  {
    $html = '<table class="table table-striped"><thead><tr>';
    foreach ($objet as $key => $value) {
      $html .= '<th>'.$key.'</th>';
    }
    $html .= '</tr></thead><tbody><tr>';
    foreach ($objet as $key => $value) {
      $html .= '<td>'.$value.'</td>';
    }
    $html .= '</tr></tbody></table>';
    echo $html;
  }

  public function displayList($objet)
  {
    $html = '<div class=col-md-4><ul class="list-group">';
    foreach ($objet as $key => $value) {
      $html .= '<li class="list-group-item">'.$key.'</li>';
    }

    $html .= '</ul></div>';
    echo $html;

  }

}
 ?>
