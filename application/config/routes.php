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
    '{lang:[a-z]+}/admin' => [
        'controller' => 'admin',
        'action' => 'index',
    ],
    '{lang:[a-z]+}/admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    '{lang:[a-z]+}/admin/user/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'userEdit',
    ],
    '{lang:[a-z]+}/admin/user/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'userDelete',
    ],
    '{lang:[a-z]+}/admin/user/{id:\d+}/contact' => [
        'controller' => 'admin',
        'action' => 'showUsersContacts'
    ],
    '{lang:[a-z]+}/admin/contact' => [
        'controller' => 'admin',
        'action' => 'showContacts'
    ],
    '{lang:[a-z]+}/admin/contact/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'contactEdit',
    ],
    '{lang:[a-z]+}/admin/contact/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'contactDelete',
    ],
    '{lang:[a-z]+}/admin/category' => [
        'controller' => 'admin',
        'action' => 'category',
    ],
    '{lang:[a-z]+}/admin/category/add' => [
        'controller' => 'admin',
        'action' => 'categoryAdd',
    ],
    '{lang:[a-z]+}/admin/category/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'categoryEdit',
    ],
    '{lang:[a-z]+}/admin/category/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'categoryDelete',
    ],
    '{lang:[a-z]+}/admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ]
];