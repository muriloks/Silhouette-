<?php

namespace App\Controllers;

use App\Services\SilhouetteService;

class SilhouetteController
{
  public static function index(SilhouetteService $silhouetteService)
  {
    $silhouetteService->init();
  }
}
