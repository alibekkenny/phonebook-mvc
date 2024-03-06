<?php

namespace application\models;

use application\core\Model;

class Contact extends Model
{
    public $error;

    public function contactExists($id, $user_id)
    {
        $foundContact = $this->entityManager->getRepository(\repository\Contact::class)->findOneBy(['id' => $id]);
        return $foundContact->getUser()->getId() == $user_id ? $foundContact->getId() : null;
//        return $this->db->column("SELECT id FROM users_contacts WHERE id = :id and user_id = :user_id", $params);
    }

    public function contactExistsById($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->entityManager->getRepository(\repository\Contact::class)->findOneBy(['id' => $id])->getId();
//        return $this->db->column("SELECT id FROM users_contacts WHERE id = :id", $params);
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
        $newContact = new \repository\Contact();
        $newContact->setName($post['contact_name']);
        $newContact->setDescription($post['description']);
        $user = $this->entityManager->getRepository(\repository\User::class)->findOneBy(['id' => $_SESSION['authorize']['id']]);
        $newContact->setUser($user);
        $user->addContact($newContact);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $newContact->getId();
//        $this->db->query("INSERT INTO users_contacts(name, description, user_id) VALUES (:name,:description,:user_id)", $vars);
//        return $this->db->lastInsertId();
    }

    public function editContact($post, $id)
    {
        $params = [
            'name' => $post['contact_name'],
            'description' => $post['description'],
            'id' => $id,
        ];
        $foundContact = $this->entityManager->getRepository(\repository\Contact::class)->findOneBy(['id' => $id]);
        $foundContact->setName($post['contact_name']);
        $foundContact->setDescription($post['description']);
//        $foundContact->setDescription($post['description']);
        $this->entityManager->flush();
//        $this->db->query("UPDATE users_contacts SET name=:name, description=:description WHERE id=:id", $params);
    }

    public function getContact($id)
    {
        $params = [
            'id' => $id
        ];
//        $contact = $this->db->row("SELECT * FROM users_contacts WHERE id=:id", $params)[0];
        $contact = $this->entityManager->getRepository(\repository\Contact::class)->findOneBy(['id' => $id]);
//        $users_phones_model = new ContactDetails;
        $formattedContact = [];
        $formattedContact['id'] = $contact->getId();
        $formattedContact['name'] = $contact->getName();
        $formattedContact['description'] = $contact->getDescription();
//
        $formattedContact['phone'] = $contact->getContactDetails();
        return $formattedContact;
    }

    public function getContacts()
    {
//        $contacts = $this->db->row('SELECT * FROM users_contacts');
        $contacts = $this->entityManager->getRepository(\repository\Contact::class)->findAll();
        $users_phones_model = new ContactDetails;
        $formattedContacts = [];
        foreach ($contacts as $key => $value) {
            $formattedContacts[$key] = $value;
//            $formattedContacts[$key]['id'] = $value->getId();
//            $formattedContacts[$key]['name'] = $value->getName();
//            $formattedContacts[$key]['description'] = $value->getDescription();
//            $formattedContacts[$key]['phone'] = $value->getContactDetails();
        }
        return $formattedContacts;
    }

    public function getContactsByUserId($user_id)
    {
        $params = [
            'user_id' => $user_id
        ];
        $user = $this->entityManager->getRepository(\repository\User::class)->find($user_id);
        $contacts = $user->getContacts();
//        $contacts = $contacts)?
//        echo($contacts);
//        echo ($contacts[0]->getContactDetails())[0][0];
//        var_dump($contacts[0]);
        $formattedContacts = [];
        foreach ($contacts as $key => $value) {
//            echo $key . ' ' . $value->getName();
            $formattedContacts[$key]['id'] = $value->getId();
            $formattedContacts[$key]['name'] = $value->getName();
            $formattedContacts[$key]['description'] = $value->getDescription();
//            echo count($value->getContactDetails());
            $formattedContacts[$key]['phone'] = $value->getContactDetails();
        }
        return $formattedContacts;
    }

    public function deleteContact($id)
    {
        $contactPhoneModel = new ContactDetails;
        $contactPhoneModel->deleteContactPhonesByContactId($id);
        $contact = $this->entityManager->getRepository(\repository\Contact::class)->findOneBy(['id' => $id]);
        $this->entityManager->remove($contact);
        $this->entityManager->flush();
//        $this->db->query("DELETE FROM users_contacts WHERE id=:id", $params);
    }


}