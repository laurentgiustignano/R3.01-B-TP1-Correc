<?php
$argmuments = $_SERVER['argv'];
$age = $argmuments[1] ?? 0;
$pays = $argmuments[2] ?? 'FR';

//var_dump($argmuments, $age, $pays);

/**
 * Détermine si le passage du permis de conduire est autorisé en fonction
 * de l'age et du pays.
 * @param int $age
 * @param string $pays
 * @return bool
 * @throws Exception
 */
function canDrive(int $age, string $pays) : bool {

  $ageLegalPermis = [
    'FR' => 17,
    'US' => 16,
    'IT' => 18,
    'ES' => 18,
    'UK' => 17,
  ];

  if(!isset($ageLegalPermis[$pays])) {
    throw new Exception("Pays non valide");
  }
  return $age >= $ageLegalPermis[$pays];
}

try {
  if(canDrive($age, $pays)) {
    $message = "On peut passer le permis en $pays à $age ans.";
  }
  else {
    $message = "On ne peut pas passer le permis en $pays à $age ans.";
  }
  echo $message . PHP_EOL;
}
catch(Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
