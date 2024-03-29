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

//    public function manyPhonesValidate($post)
//    {
//        foreach ($post as $key => $value) {
//            if (!$this->phoneValidate($post[$key])) {
//                return false;
//            }
//        }
//        return true;
//    }

    public function phoneValidate($post)
    {
        $phoneLen = iconv_strlen($post['phone_number']);
        if ($post['phone_category'] == 1) {
            if (!filter_var($post['phone_number'], FILTER_VALIDATE_EMAIL)) {
                $this->error = "Not correct format of email!";
                return false;
            }
        } else if ($post['phone_category'] == 4) {
            if (!filter_var($post['phone_number'], FILTER_SANITIZE_NUMBER_INT) or (($phoneLen < 5 or $phoneLen > 7) and ($phoneLen < 11 or $phoneLen > 12))) {
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
        $this->db->query("INSERT INTO contact_details(phone, phone_category_id, phone_book_id) VALUES (:phone, :phone_category_id, :phone_book_id);", $params);
        return true;
    }

    public function getContactPhones($phone_book_id)
    {
        $params = [
            'phone_book_id' => $phone_book_id,
        ];
        return $this->db->row('SELECT contact_details.id as "id",  contact_details.phone as "phone", contact_details.phone_book_id as "phone_book_id", pc.category as "category", pc.id as "category_id" FROM contact_details LEFT JOIN phone_categories pc on pc.id = contact_details.phone_category_id WHERE contact_details.phone_book_id = :phone_book_id', $params);
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
            $this->db->query("INSERT INTO contact_details(phone, name, phone_book_id) VALUES (:phone, :name, :phone_book_id);", $params);
        }
        return true;
    }

    public function editContactPhone($phones, $phone_book_id)
    {
        foreach ($phones as $key => $value) {
            $params = [
                'id' => $value['id'],
                'phone' => $value['phone_number'],
                'phone_category_id' => $value['phone_category'],
            ];
            $this->db->query('UPDATE contact_details SET phone = :phone, phone_category_id = :phone_category_id WHERE id = :id;', $params);
        }
        return true;
    }

    public function deleteContactPhonesByContactId($phone_book_id)
    {
        $params = [
            'phone_book_id' => $phone_book_id,
        ];
        return $this->db->query('DELETE FROM contact_details WHERE phone_book_id=:phone_book_id;', $params);
    }

    public function deleteContactPhone($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->query('DELETE FROM contact_details WHERE id =:id;', $params);
    }

    public function contactPhoneExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM contact_details WHERE id =:id;', $params);
    }
}