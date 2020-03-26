<?php

namespace Core;

if (!function_exists('array_key_first')) {
    function array_key_first(array $arr) {
        foreach($arr as $key => $unused) {
            return $key;
        }
        return NULL;
    }
}

if (! function_exists("array_key_last")) {
    function array_key_last($array) {
        if (!is_array($array) || empty($array)) {
            return NULL;
        }
       
        return array_keys($array)[count($array)-1];
    }
}

class Core
{
    public function run()
    {
        include 'src/routes.php';

        $url = str_replace("/".BASE_URI , '' , $_SERVER["REQUEST_URI"]);
        
        $route = Router::get($url);
        
        $controller = ucfirst($route[array_key_first($route)]) . ucfirst(array_key_first($route));
        
        $action = $route[array_key_last($route)].ucfirst(array_key_last($route));
        
        $controller2 = "Controller"."\\".$controller;
        
        $a = new $controller2();
        $a->$action();
    }
}
?>