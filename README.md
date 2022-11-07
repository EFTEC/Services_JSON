# Services_JSON
PHP implementaion of json_encode/decode

[![Packagist](https://img.shields.io/packagist/v/eftec/services_json.svg)](https://packagist.org/packages/eftec/services_json)
[![Total Downloads](https://poser.pugx.org/eftec/services_json/downloads)](https://packagist.org/packages/eftec/services_json)
[![Maintenance](https://img.shields.io/maintenance/yes/2022.svg)]()
[![composer](https://img.shields.io/badge/composer-%3E1.6-blue.svg)]()
[![php](https://img.shields.io/badge/php-7.x-green.svg)]()
[![php](https://img.shields.io/badge/php-8.x-green.svg)]()
[![CocoaPods](https://img.shields.io/badge/docs-70%25-yellow.svg)]()

JSON (JavaScript Object Notation, http://json.org) is a lightweight data-interchange format.
It is easy for humans to read and write. It is easy for machines to parse and generate.
It is based on a subset of the JavaScript Programming Language, Standard ECMA-262 3rd Edition - December 1999.
This feature can also be found in Python. JSON is a text format that is completely language independent
but uses conventions that are familiar to programmers of the C-family of languages, including
C, C++, C#, Java, JavaScript, Perl, TCL, and many others. These properties make JSON an ideal
data-interchange language.

This package provides a simple encoder and decoder for JSON notation. It is intended for use
with client-side Javascript applications that make use of HTTPRequest to perform server
communication functions - data can be encoded into JSON notation for use in a client-side
javascript, or decoded from incoming Javascript requests. JSON format is native to Javascript,
and can be directly eval() with no further parsing overhead.

## So, what is the goal with this version?

While this version doesn't have a better performance than json_encode() and json_decode() available as extension, 
it has the next features:

[x] it doesn't require an extension. If you can't install an extension, then you can use this version.
[x] **it works with json with unquoted keys** (for example javascript notation)
[x] It is a simple file with no dependency.

## Usage

### Getting started

* Install the library using composer (or you could download Services_JSON.php manually)
```shell
composer require eftec/services_json
```
* Include the dependency
```php
use eftec\ServicesJson\Services_JSON;
include '../vendor/autoload.php';
$s=new Services_JSON();
```

* And creates a service class
```php
$s=new Services_JSON();
```
See the folder examples for further examples

### Decode

Decode transform (decodified) a json string into a stdclass or an associative array

```php
$s=new Services_JSON();
$json='{"hello":{"a":2,"b":3},"world":[1,2,3,"aaa"]}';
var_dump($s->decode($json)); // as stdclass
var_dump($s->decode($json,true)); // as array
```
It also works with unquoted keys

```php
$s=new Services_JSON();
$json='{hello:{a:2,b:3},world:[1,2,3,"aaa","bbbb"]}';  // the keys are unquoted.
var_dump($s->decode($json)); // as stdclass
var_dump($s->decode($json,true)); // as array
```

### Encode

Encode transform a value (array, object, primitive value, etc.) into a json expression (a string)

```php
$array=["hello"=>['a'=>2,'b'=>3],'world'=>[1,2,3,"aaa","bbb"]];
$obj=(object)$array;
var_dump($s->encode($array));  // encode an associative array
var_dump($s->encode($obj)); // encode an object
```


## Changelog

* 1.1
  * It works with PHP 7.2 and higher.  
  * It doesn't require PECL to work.
  * The code was cleaned
  * web header is removed.
  * Method decode() could return an associative array.
* 1.0.3-1.0.0 PECL version. It only works with PHP 4.x and PHP 5.x

