<?php

use eftec\ServicesJson\Services_JSON;

include '../vendor/autoload.php';

// $json_decoder = new Services_JSON(SERVICES_JSON_IN_ARR | SERVICES_JSON_LOOSE_TYPE)


$json='{hello:{a:2,b:3},world:[1,2,3,"aaa","bbbb"]}';


echo "Decode as stdclass:<br>";
echo "<pre>";
var_dump(Services_JSON::decode($json));
echo "</pre>";
echo "Decode as array:<br>";
echo "<pre>";
var_dump(Services_JSON::decode($json,Services_JSON::GET_ARRAY));
echo "</pre>";
