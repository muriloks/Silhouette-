<?php

namespace App;

class Problem
{

  public static function init(): void
  {
    $numberOfCases = (int) readline('Number of cases: ');

    if ($numberOfCases < 0 || $numberOfCases > 100) {
      die('Invalid: Number of cases need to be greater than 0 and smaller than 100');
    }

    self::iterateCases($numberOfCases);
  }

  private static function iterateCases(int $numberOfCases): void
  {
    for ($i = 0; $i < $numberOfCases; $i++) {

      $arraySize = (int) trim(readline('Size of array: '));
      $itensOfArray = (string) readline('Itens of array: ');

      $silhouette = self::makeArray($arraySize, $itensOfArray);

      $result = self::calculate($silhouette);

      echo "Result: {$result}";
    }
  }

  private static function makeArray(int $arraySize, string $itensOfArray): array
  {
    $array = array_map('intval', explode(' ', trim($itensOfArray)));

    if (count($array) != $arraySize) {
      die('Invalid: Number of itens need to be equal array size');
    }

    return (array) $array;
  }

  private static function calculate(array $silhouette): int
  {

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
