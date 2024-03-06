<div class="h1"> <?= $language->GetVar('contacts') ?></div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1"><?= $language->GetVar('contact_id') ?></th>
        <th scope="col" class="col-sm-2"><?= $language->GetVar('name') ?></th>
        <th scope="col" class="col-sm-2"><?= $language->GetVar('phone') ?></th>
        <th scope="col" class="col-sm"><?= $language->GetVar('add_info') ?></th>
        <th scope="col" class="col-sm-3"><?= $language->GetVar('actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($phone_book as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value->getId() ?></th>
            <td><?= $value->getName() ?></td>
            <td><?php foreach ($value->getContactDetails() as $key => $phone) {
                    echo $phone->getCategory()->getCategory() . ': ' . $phone->getPhone() . '<br>';
                } ?></td>
            <td><?= $value->getDescription() ?></td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/admin/contact/edit/<?= $value->getId() ?>"><?= $language->GetVar('edit') ?></a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/<?= $language->GetLanguage() ?>/admin/contact/delete/<?= $value->getId() ?>"><?= $language->GetVar('delete') ?></a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>