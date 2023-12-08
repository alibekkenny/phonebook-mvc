<?php

namespace application\controllers;

use application\core\Controller;

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
            if (!$this->model->contactValidate($_POST)) {
                $this->view->message("Error", $this->model->error);
            }
            $id = $this->model->addContact($_POST);
            if (!$id) {
                $this->view->message("500", "Internal Server Error");
            }
            $this->view->location('/contact');
        }
        $this->view->render("New contact");
    }

    public function editAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(403);
        }
        if (!empty($_POST)) {
            if (!$this->model->contactValidate($_POST)) {
                $this->view->message($this->model->error);
            }
            $this->model->editContact($_POST, $this->route['id']);
            $this->view->location('/contact');
        }

        $vars = [
            'data' => $this->model->getContact($this->route['id'])[0],
        ];
        $this->view->render("Edit contact", $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->contactExists($this->route['id'], $_SESSION['authorize']['id'])) {
            $this->view->errorCode(403);
        }
        $this->model->deleteContact($this->route['id']);
        $this->view->redirect('contact');
    }
}