<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
//        $contactModel = new Contact;
//        $contacts = $contactModel->
        $this->view->render("Main");
    }


}