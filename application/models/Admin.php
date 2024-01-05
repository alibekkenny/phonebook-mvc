<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $config = require 'application/config/admin.php';
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Login or password is incorrect!';
            return false;
        }
        return true;
    }

    public function userExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM users WHERE id = :id', $params);
    }

    public function userEdit($post)
    {
        $params = [
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'id' => $post['id'],
        ];
        return $this->db->query('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id', $params);
    }

    public function userDelete($id)
    {
        $params = [
            'user_id' => $id,
        ];
        $contactModel = new Contact;
        $userContacts = $this->db->row('SELECT id FROM users_phone_book WHERE user_id = :user_id', $params);
        foreach ($userContacts as $key => $value) {
            $contactModel->deleteContact($value['id']);
        }
        $params = [
            'id' => $id,
        ];
        return $this->db->query('DELETE FROM users WHERE id = :id', $params);
    }
}