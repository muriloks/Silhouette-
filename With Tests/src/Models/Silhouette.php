<?php

namespace App\Models;

class Silhouette
{
  public $size;
  public $itens;

  public function __construct($size, $itens)
  {
    $this->size = $size;
    $this->itens = $itens;
  }
}
