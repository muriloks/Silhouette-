<?php

namespace App\Repositories;

use App\Models\Silhouette;
use App\Repositories\Contracts\SilhouetteRepositoryInterface;

class SilhouetteRepository implements SilhouetteRepositoryInterface
{
  public function create(Silhouette $silhouette): Silhouette
  {
    return $silhouette;
  }
}
