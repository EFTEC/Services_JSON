<?php

use eftec\ServicesJson\Services_JSON;

include '../vendor/autoload.php';



$array=["hello"=>['a'=>2,'b'=>3],'world'=>[1,2,3,"aaa","bbb"]];

$obj=(object)$array;

echo "Encode array to json<br>";
echo "<pre>";
var_dump(Services_JSON::encode($array));
echo "</pre>";
echo "Encode object to json<br>";
echo "<pre>";
var_dump(Services_JSON::encode($obj));
echo "</pre>";
