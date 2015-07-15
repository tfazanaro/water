<?php namespace core\utils;

use core\Route;

final class Helper
{
    public static function url($path = null, $params = null)
    {
        if ($path and is_string($path))
        {
            if ($params and is_array($params) and count($params) > 0)
            {
                $params = implode('/', $params);
                return BASE_URL . $path . DS . $params;
            }
            return BASE_URL . $path;
        }
        return BASE_URL;
    }

    public static function route($routeName, $params = null)
    {
        if (is_string($routeName))
        {
            if (array_key_exists($routeName, Route::getRoutes()))
            {
                if ($params and is_array($params) and count($params) > 0)
                {
                    $params = implode('/', $params);
                    return BASE_URL . $routeName . DS . $params;
                }
                return BASE_URL . $routeName;
            }
        }
        return null;
    }

    public static function asset($resource)
    {
        if ($resource and is_string($resource))
        {
            return PUBLIC_URL . $resource;
        }
        return null;
    }

    public static function view($view)
    {
        return View::load($view);
    }

    public static function strings()
    {
        return String::values();
    }

    public static function auth()
    {
        return (Auth::user()) ? new Auth() : null;
    }

    public static function token()
    {
        return Session::token();
    }

    public static function old($name)
    {
        return Request::get($name);
    }
}