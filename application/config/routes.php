<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'login' => [
        'controller' => 'user',
        'action' => 'login',
    ],
    'logout' => [
        'controller' => 'user',
        'action' => 'logout',
    ],
    'register' => [
        'controller' => 'user',
        'action' => 'register'
    ],
    'contact' => [
        'controller' => 'contact',
        'action' => 'show',
    ],
    'contact/add' => [
        'controller' => 'contact',
        'action' => 'add',
    ],
    'contact/edit/{id:\d+}' => [
        'controller' => 'contact',
        'action' => 'edit',
    ],
    'contact/delete/{id:\d+}' => [
        'controller' => 'contact',
        'action' => 'delete',
    ],
    'contact/phone/delete/{id:\d+}' => [
        'controller' => 'contact',
        'action' => 'deleteContactPhone',
    ],
];