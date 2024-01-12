<?php

namespace application\models;

use application\core\Model;

class Contact extends Model
{
    public $error;

    public function contactExists($id, $user_id)
    {
        $params = [
            'id' => $id,
            'user_id' => $user_id
        ];
        return $this->db->column("SELECT id FROM users_contacts WHERE id = :id and user_id = :user_id", $params);
    }

    public function contactExistsById($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column("SELECT id FROM users_contacts WHERE id = :id", $params);
    }

    public function contactValidate($post, $users_phones_model)
    {
        $nameLen = iconv_strlen($post['contact_name']);
//        $phoneLen = iconv_strlen($post['phone']);
        if ($nameLen < 3 or $nameLen > 50) {
            $this->error = "Name should consist of 3 to 50 symbols!";
            return false;
        }
        if (isset($post['phone'])) {
            foreach ($post['phone'] as $key => $value) {
                if (!$users_phones_model->phoneValidate($value)) {
                    $this->error = $users_phones_model->error;
                    return false;
                }
            }
        }

        return true;
    }

    public function addContact($post)
    {
        $vars = [
//            'id' => 0,
            'name' => $post['contact_name'],
//            'phone_number' => $post['phone'],
            'description' => $post['description'],
            'user_id' => $_SESSION['authorize']['id'],
        ];
        $this->db->query("INSERT INTO users_contacts(name, description, user_id) VALUES (:name,:description,:user_id)", $vars);
        return $this->db->lastInsertId();
    }

    public function editContact($post, $id)
    {
        $params = [
            'name' => $post['contact_name'],
            'description' => $post['description'],
            'id' => $id,
        ];
        $this->db->query("UPDATE users_contacts SET name=:name, description=:description WHERE id=:id", $params);
    }

    public function getContact($id)
    {
        $params = [
            'id' => $id
        ];
        $contact = $this->db->row("SELECT * FROM users_contacts WHERE id=:id", $params)[0];
        $users_phones_model = new ContactDetails;
        $contact['phone'] = $users_phones_model->getContactPhones($id);
        return $contact;
    }

    public function getContacts()
    {
        $contacts = $this->db->row('SELECT * FROM users_contacts');
        $users_phones_model = new ContactDetails;
        foreach ($contacts as $key => $value) {
            $contacts[$key]['phone'] = $users_phones_model->getContactPhones($value['id']);
        }
        return $contacts;
    }

    public function getContactsByUserId($user_id)
    {
        $params = [
            'user_id' => $user_id
        ];
        $phone_book = $this->db->row("SELECT * FROM users_contacts WHERE user_id=:user_id", $params);
        $users_phones_model = new ContactDetails;
        foreach ($phone_book as $key => $value) {
            $phone_book[$key]['phone'] = $users_phones_model->getContactPhones($value['id']);
        }
        return $phone_book;
    }

    public function deleteContact($id)
    {
        $contactPhoneModel = new ContactDetails;
        $contactPhoneModel->deleteContactPhonesByContactId($id);
        $params = [
            'id' => $id
        ];
        $this->db->query("DELETE FROM users_contacts WHERE id=:id", $params);
    }


}