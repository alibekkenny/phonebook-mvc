<!--<img src="https://cdn.iconscout.com/icon/free/png-256/free-phone-book-1404933-1187580.png" alt="Phonebook image">-->

<img src="https://cdn.iconscout.com/icon/free/png-256/free-phone-book-1404933-1187580.png"
     class="mx-auto d-block img-fluid"
     alt="Phonebook Image">
<!--<h1 class="text-center mt-5"> Here will be some information about phone book!</h1>-->
<!--<h1 class="text-center mt-2">But now you can go to contacts list</h1>-->
<div class="text-center">
    <p class="h2 mt-5"><?= $language->GetVar('some_info') ?></p>
    <footer class="footer"><?= $language->GetVar('can_visit') ?> <a class=""
                                                                    href="/contact"><?= $language->GetVar('contacts_list') ?></a>
    </footer>
</div>
