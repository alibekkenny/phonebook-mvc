<?php

//namespace application\lib;

function split_contact_phones_edited_new($contacts)
{
    $editContacts = [];
    $addedContacts = [];
    foreach ($contacts as $key => $value) {
        if (isset($value['id'])) {
            $editContacts[] = $value;
        } else {
            $addedContacts[] = $value;
        }
    }
    return [$editContacts, $addedContacts];
}
