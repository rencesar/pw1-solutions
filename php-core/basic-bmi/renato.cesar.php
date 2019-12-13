<?php
// BMI = weight/height²
$weight = 60.0;
$height = 1.65;

$bmi = $weight/$height*$height;

if ($bmi < 18.5){
    $result = 'Underweight';
} elseif ($bmi < 24.9) {
    $result = 'Normal weight';
} elseif ($bmi < 29.9) {
    $result = 'Overweight';
} else {
    $result = 'Obesity';
}


echo $result;