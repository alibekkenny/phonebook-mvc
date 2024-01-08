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
    'contact/{id:\d+}/phone/add' => [
        'controller' => 'contact',
        'action' => 'addPhone',
    ],
    'admin' => [
        'controller' => 'admin',
        'action' => 'index',
    ],
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/user/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'userEdit',
    ],
    'admin/user/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'userDelete',
    ],
    'admin/user/{id:\d+}/contact' => [
        'controller' => 'admin',
        'action' => 'showUsersContacts'
    ],
    'admin/contact' => [
        'controller' => 'admin',
        'action' => 'showContacts'
    ],
    'admin/contact/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'contactEdit',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ]
];