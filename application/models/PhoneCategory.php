<?php

namespace application\models;

use application\core\Model;

class PhoneCategory extends Model
{
    public $error;

    public function getCategories()
    {
        return $this->db->row('SELECT * FROM phone_categories');
    }
}