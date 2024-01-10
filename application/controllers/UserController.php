<?php

namespace application\controllers;

use application\core\Controller;

class UserController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'auth';
    }

    public function loginAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $result = $this->model->loginValidate($_POST);
            if (!$result) {
                $this->view->message('Error', $this->model->error);
            }
            $_SESSION['authorize']['id'] = $result;
            $this->view->location('/' . $this->view->language->GetLanguage() . '/');
        }
        $this->view->render("Login");
    }

    public function logoutAction()
    {
        unset($_SESSION['authorize']['id']);
        $this->view->redirect($this->view->language->GetLanguage() . '/login');
    }

    public function registerAction()
    {
        if (!empty($_POST)) {
//            debug($_POST);
            if (!$this->model->userValidate($_POST)) {
                $this->view->message('Error', $this->model->error);
            }
            if ($this->model->userExists($_POST)) {
                $this->view->message('Error', 'User with such an email already exists!');
            }
            $id = $this->model->userCreate($_POST);
            if (!$id) {
                $this->view->message('Error', 'Request processing went wrong!');
            }
            $_SESSION['authorize']['id'] = $id;
            $this->view->location('/' . $this->view->language->GetLanguage() . '/');
        }
        $this->view->render("Register");
    }
}