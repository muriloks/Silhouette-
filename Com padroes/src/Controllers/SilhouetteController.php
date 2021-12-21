<?php

namespace App\Controllers;

use App\Services\SilhouetteService;

class SilhouetteController
{
  protected $silhouetteService;

  public function __construct(SilhouetteService $silhouetteService)
  {
    $this->silhouetteService = $silhouetteService;
  }

  public function index()
  {
    $this->silhouetteService->init();
  }
}
