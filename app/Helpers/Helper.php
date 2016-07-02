<?php

namespace App\Helpers;

class Helper 
{
    private static function getHashIds() {
        return new \Hashids\Hashids('\S\i#Eu@92-2cc(JYjJ[[`{G^PSW>NW6');
    }
    
    public static function encode($key) {
        return self::getHashIds()->encode($key);
    }
    
    public static function decode($key) {
        return self::getHashIds()->decode($key);
    }
}