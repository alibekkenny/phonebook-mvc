<?php

namespace application\models;

use application\core\Model;

class ContactDetails extends Model
{
    public $error;

    public function validateContactPhone($phone)
    {
        $nameLen = iconv_strlen($phone['category']);
        $phoneLen = iconv_strlen($phone['number']);
        if ($nameLen < 3 or $nameLen > 50) {
            $this->error = "Contact category should consist of 3 to 50 symbols!";
            return false;
        } else if (!filter_var($phone['number'], FILTER_SANITIZE_NUMBER_INT) or ($phoneLen < 4 or $phoneLen > 12)) {
            $this->error = "Not correct format of phone number!";
            return false;
        }
        return true;
    }

    public function phoneValidate($post)
    {
        $phoneLen = iconv_strlen($post['phone_number']);
        if ($post['phone_category'] == 1) {
            if (!filter_var($post['phone_number'], FILTER_VALIDATE_EMAIL)) {
                $this->error = "Not correct format of email!";
                return false;
            }
        } else if ($post['phone_category'] == 4) {
            if (!filter_var($post['phone_number'], FILTER_SANITIZE_NUMBER_INT) or ($phoneLen != 6 and $phoneLen != 7 and $phoneLen != 11 and $phoneLen != 12)) {
                $this->error = "Not correct format of home phone!";
                return false;
            }
        } else {
            if (!filter_var($post['phone_number'], FILTER_SANITIZE_NUMBER_INT) or ($phoneLen != 11 and $phoneLen != 12)) {
                $this->error = "Not correct format of phone number!";
                return false;
            }
        }
        return true;
    }

    public function addPhone($post, $phone_book_id)
    {
        $params = [
            'phone_category_id' => $post['phone_category'],
            'phone' => $post['phone_number'],
            'phone_book_id' => $phone_book_id,
        ];
        $this->db->query("INSERT INTO users_phones(phone, phone_category_id, phone_book_id) VALUES (:phone, :phone_category_id, :phone_book_id);", $params);
        return true;
    }

    public function getContactPhones($phone_book_id)
    {
        $params = [
            'phone_book_id' => $phone_book_id,
        ];
        return $this->db->row('SELECT users_phones.id as "id",  users_phones.phone as "phone", users_phones.phone_book_id as "phone_book_id", pc.category as "category" FROM users_phones LEFT JOIN phone_categories pc on pc.id = users_phones.phone_category_id WHERE phone_book_id = :phone_book_id', $params);
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

    public function contactPhoneExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM users_phones WHERE id =:id;', $params);
    }
}