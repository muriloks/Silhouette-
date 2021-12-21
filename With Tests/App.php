<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\SilhouetteController;
use App\Services\SilhouetteService;
use App\Repositories\SilhouetteRepository;

$silhouetteRepository = new SilhouetteRepository();
$silhouetteService = new SilhouetteService($silhouetteRepository);

// Just mocking as if we're needing a controller
SilhouetteController::index($silhouetteService);
