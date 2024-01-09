<?php

namespace application\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';
    public $language;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        $this->language = new Language();
        $this->language->LoadLanguageValues('en');
    }

    public function render($title, $vars = [])
    {
        $vars = array_merge($vars, ['language' => $this->language]);
        extract($vars);
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        }
    }

    public function redirect($url)
    {
        header('location: /' . $url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/error/' . $code . '.php';

        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
}