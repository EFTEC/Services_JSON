<?php

use eftec\ServicesJson\Services_JSON;

include '../vendor/autoload.php';

$s=new Services_JSON();

$json='{hello:{a:2,b:3},world:[1,2,3,"aaa","bbbb"]}';
echo "Decode as stdclass:<br>";
echo "<pre>";
var_dump($s->decode($json));
echo "</pre>";
echo "Decode as array:<br>";
echo "<pre>";
var_dump($s->decode($json,true));
echo "</pre>";
