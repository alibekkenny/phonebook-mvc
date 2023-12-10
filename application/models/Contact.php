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
        return $this->db->column("SELECT id FROM users_phone_book WHERE id = :id and user_id = :user_id", $params);
    }

    public function contactValidate($post)
    {
        $nameLen = iconv_strlen($post['contact_name']);
//        $phoneLen = iconv_strlen($post['phone']);
        if ($nameLen < 3 or $nameLen > 50) {
            $this->error = "Name should consist of 3 to 50 symbols!";
            return false;
        }
//       else if (!filter_var($post['phone'], FILTER_SANITIZE_NUMBER_INT) or ($phoneLen < 10 or $phoneLen > 12)) {
//            $this->error = "Not correct format of phone number!";
//            return false;
//        }
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
        $this->db->query("INSERT INTO users_phone_book(name, description, user_id) VALUES (:name,:description,:user_id)", $vars);
        return $this->db->lastInsertId();
    }

    public function editContact($post, $id)
    {
        $params = [
            'name' => $post['contact_name'],
            'description' => $post['description'],
            'id' => $id,
        ];
        $this->db->query("UPDATE users_phone_book SET name=:name, description=:description WHERE id=:id", $params);
    }

    public function getContact($id)
    {
        $params = [
            'id' => $id
        ];
        return $this->db->row("SELECT * FROM users_phone_book WHERE id=:id", $params);
    }

    public function getContactsByUserId($user_id)
    {
        $params = [
            'user_id' => $user_id
        ];
        return $this->db->row("SELECT * FROM users_phone_book WHERE user_id=:user_id", $params);
    }

    public function deleteContact($id)
    {
        $params = [
            'id' => $id
        ];
        $this->db->query("DELETE FROM users_phone_book WHERE id=:id", $params);
    }
}