<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
//    public function redirectAction()
//    {
//        if (empty($_SESSION['authorize']['id'])) {
//            $this->view->location('login');
//        } else {
//            $this->view->redirect('en');
//        }
//    }

    public function indexAction()
    {
//        $contactModel = new Contact;
//        $contacts = $contactModel->
        if (empty($_SESSION['authorize']['id'])) {
            $this->view->redirect('login');
        }
        $this->view->render("Main");
    }


}