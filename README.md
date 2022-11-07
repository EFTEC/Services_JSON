# Services_JSON
PHP implementation of json_encode/decode for PHP 7.2 and higher.  This library works with and without quoted keys.

[![Packagist](https://img.shields.io/packagist/v/eftec/services_json.svg)](https://packagist.org/packages/eftec/services_json)
[![Total Downloads](https://poser.pugx.org/eftec/services_json/downloads)](https://packagist.org/packages/eftec/services_json)
[![Maintenance](https://img.shields.io/maintenance/yes/2022.svg)]()
[![composer](https://img.shields.io/badge/composer-%3E1.6-blue.svg)]()
[![php](https://img.shields.io/badge/php-7.x-green.svg)]()
[![php](https://img.shields.io/badge/php-8.x-green.svg)]()
[![CocoaPods](https://img.shields.io/badge/docs-70%25-yellow.svg)]()

This package provides a simple encoder and decoder for JSON notation. It is intended for use with client-side Javascript
applications that make use of HTTPRequest to perform server communication functions - data can be encoded into JSON 
notation for use in a client-side javascript, or decoded from incoming Javascript requests. JSON format is native to 
Javascript, and can be directly eval() with no further parsing overhead.

## So, what is the goal with this version?

While this version doesn't have a better performance than **json_encode()** and **json_decode()** available as 
extension, but it has the next features:

- [x]  it doesn't require an extension. If you can't install ext-json, then you can use this version.
- [x] **it works with JSON with unquoted keys** (for example JavaScript notation)
- [x] It is a simple .php file with no dependency.

## Usage

### Getting started using composer

1. Install the library using composer
```shell
composer require eftec/services_json
```
2. Include the dependency
```php
use eftec\ServicesJson\Services_JSON;
include '../vendor/autoload.php';
```

See the folder examples for further examples

### Getting started without composer

1. Copy this file: [Services_JSON/Services_JSON.php](https://github.com/EFTEC/Services_JSON/blob/main/src/Services_JSON.php)

2. Include the file

   ```php
   use eftec\ServicesJson\Services_JSON;
   include 'Services_JSON.php'; // or where is located the file.
   ```


### Decode

Decode transform (de-codified) a JSON string into a stdclass or an associative array

```php
$json='{"hello":{"a":2,"b":3},"world":[1,2,3,"aaa"]}';
var_dump(Services_JSON::decode($json)); // as stdclass
var_dump(Services_JSON::decode($json,Services_JSON::SERVICES_JSON_AS_ARRAY)); // as array
```
It also works with unquoted keys

```php

$json='{hello:{a:2,b:3},world:[1,2,3,"aaa","bbbb"]}';  // the keys are unquoted.
var_dump(Services_JSON::decode($json)); // as stdclass
var_dump(Services_JSON::decode($json,Services_JSON::SERVICES_JSON_AS_ARRAY)); // as array
```

### Encode

Encode transform a value (array, object, primitive value, etc.) into a json expression (a string)

```php
$array=["hello"=>['a'=>2,'b'=>3],'world'=>[1,2,3,"aaa","bbb"]];
$obj=(object)$array;
var_dump(Services_JSON::encode($array));  // encode an associative array
var_dump(Services_JSON::encode($obj)); // encode an object
```


## Changelog

* 2.0
  * Now the library is static, so you can call the methods without creating an instance.
  * If you want to work with the non-static library, then install 1.1
* 1.1
  * It works with PHP 7.2 and higher (including PHP 8.0 and 8.1)
  * It doesn't require PECL to work.
  * The code was cleaned
  * Web header is removed.
  * Method decode() could return an associative array.
* 1.0.3-1.0.0 PECL version. It only works with PHP 4.x and PHP 5.x

