<?php

use eftec\ServicesJson\Services_JSON;

include '../vendor/autoload.php';

// $json_decoder = new Services_JSON(SERVICES_JSON_IN_ARR | SERVICES_JSON_LOOSE_TYPE)

$s=new Services_JSON();

$json='{hello:{a:2,b:3},world:[1,2,3,"aaa","bbbb"]}';

var_dump(my_json_decode($json));

function my_json_decode($s) {
    $s = str_replace(
        array('"',  "'"),
        array('\"', '"'),
        $s
    );
    $s = preg_replace('/(\w+):/i', '"\1":', $s);
    return json_decode(sprintf('{%s}', $s));
}


echo "Decode as stdclass:<br>";
echo "<pre>";
var_dump($s->decode($json));
echo "</pre>";
echo "Decode as array:<br>";
echo "<pre>";
var_dump($s->decode($json,true));
echo "</pre>";
