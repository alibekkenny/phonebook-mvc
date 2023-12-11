<?php

namespace application\controllers;

use application\core\Controller;
use application\models\ContactPhone;

class ContactController extends Controller
{
    public function showAction()
    {
        $phone_book = $this->model->getContactsByUserId($_SESSION['authorize']['id']);
        $vars = [
            'phone_book' => $phone_book,
        ];
        $this->view->render("Contacts", $vars);
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $contactPhoneModel = new ContactPhone;
            if (!$this->model->contactValidate($_POST, $contactPhoneModel)) {
                $this->view->message('Error', $this->model->error);
            }
            $contact_id = $this->model->addContact($_POST);
            if (!$contact_id) {
                $this->view->message('Error', 'Faced some problems trying to create a new contact!');
            }
            if (isset($_POST['phone'])) {

                $user_phones_created = $contactPhoneModel->addContactPhone($_POST['phone'], $contact_id);
                if (!$user_phones_created) {
                    $this->view->message('Error', 'Faced some problems trying to create a new contact!');
                }
            }
            $this->view->location('/contact');
        }
        $this->view->render("New contact");
    }

    public function editAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(404);
        }
        $users_phones_model = new ContactPhone;
        if (!empty($_POST)) {
//            $this->view->message("test", $_POST['phone'][2]['id']);
            if (!$this->model->contactValidate($_POST, $users_phones_model)) {
                $this->view->message($this->model->error);
            }
            $this->model->editContact($_POST, $this->route['id']);
            if (isset($_POST['phone'])) {
                [$editedContacts, $addedContacts] = split_contact_phones_edited_new($_POST['phone']);
                $users_phones_model->editContactPhone($editedContacts, $this->route['id']);
                $users_phones_model->addContactPhone($addedContacts, $this->route['id']);
            }
            $this->view->location('/contact');
        }
        $contact = $this->model->getContact($this->route['id']);

        $vars = [
            'data' => $contact,
        ];
        $this->view->render("Edit contact", $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->deleteContact($this->route['id']);
        $this->view->redirect('contact');
    }

    public function deleteContactPhoneAction()
    {
        $contactPhoneModel = new ContactPhone;
        if (!$contactPhoneModel->contactPhoneExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $contactPhoneModel->deleteContactPhone($this->route['id']);
//        $this->view->redirect('contact');
    }
}