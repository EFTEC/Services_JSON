<?php

use eftec\ServicesJson\Services_JSON;
include '../vendor/autoload.php';

$json='{"hello":{"a":2,"b":3},"world":[1,2,3,"aaa"]}';
echo "Decode as stdclass:<br>";
echo "<pre>";
var_dump(Services_JSON::decode($json));
echo "</pre>";
echo "Decode as array:<br>";
echo "<pre>";
var_dump(Services_JSON::decode($json, Services_JSON::SERVICES_JSON_AS_ARRAY));
echo "</pre>";
