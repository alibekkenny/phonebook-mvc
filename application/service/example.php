<?php

require_once "bin\bootstrap.php";

//var_dump($entityManager);
//$newUser = new \entities\User();
//$newUser->setName('name');
//$newUser->setEmail('test@gmail.com');
//$newUser->setPassword('123');
//$entityManager->persist($newUser);
//$entityManager->flush();
////return $newUser->getId();
//echo ($entityManager->getRepository(entities\User::class)->findOneBy(['email' => 'test@gmail.com'])) . "\n";
//$testUser = $entityManager->getRepository(entities\User::class)->findOneBy(['email' => 'test@gmail.com']);
$user = $entityManager->getRepository(\repository\Contact::class)->findOneBy(['id' => 1]);
echo $user . "\n";
$contacts = $user->add();
//echo $contacts;
foreach ($contacts as $contact) {
    echo 'id: ' . $contact->getId() . "\n";
    foreach ($contact->getContactDetails() as $contactDetail) {
        echo 'contact details: ' . $contactDetail->getId() . ';' . $contactDetail->getName() . "\n";
    }
}
return;