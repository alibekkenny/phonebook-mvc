<?php

namespace application\controllers;

use application\core\Controller;
use application\models\ContactDetails;
use application\models\PhoneCategory;

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
            $contactPhoneModel = new ContactDetails;
            if (!$this->model->contactValidate($_POST, $contactPhoneModel)) {
                $this->view->message('Error', $this->model->error);
            }
            $contact_id = $this->model->addContact($_POST);
            if (!$contact_id) {
                $this->view->message('Error', 'Faced some problems trying to create a new contact!');
            }
//            if (isset($_POST['phone'])) {
//
//                $user_phones_created = $contactPhoneModel->addContactPhone($_POST['phone'], $contact_id);
//                if (!$user_phones_created) {
//                    $this->view->message('Error', 'Faced some problems trying to create a new contact!');
//                }
//            }
            $this->view->location('/' . $this->view->language->GetLanguage() . '/contact');
        }
        $this->view->render("New contact");
    }

    public function editAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(404);
        }
        $users_phones_model = new ContactDetails;
        $categoryModel = new PhoneCategory;
        if (!empty($_POST)) {
//            $this->view->message("test", $_POST['phone'][2]['id']);
            if (!$this->model->contactValidate($_POST, $users_phones_model)) {
                $this->view->message('Error', $this->model->error);
            }
            $this->model->editContact($_POST, $this->route['id']);
            if (isset($_POST['phone'])) {
//                [$editedContacts, $addedContacts] = split_contact_phones_edited_new($_POST['phone']);
//                if (!$users_phones_model->manyPhonesValidate($_POST['phone'])) {
//                    $this->view->message('Error', $users_phones_model->error);
//                }
                $users_phones_model->editContactPhone($_POST['phone'], $this->route['id']);
//                $users_phones_model->addContactPhone($addedContacts, $this->route['id']);
            }
            $this->view->location('/' . $this->view->language->GetLanguage() . '/contact');
        }
        $contact = $this->model->getContact($this->route['id']);
        $categories = $categoryModel->getCategories();
        $vars = [
            'data' => $contact,
            'categories' => $categories,
        ];
        $this->view->render("Edit contact", $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->deleteContact($this->route['id']);
        $this->view->redirect($this->view->language->GetLanguage() . '/contact');
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

    public function addPhoneAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $contactPhoneModel = new ContactDetails;
            if (!$contactPhoneModel->phoneValidate($_POST)) {
                $this->view->message('Error', $contactPhoneModel->error);
            }
            $createdPhoneId = $contactPhoneModel->addPhone($_POST, $this->route['id']);
            if (!$createdPhoneId) {
                $this->view->message('Error', 'Faced some problems trying to add a new phone!');
            }
            $this->view->location('/' . $this->view->language->GetLanguage() . '/contact');
        }
        $phoneCategoryModel = new PhoneCategory;
        $vars = [
            'contact' => $this->model->getContact($this->route['id']),
            'categories' => $phoneCategoryModel->getCategories(),
        ];
        $this->view->render('New Contact Phone', $vars);
    }
}