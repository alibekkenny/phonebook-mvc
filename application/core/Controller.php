<?php

namespace application\core;

class Controller
{
    public $route;
    public $view;
    public $acl;
    public $model;

//    public $language;

    public function __construct($route)
    {
        $this->route = $route;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->model = $this->loadModel($route['controller']);
        $this->view = new View($route);
        $this->view->language->SetLanguage($this->route['lang']);
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl()
    {
//        var_dump($this->route['controller']);
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';
        if ($this->isAcl('all')) {
            return true;
        } elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')) {
            return true;
        } elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('guest')) {
            return true;
        } elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
            return true;
        }
        return false;
    }

    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }

}