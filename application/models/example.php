<?php

require_once "bin\bootstrap.php";

//var_dump($entityManager);
$newUser = new \entities\User();
$newUser->setName('name');
$newUser->setEmail('test@gmail.com');
$newUser->setPassword('123');
$entityManager->persist($newUser);
$entityManager->flush();
//return $newUser->getId();
echo ($entityManager->getRepository(entities\User::class)->findOneBy(['email' => 'test@gmail.com'])) . "\n";
echo $newUser->getId();
return;