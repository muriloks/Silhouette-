<?php

namespace App\Services;

use App\Models\Silhouette;
use App\Repositories\SilhouetteRepository;
use App\Services\CalculationService;

class SilhouetteService
{

  protected $silhouetteRepository;

  // Using directly the repository because i didn't bound the contract
  public function __construct(SilhouetteRepository $silhouetteRepository)
  {
    $this->silhouetteRepository = $silhouetteRepository;
  }

  public function init(): void
  {
    $numberOfCases = CalculationService::getNumberOfCases();
    $this->iterateCases($numberOfCases);
  }

  private function iterateCases(int $numberOfCases): void
  {
    for ($i = 0; $i < $numberOfCases; $i++) {

      $arraySize = (int) trim(readline('Size of array: '));
      $itensOfArray = (string) readline('Itens of array: ');

      $silhouette = $this->createSilhouette($arraySize, $itensOfArray);

      $result = CalculationService::calculate($silhouette);

      echo "Result: {$result}";
    }
  }

  private function createSilhouette(int $arraySize, string $itensOfArray): Silhouette
  {
    // Mocking repository use
    $silhouette = $this->silhouetteRepository->create(new Silhouette($arraySize, $itensOfArray));

    return $silhouette;
  }
}
