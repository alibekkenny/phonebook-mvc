<?php

return [
    '{lang:[a-z]+}' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    '{lang:[a-z].}/login' => [
        'controller' => 'user',
        'action' => 'login',
    ],
    '{lang:[a-z].}/logout' => [
        'controller' => 'user',
        'action' => 'logout',
    ],
    '{lang:[a-z].}/register' => [
        'controller' => 'user',
        'action' => 'register'
    ],
    '{lang:[a-z]+}/contact' => [
        'controller' => 'contact',
        'action' => 'show',
    ],
    '{lang:[a-z]+}/contact/add' => [
        'controller' => 'contact',
        'action' => 'add',
    ],
    '{lang:[a-z]+}/contact/edit/{id:\d+}' => [
        'controller' => 'contact',
        'action' => 'edit',
    ],
    '{lang:[a-z]+}/contact/delete/{id:\d+}' => [
        'controller' => 'contact',
        'action' => 'delete',
    ],
    '{lang:[a-z]+}/contact/phone/delete/{id:\d+}' => [
        'controller' => 'contact',
        'action' => 'deleteContactPhone',
    ],
    '{lang:[a-z]+}/contact/{id:\d+}/phone/add' => [
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