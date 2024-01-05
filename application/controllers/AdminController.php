<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Contact;
use application\models\User;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction()
    {
        if (!empty($_POST)) {
            $result = $this->model->loginValidate($_POST);
            if (!$result) {
                $this->view->message('Error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('/admin');
        }
        $this->view->layout = 'auth';
        $this->view->render("Login");
    }

    public function indexAction()
    {
        $userModel = new User;
        $vars = [
            'users' => $userModel->getUsers(),
        ];
        $this->view->render('Admin', $vars);
    }

    public function userEditAction()
    {
        if (!$this->model->userExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $userModel = new User;
            $result = $userModel->userValidate($_POST);
            if (!$result) {
                $this->view->message('Error', $userModel->error);
            }
            $this->model->userEdit($_POST);
            $this->view->location('/admin');
        }
        $userModel = new User;
        $user_id = $this->route['id'];
        $vars = [
            'user' => $userModel->getUserById($user_id)[0],
        ];
        $this->view->render('Edit user', $vars);
    }

    public function userDeleteAction()
    {
        if (!$this->model->userExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->userDelete($this->route['id']);
        $this->view->redirect('admin');
    }

    public function showUsersContactsAction()
    {
        $userModel = new User;
        $contactModel = new Contact;
        $phone_book = $contactModel->getContactsByUserId($this->route['id']);
        $vars = [
            'user' => $userModel->getUserById($this->route['id'])[0],
            'phone_book' => $phone_book,
        ];
        $this->view->render('User contacts', $vars);
    }

    public function showContactsAction()
    {
        $contactModel = new Contact;
        $phone_book = $contactModel->getContacts();
        $vars = [
            'phone_book' => $phone_book,
        ];
        $this->view->render('Сontacts', $vars);
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }
}