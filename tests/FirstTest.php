<?php declare(strict_types=1);

use eftec\ServicesJson\Services_JSON;
use PHPUnit\Framework\TestCase;

final class FirstTest extends TestCase
{
    public function testDecode(): void
    {
        $this->assertEquals(
            (object)[ 'k1' => "v1",'k2'=>'v2']
            ,Services_JSON::decode('{"k1":"v1","k2":"v2"}')
        );
        $this->assertEquals(
            (object)[ 'k1' => "v1\n\t\f\r",'k2'=>'v2']
            ,Services_JSON::decode('{"k1":"v1\n\t\f\r","k2":"v2"}')
        );
        $this->assertEquals(
            [ 'k1' => 'v1','k2'=>2]
            ,Services_JSON::decode('{"k1":"v1","k2":2}',Services_JSON::GET_ARRAY)
        );
        $this->assertEquals(
            [ 'k1' => 'v1','k2'=>2]
            ,Services_JSON::decode('{"k1":"v1","k2":2 /* comment */}',Services_JSON::GET_ARRAY)
        );
        $this->assertEquals(
            [ 'k1' => 'v1','k2'=>2]
            ,Services_JSON::decode('{k1:"v1",k2:2}',Services_JSON::GET_ARRAY)
        );
        $this->assertEquals(
            [ 'k1' => 'v1','k2'=>2]
            ,Services_JSON::decode('"k1":"v1", k2:2',
                Services_JSON::GET_ARRAY | Services_JSON::DECODE_FIX_ROOT)
        );
        //
        $this->assertEquals(
            [ 'button1' =>["aaaa","bbb","cccc"],
                'button2' =>["aaaa","bbb","cccc"],
                'button3' =>["aaaa","bbb","cccc"],]
            ,Services_JSON::decode('{"button1":["aaaa","bbb","cccc"],"button2":["aaaa","bbb","cccc"],"button3":["aaaa","bbb","cccc"]}',
            Services_JSON::GET_ARRAY | Services_JSON::DECODE_FIX_ROOT)
        );
        $this->assertEquals(
            [ 1,2,3]
            ,Services_JSON::decode('1,2,3',
            Services_JSON::GET_ARRAY | Services_JSON::DECODE_FIX_ROOT)
        );
        $this->assertEquals(
            [1]
            ,Services_JSON::decode('1',
            Services_JSON::GET_ARRAY | Services_JSON::DECODE_FIX_ROOT)
        );
        $this->assertEquals(
            ['a'=>1]
            ,Services_JSON::decode('a:1',
            Services_JSON::GET_ARRAY | Services_JSON::DECODE_FIX_ROOT)
        );
    }
    public function testsimple(): void
    {
        $this->assertEquals(
            ['a'=>'aaa','b'=>'bbbb','c' => 'aaaaa']
            ,Services_JSON::decode('a:aaa,b:bbbb,c: aaaaa',
            Services_JSON::GET_ARRAY | Services_JSON::DECODE_FIX_ROOT | Services_JSON::DECODE_NO_QUOTE));
        $this->assertEquals(
            ['a'=>'aaa','b'=>'bbbb','c' => 'aaaaa']
            ,Services_JSON::decode('{"a":aaa,"b":bbbb,"c": aaaaa}', Services_JSON::GET_ARRAY | Services_JSON::DECODE_NO_QUOTE));
    }
    public function testEncode(): void
    {
        $this->assertEquals(
            '{"k1":"v1","k2":"v2"}'
            ,Services_JSON::encode([ 'k1' => 'v1','k2'=>'v2'])
        );
        $this->assertEquals(
            '{"k1":"v1","k2":[1,2,3]}'
            ,Services_JSON::encode((object)[ 'k1' => 'v1','k2'=>[1,2,3]])
        );
        $this->assertEquals(
            '{"k\"1":"v1","k2":[1,2,3],"k3":{"k4":{"0":1,"1":2,"k5":[1,2]}}}'
            ,Services_JSON::encode((object)[ 'k"1' => 'v1','k2'=>[1,2,3],'k3'=>['k4'=>[1,2,'k5'=>[1,2]]]])
        );
    }

}
