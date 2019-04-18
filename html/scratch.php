<?php

//$fh = fopen('contact.txt','r');
//while ($line = fgets($fh)){
//    echo ($line);
//    echo "\n";
//}
//fclose($fh);
echo "\n";
class Car {
    function Car() {
        $this->model = "VW";
    }
}
// create an object
$herbie = new Car();

// show object properties
echo $herbie->model;
echo "\n";

define("GREETING", "Welcome to W3Schools.com!\n", true);
echo greeting;

echo "\n";

$t = date("H");

if ($t > "20") {
    echo "Have a good day!";
}
else{
    echo "Fuck yourself!";
}

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
    echo "$value \n";
}

function fuckyou(){
    echo "\nFuck you hahaha!\n";
}

function addNumbers(float $a, float $b) : float {
    return $a + $b;
}
echo addNumbers(1.2, 5.2);
fuckyou();
function addNumbers2(float $a, float $b) : int {
    return (int)($a + $b);
}
echo addNumbers2(1.2, 5.2);
echo "\n";

$cars = array("Volvo", "BMW", "Toyota");
echo count($cars), "\n";

$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
$arrlength = count($numbers);
for ($i=0; $i<$arrlength; $i++){
    echo $numbers[$i], "\t";
}

echo "\n";

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
$agelength = count($age);
asort($age);
foreach ($age as $i => $i_value){
    echo "Key = " . $i . "Value = " . $i_value, "\n";
}
echo "\n";
ksort($age);
foreach ($age as $i => $i_value){
    echo "Key = " . $i . "Value = " . $i_value, "\n";
}

$fh = fopen('/Users/qiqizheng/Desktop/contact.rtf','r');
while (!feof($fh)){
    echo fgets($fh) . "\n";
//      echo "\n";
}
fclose($fh);

?>