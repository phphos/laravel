<?php

namespace PHPHos\Laravel\Routes;

use PHPHos\Laravel\Exceptions\Exception;

class Router
{
    /**
     * 注册路由.
     * 
     * @param array $items 命名空间.
     * @return mixed
     */
    public static function match(...$items)
    {
        $namespace = 'App\\Http\\Controllers\\';

        $count = count($items);
        $count > 1 or Exception::fail('路由错误.');

        $abs = [];
        for ($i = 0; $i < bcsub($count, 1); $i++) {
            $abs[$i] = ucfirst($items[$i]);
        }

        $class = $namespace . join('\\', $abs) . 'Controller';
        $ctrl = app()->make($class);
        return app()->call([$ctrl, $items[bcsub($count, 1)]]);
    }
}
