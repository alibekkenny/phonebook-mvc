<?php

namespace application\controllers;

use application\core\Controller;

class LanguageController extends Controller
{
    public function switchAction()
    {
        $this->view->language->SetLanguage($this->route['language']);
//        $this->view->redirect($_SERVER['REQUEST_URI']);
    }
}
