<?php

$assign = $_POST['assign'];
$pet = $_POST['pet'];
$activity = $_POST['activity'];

if (!$assign || !$pet || !$activity) {
    header("Location: index.php?error=forgot");
    exit();
}

$points = [
    'Homer' => 0,
    'Marge' => 0,
    'Lisa' => 0,
    'Bart' => 0
];

if ($assign == '0') {
    $points['Homer']++;
} elseif ($assign == '1') {
    $points['Marge']++;
} else {
    $points['Lisa']++;
}

if ($pet == 'x') {
    $points['Homer']++;
} elseif ($pet == 'y') {
    $points['Marge']++;
} else {
    $points['Lisa']++;
}

if ($activity == 'a') {
    $points['Marge']++;
} elseif ($activity == 'summer') {
    $points['b']++;
} elseif ($activity == 'c') {
    $points['Bart']++;
} else {
    $points['Lisa']++;
}

arsort($points);
$char = key($points);

$filename = getcwd() . '/data/results.txt';
file_put_contents($filename, $char . "\n", FILE_APPEND);

setcookie('character', $char);

header("Location: index.php");
exit();

?>
