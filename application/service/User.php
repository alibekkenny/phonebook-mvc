<?php

namespace application\models;


use application\core\Model;

require_once "bin\bootstrap.php";

class User extends Model
{
    public $error;

    public function userValidate($post)
    {
        $nameLen = iconv_strlen($post['name']);
        $passwordLen = iconv_strlen($post['password']);
        if ($nameLen < 3 or $nameLen > 50) {
            $this->error = "Name should consist of 3 to 50 symbols!";
            return false;
        } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error = "Email is not valid!";
            return false;
        } else if ($passwordLen < 3 or $passwordLen > 50) {
            $this->error = "Password should consist of 3 to 50 symbols!";
            return false;
        }
        return true;
    }

    public function loginValidate($post)
    {
        $emailLen = iconv_strlen($post['email']);
        $passwordLen = iconv_strlen($post['password']);
        if ($emailLen < 3 or $emailLen > 50 or $passwordLen < 3 or $passwordLen > 50) {
            $this->error = "Email or password is not valid!";
            return false;
        } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error = "Email is not valid!";
            return false;
        }
//        $vars = [
//            'email' => $post['email'],
//        ];
        $loginData = $this->entityManager->getRepository(\repository\User::class)->findOneBy(['email' => $post['email']]);
        if (empty($loginData)) {
            $this->error = "Email or password is incorrect!";
            return false;
        }
//        $loginData = $loginData[0];
        if ($loginData->getEmail() == $post['email'] && $loginData->getPassword() == $post['password']) {
            return $loginData->getId();
        }
        $this->error = "Email or password is incorrect!";
        return false;
    }

    public function getUsers()
    {
        return $this->entityManager->getRepository(\repository\User::class)->findAll();
//        return $this->db->row('SELECT * FROM users');
    }

    public function getUserById($id)
    {
        return $this->entityManager->getRepository(\repository\User::class)->findOneBy(['id' => $id]);
    }

    public function userCreate($post)
    {
//        $params = [
//            'id' => 0,
//            'name' => $post['name'],
//            'email' => $post['email'],
//            'password' => $post['password']
//        ];

//        $this->db->query('INSERT INTO users VALUES(:id, :name, :email, :password)', $params);
        $newUser = new \repository\User();
        $newUser->setName($post['name']);
        $newUser->setEmail($post['email']);
        $newUser->setPassword($post['password']);
        $this->entityManager->persist($newUser);
        $this->entityManager->flush();
        return $newUser->getId();
    }

    public function userExists($post)
    {
//        $params = [
//            'email' => $post['email']
//        ];
//        $entityManager->findOneBy(['email' => $post['email']]);
//        var_dump($this->entityManager);

        return $this->entityManager->getRepository(\repository\User::class)->findOneBy(['email' => $post['email']]);
    }
}