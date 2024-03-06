<?php

namespace application\models;

use application\core\Model;

class PhoneCategory extends Model
{
    public $error;

    public function getCategories()
    {
        return $this->entityManager->getRepository(\repository\PhoneCategory::class)->findAll();
//        return $this->db->row('SELECT * FROM phone_categories');
    }

    public function getCategoryById($id)
    {
        return $this->entityManager->getRepository(\repository\PhoneCategory::class)->findOneBy(['id' => $id]);
    }

    public function categoryValidate($post)
    {
        $categoryLen = iconv_strlen($post['category']);
        if ($categoryLen < 3 || $categoryLen > 15) {
            $this->error = "Category should consist of 3 to 15 symbols!";
            return false;
        }
        $foundCategory = $this->entityManager->getRepository(\repository\PhoneCategory::class)->findOneBy(['category' => $post['category']]);
        if (!empty($foundCategory)) {
            $this->error = "Such category already exists!";
            return false;
        }
        return true;
    }

    public function editCategory($id, $post)
    {
        $foundCategory = $this->entityManager->getRepository(\repository\PhoneCategory::class)->findOneBy(['id' => $id]);
        $foundCategory->setCategory($post['category']);
        $this->entityManager->flush();
        return $foundCategory->getId();
    }

    public function addCategory($post)
    {
        $newCategory = new \repository\PhoneCategory();
        $newCategory->setCategory($post['category']);
        $this->entityManager->persist($newCategory);
        $this->entityManager->flush();
        return $newCategory->getId();
    }

    public function deleteCategoryById($id)
    {
        $deletedCategory = $this->entityManager->getRepository(\repository\PhoneCategory::class)->findOneBy(['id' => $id]);
        $this->entityManager->remove($deletedCategory);
        $this->entityManager->flush();
        return $id;
    }
}