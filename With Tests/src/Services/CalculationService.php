<?php

namespace App\Services;

use App\Models\Silhouette;

class CalculationService
{

  public static function getNumberOfCases(): int
  {
    $numberOfCases = (int) readline('Number of cases: ');

    if ($numberOfCases < 0 || $numberOfCases > 100) {
      die('Invalid: Number of cases need to be greater than 0 and smaller than 100');
    }

    return $numberOfCases;
  }

  private static function makeArray(Silhouette $silhouette): array
  {
    $array = array_map('intval', explode(' ', trim($silhouette->itens)));

    if (count($array) != $silhouette->size) {
      die('Invalid: Number of itens need to be equal array size');
    }

    return (array) $array;
  }

  public static function calculate(Silhouette $silhouette): int
  {

    (array) $silhouette = self::makeArray($silhouette);

    (int) $leftMax = 0;
    (int) $rightMax = 0;
    (int) $left = 0;
    (int) $right = count($silhouette) - 1;
    (int) $volume = 0;

    while ($left < $right) {
      if ($silhouette[$left] > $leftMax) {
        $leftMax = $silhouette[$left];
      }

      if ($silhouette[$right] > $rightMax) {
        $rightMax = $silhouette[$right];
      }

      if ($leftMax >= $rightMax) {
        $volume += $rightMax - $silhouette[$right];
        $right--;
      } else {
        $volume += $leftMax - $silhouette[$left];
        $left++;
      }
    }

    return (int) $volume;
  }
}
