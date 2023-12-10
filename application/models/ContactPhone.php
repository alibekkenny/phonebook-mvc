<?php

namespace application\models;

use application\core\Model;

class ContactPhone extends Model
{
    public function getContactPhones($phone_book_id)
    {
        $params = [
            'phone_book_id' => $phone_book_id,
        ];
        return $this->db->row('SELECT * FROM users_phones WHERE phone_book_id = :phone_book_id', $params);
    }

    public function addContactPhone($phones, $phone_book_id)
    {
//        $sql_query = "";
        foreach ($phones as $key => $value) {
            $params = [
                'phone' => $value['number'],
                'name' => $value['category'],
                'phone_book_id' => $phone_book_id,
            ];
            $this->db->query("INSERT INTO users_phones(phone, name, phone_book_id) VALUES (:phone, :name, :phone_book_id);", $params);
        }
        return true;
    }

    public function editContactPhone($phones, $phone_book_id)
    {
        foreach ($phones as $key => $value) {
            $params = [
                'id' => $value['id'],
                'phone' => $value['number'],
                'name' => $value['category'],
            ];
            $this->db->query('UPDATE users_phones SET phone = :phone, name = :name WHERE id = :id;', $params);
        }
        return true;
    }

    public function deleteContactPhonesByContactId($phone_book_id)
    {
        $params = [
            'phone_book_id' => $phone_book_id,
        ];
        return $this->db->query('DELETE FROM users_phones WHERE phone_book_id=:phone_book_id;', $params);
    }

    public function deleteContactPhone($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->query('DELETE FROM users_phones WHERE id =:id;', $params);
    }
}