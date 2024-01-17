<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Contact;
use application\models\ContactDetails;
use application\models\PhoneCategory;
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
            $this->view->location('admin');
        }
        $this->view->layout = 'auth';
        $this->view->render("Login");
    }

    public function indexAction()
    {
        if (empty($_SESSION['admin'])) {
            $this->view->redirect('admin/login');
        }
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
            $this->view->location('admin');
        }
        $userModel = new User;
        $user_id = $this->route['id'];
        $vars = [
            'user' => $userModel->getUserById($user_id)[0],
        ];
        $this->view->render('Edit user', $vars);
    }

    public function contactEditAction()
    {
        $contactModel = new Contact;
        if (!$contactModel->contactExistsById($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $users_phones_model = new ContactDetails;
        $categoryModel = new PhoneCategory;
        if (!empty($_POST)) {
            if (!$contactModel->contactValidate($_POST, $users_phones_model)) {
                $this->view->message('Error', $contactModel->error);
            }
            $contactModel->editContact($_POST, $this->route['id']);
            if (isset($_POST['phone'])) {
//                [$editedContacts, $addedContacts] = split_contact_phones_edited_new($_POST['phone']);
//                if (!$users_phones_model->manyPhonesValidate($_POST['phone'])) {
//                    $this->view->message('Error', $users_phones_model->error);
//                }
                $users_phones_model->editContactPhone($_POST['phone'], $this->route['id']);
//                $users_phones_model->addContactPhone($addedContacts, $this->route['id']);
            }
            $this->view->location('admin/contact');
        }
        $contact = $contactModel->getContact($this->route['id']);
        $categories = $categoryModel->getCategories();
        $vars = [
            'data' => $contact,
            'categories' => $categories,
        ];
        $this->view->render("Edit contact", $vars);
    }

    public function deleteContactPhoneAction()
    {
        $contactPhoneModel = new ContactDetails;
        if (!$contactPhoneModel->contactPhoneExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $contactPhoneModel->deleteContactPhone($this->route['id']);
//        $this->view->redirect('contact');
    }

    public function contactDeleteAction()
    {
        $contactModel = new Contact;
        if (!$contactModel->contactExistsById($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $contactModel->deleteContact($this->route['id']);
        $this->view->redirect('admin');
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