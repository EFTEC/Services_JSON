<?php

use eftec\ServicesJson\Services_JSON;

include '../vendor/autoload.php';

$s=new Services_JSON();

$array=["hello"=>['a'=>2,'b'=>3],'world'=>[1,2,3,"aaa","bbb"]];

$obj=(object)$array;

echo "Encode array to json<br>";
echo "<pre>";
var_dump($s->encode($array));
echo "</pre>";
echo "Encode object to json<br>";
echo "<pre>";
var_dump($s->encode($obj));
echo "</pre>";
