<?php

namespace App\Repositories\Contracts;

use App\Models\Silhouette;

interface SilhouetteRepositoryInterface
{
  public function create(Silhouette $silhouette);
}
